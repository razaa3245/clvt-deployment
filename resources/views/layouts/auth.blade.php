<script>
  const token = localStorage.getItem('auth_token');
  const role = localStorage.getItem('user_role');
  const path = window.location.pathname;

  // If no token → force signup
  if (!token && path !== '/signup') {
    window.location.href = '/signup';
  }

  // If logged in as shopkeeper
  if (token && role === 'shopkeeper' && path === '/signup') {
    window.location.href = '/shopkeeper/dashboard';
  }

  // If logged in as admin
  if (token && role === 'admin' && path === '/signup') {
    window.location.href = '/admin/dashboard';
  }
</script>
