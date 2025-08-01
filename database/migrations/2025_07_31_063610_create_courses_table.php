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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g. Computer Science
            $table->string('code')->unique(); // e.g. CSC101
            $table->enum('level', ['ND', 'HND'])->nullable(); // Stored as capital case only
            $table->text('description')->nullable(); // Optional course description
            $table->string('department')->nullable(); // Optional department name (fallback for now)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
