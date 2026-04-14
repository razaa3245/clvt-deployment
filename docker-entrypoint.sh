#!/bin/sh
set -e

echo "==> Starting entrypoint script..."

# ── 1. Create .env from environment variables ─────────────────────────────────
echo "==> Creating .env file..."
cat > /var/www/html/.env << EOF
APP_NAME=${APP_NAME:-ContactLensApp}
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY:-}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

LOG_CHANNEL=stack
LOG_STACK=single
LOG_LEVEL=${LOG_LEVEL:-error}

DB_CONNECTION=${DB_CONNECTION:-mysql}
DB_HOST=${DB_HOST:-127.0.0.1}
DB_PORT=${DB_PORT:-3306}
DB_DATABASE=${DB_DATABASE:-railway}
DB_USERNAME=${DB_USERNAME:-root}
DB_PASSWORD=${DB_PASSWORD:-}

SESSION_DRIVER=${SESSION_DRIVER:-database}
SESSION_LIFETIME=120
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=${QUEUE_CONNECTION:-database}

CACHE_STORE=${CACHE_STORE:-database}
CACHE_PREFIX=

MAIL_MAILER=${MAIL_MAILER:-log}
MAIL_HOST=${MAIL_HOST:-127.0.0.1}
MAIL_PORT=${MAIL_PORT:-2525}
MAIL_USERNAME=${MAIL_USERNAME:-null}
MAIL_PASSWORD=${MAIL_PASSWORD:-null}
MAIL_ENCRYPTION=${MAIL_ENCRYPTION:-null}
MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS:-hello@example.com}
MAIL_FROM_NAME=${APP_NAME:-ContactLensApp}
STRIPE_KEY=${STRIPE_KEY:-}
STRIPE_SECRET=${STRIPE_SECRET:-}
FASTAPI_URL=${FASTAPI_URL:-http://localhost:8001}
EOF
echo "==> .env file created."

# ── 2. Generate app key if not set ────────────────────────────────────────────
if [ -z "$APP_KEY" ]; then
    echo "==> Generating APP_KEY..."
    php artisan key:generate --force
fi


# ── 3. Wait for MySQL ─────────────────────────────────────────────────────────
if [ "$DB_CONNECTION" = "mysql" ]; then
    echo "==> Waiting for MySQL at ${DB_HOST}:${DB_PORT}..."
    for i in $(seq 1 30); do
        php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}');" \
            2>/dev/null && echo "==> MySQL is ready!" && break
        echo "    Attempt $i/30 — retrying in 2s..."
        sleep 2
    done
fi

# ── 4. Run migrations ─────────────────────────────────────────────────────────
echo "==> Running migrations..."
php artisan migrate --force

# ── 5. Cache config & views ───────────────────────────────────────────────────
echo "==> Caching config & views..."
php artisan config:cache
php artisan config:clear
php artisan view:cache


# ── 6. Storage link ───────────────────────────────────────────────────────────
echo "==> Linking storage..."
php artisan storage:link --force 2>/dev/null || true

# ── 7. Fix permissions ────────────────────────────────────────────────────────
echo "==> Fixing permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ── 8. Write nginx config with correct port ───────────────────────────────────
NGINX_PORT=${PORT:-80}
echo "==> Writing nginx config for port ${NGINX_PORT}..."
cat > /etc/nginx/conf.d/default.conf << NGINXCONF
server {
    listen ${NGINX_PORT};
    server_name _;
    root /var/www/html/public;
    index index.php index.html;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    client_max_body_size 50M;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
    }

    location ~ /\.ht {
        deny all;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
}
NGINXCONF

# ── 9. Test nginx config ──────────────────────────────────────────────────────
echo "==> Testing nginx config..."
nginx -t

# ── 10. Start php-fpm in background ──────────────────────────────────────────
echo "==> Starting php-fpm..."
php-fpm -D

# ── 11. Start Nginx in foreground ────────────────────────────────────────────
echo "==> Starting Nginx..."
exec nginx -g "daemon off;"