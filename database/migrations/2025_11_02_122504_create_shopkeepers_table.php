<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shopkeepers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('shop_name');
            $table->string('city')->nullable();
            $table->string('country')->default('Pakistan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shopkeepers');
    }
};
