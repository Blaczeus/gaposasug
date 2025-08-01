<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('alumnis', function (Blueprint $table) {
            // Drop the old department column
            $table->dropColumn('department');

            // Add new course_id foreign key
            $table->foreignId('course_id')->after('graduation_year')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('alumnis', function (Blueprint $table) {
            // Drop the course_id foreign key and column
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');

            // Re-add the department column
            $table->string('department')->after('graduation_year');
        });
    }
};
