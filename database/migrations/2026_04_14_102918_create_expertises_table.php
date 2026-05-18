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
        Schema::create('expertises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biography_id')->constrained()->onDelete('cascade');

            $table->string('title'); // Expertise Title
            $table->text('description')->nullable(); // Description
            $table->integer('experience')->nullable(); // Years (e.g. 2, 5)
            $table->enum('type', ['high', 'medium', 'low'])->default('medium'); 

            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expertises');
    }
};
