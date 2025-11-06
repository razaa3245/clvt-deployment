<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shopkeepers')->cascadeOnDelete();
            $table->foreignId('lens_id')->constrained('lenses')->cascadeOnDelete();
            $table->integer('tryon_count')->default(0);
            $table->string('popular_lens')->nullable();
            $table->dateTime('generated_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analytics');
    }
};
