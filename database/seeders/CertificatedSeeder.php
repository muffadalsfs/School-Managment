<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;
class CertificatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
        Certificate::create([
            'name' => 'Laravel Mastery',
            'description' => 'This certificate is awarded for completing the Laravel Mastery course.',
            'is_active' => 1
        ]);

        Certificate::create([
            'name' => 'PHP Expert',
            'description' => 'This certificate is awarded for mastering PHP programming.',
            'is_active' => 1
        ]);
    
    }
}
