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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name', 100); // Freelancer's full name
            $table->string('email')->unique(); // Unique email address
            $table->string('password'); // Hashed password
            $table->string('image')->nullable(); // Optional profile picture URL
            $table->string('category')->nullable(); // Freelancer's category (web , app)
            $table->string('country')->nullable(); // Freelancer's country
            $table->string('year_of_experience')->nullable(); // Freelancer's country
            $table->string('facebook_link')->nullable(); // Freelancer's country
            $table->string('youtube_link')->nullable(); // Freelancer's country
            $table->string('twitter_link')->nullable(); // Freelancer's country
            $table->longText('description')->nullable(); // Freelancer's country
            $table->integer('status')->default(1); // 1 Active 0 In-Active
            $table->timestamps(); // created_at & updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
