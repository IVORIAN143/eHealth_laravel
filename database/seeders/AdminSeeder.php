<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'nurse',
            'name' => 'DEBBIE-LYN P. DOLOJAN,RN,MSN',
            'username' => 'School Nurse',
            'email' => 'glennalvareziv@gmail.com',
            'password' => Hash::make('ccqwe123!'),
        ]);
        User::create([
            'role' => 'doctor',
            'name' => 'NICOLAS L. ILAGAN, M.D., FPMSI.',
            'username' => 'University Physician & Director for Health Services',
            'email' => 'ehealthmate086@gmail.com',
            'password' => Hash::make('ccqwe123!'),
        ]);
        User::create([
            'role' => 'coordinator',
            'name' => 'ENGR. EDWARD B. PANGANIBAN, Ph,D.',
            'username' => 'Campus Coordinator',
            'email' => 'pigilito.official@gmail.com',
            'password' => Hash::make('ccqwe123!'),
        ]);
    }
}
