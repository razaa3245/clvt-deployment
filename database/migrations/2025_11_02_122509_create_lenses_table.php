<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopkeeper_id')->constrained('shopkeepers')->onDelete('cascade');
            $table->string('name');
            $table->string('brand');
            $table->enum('type', ['contact', 'spectacle', 'colored'])->default('contact');
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lenses');
    }
};
