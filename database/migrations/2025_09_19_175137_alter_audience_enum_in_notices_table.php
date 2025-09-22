<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update enum values (MySQL syntax)
        DB::statement("
            ALTER TABLE notices 
            MODIFY COLUMN audience ENUM('all', 'students', 'admins', 'alumni', 'courses', 'departments') NOT NULL DEFAULT 'all'
        ");
    }

    public function down(): void
    {
        // Rollback to the original enum values
        DB::statement("
            ALTER TABLE notices 
            MODIFY COLUMN audience ENUM('all', 'students', 'admins', 'alumni', 'custom') NOT NULL DEFAULT 'all'
        ");
    }
};
