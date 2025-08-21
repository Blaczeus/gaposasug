<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;
use App\Models\User;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example: create complaints for first 3 student users
        $students = User::where('role', 'student')->take(3)->get();

        foreach ($students as $student) {
            Complaint::create([
                'user_id' => $student->id,
                'title' => 'Library Noise Issue',
                'description' => 'The library has been very noisy recently, especially in the evenings.',
                'status' => 'pending',
                'photo' => null, // You can put a test path if needed
            ]);

            Complaint::create([
                'user_id' => $student->id,
                'title' => 'WiFi Connection Problem',
                'description' => 'The school WiFi keeps disconnecting in the engineering block.',
                'status' => 'in_progress',
                'photo' => null,
            ]);
        }
    }
}
