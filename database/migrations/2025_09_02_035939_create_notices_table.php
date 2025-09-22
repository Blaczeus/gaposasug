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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body')->nullable();

            // Author (admin) - nullable so seed/backfill won't break
            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete();

            // Who should see this notice (all, students, admins, alumni, custom)
            $table->enum('audience', ['all', 'students', 'admins', 'alumni', 'custom'])->default('all');

            // Keep schedule & flags
            $table->boolean('pinned')->default(false)->index();
            $table->boolean('important')->default(false)->index();

            // schedule windows
            $table->timestamp('starts_at')->nullable()->index();
            $table->timestamp('ends_at')->nullable()->index();

            // attachments metadata (filename, path, mime, size, etc.)
            $table->json('attachments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
