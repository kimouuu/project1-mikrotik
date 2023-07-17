<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class iniseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'jabatan' => 'admin',
        ]);

        User::create([
            'name' => 'staff',
            'email' => 'staff@mail.com',
            'password' => 'password',
            'jabatan' => 'staff',
        ]);
    }
}
