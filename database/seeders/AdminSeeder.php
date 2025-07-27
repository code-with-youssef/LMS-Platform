<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin -> name = 'admin';
        $admin -> email = 'Admin@gmail.com';
        $admin -> password = Hash::make('123456789');
        $admin -> role = 'admin';
        $admin->save();

    }
}
