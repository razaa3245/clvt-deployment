<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('shopkeepers', function (Blueprint $table) {
            $table->string('plan_name')->nullable()->default('No Plan')->after('user_id');
            $table->decimal('plan_price', 8, 2)->nullable()->after('plan_name');
            $table->date('plan_expiry')->nullable()->after('plan_price');
            $table->enum('plan_status', ['active', 'expired', 'none'])->default('none')->after('plan_expiry');
        });
    }

    public function down(): void
    {
        Schema::table('shopkeepers', function (Blueprint $table) {
            $table->dropColumn(['plan_name', 'plan_price', 'plan_expiry', 'plan_status']);
        });
    }
};