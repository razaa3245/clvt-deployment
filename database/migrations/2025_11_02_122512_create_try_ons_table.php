<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('try_ons', function (Blueprint $table) {
            $table->id(); // simpler than uuid unless you need global uniqueness
            $table->foreignId('shop_id')->constrained('shopkeepers')->cascadeOnDelete();
            $table->foreignId('lens_id')->constrained('lenses')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->dateTime('tryon_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('try_ons');
    }
};
