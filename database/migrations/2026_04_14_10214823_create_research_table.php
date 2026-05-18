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
        Schema::create('researches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('biography_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('title'); // Paper Title
            $table->string('journal')->nullable(); // Journal / Conference Name
            $table->string('year')->nullable(); // Publication Year
            $table->string('link')->nullable(); // DOI / Paper Link
            $table->text('description')->nullable(); // Abstract / Summary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};