<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('security_question1')->nullable();
            $table->string('security_answer1')->nullable();
            $table->string('security_question2')->nullable();
            $table->string('security_answer2')->nullable();
            $table->string('security_question3')->nullable();
            $table->string('security_answer3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['security_question1', 'security_answer1', 'security_question2', 'security_answer2', 'security_question3', 'security_answer3']);
        });
    }
};
