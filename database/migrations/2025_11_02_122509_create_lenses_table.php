<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->enum('type', ['contact', 'spectacle', 'colored'])->default('contact');
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps(); // creates created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lenses');
    }
};
