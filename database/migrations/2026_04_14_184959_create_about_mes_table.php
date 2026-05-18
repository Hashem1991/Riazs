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
    Schema::create('about_mes', function (Blueprint $table) {
        $table->id();

        // Core
        $table->string('name');
        $table->string('title')->nullable();
        $table->text('description')->nullable();
        $table->string('image')->nullable();

        // Contact
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->text('address')->nullable();

        // Personal Info
        $table->date('date_of_birth')->nullable();
        $table->string('gender')->nullable();
        $table->string('marital_status')->nullable();
        $table->integer('children_count')->nullable();

        // Health
        $table->string('blood_group')->nullable();
        $table->boolean('donate_blood')->default(false);

        // Social Media
        $table->string('facebook')->nullable();
        $table->string('twitter')->nullable();
        $table->string('linkedin')->nullable();
        $table->string('instagram')->nullable();
        $table->string('youtube')->nullable();
        $table->string('website')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_mes');
    }
};
