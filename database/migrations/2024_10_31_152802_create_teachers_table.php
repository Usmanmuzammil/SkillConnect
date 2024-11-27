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
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->longText('password');
            $table->string('desgination');
            $table->string('image');
            $table->longText('description');
            $table->longText('facebook_link')->nullable();
            $table->longText('youtube_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->integer('status')->default(200); // 200 Active 403 Inactive
            $table->timestamps();
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
