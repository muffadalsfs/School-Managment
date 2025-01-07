<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guardian;
use App\Models\Students;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some guardians
        $guardians = Guardian::factory()->count(3)->create();

        // Fetch some existing students or create new ones
        $students = Students::factory()->count(5)->create();

        // Associate guardians with students in the pivot table
        foreach ($guardians as $guardian) {
            $guardian->students()->attach(
                $students->random(rand(1, 3))->pluck('id')->toArray() // Randomly assign 1 to 3 students
            );
        }
    }
}
