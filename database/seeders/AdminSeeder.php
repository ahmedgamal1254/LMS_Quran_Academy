<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Admin::create([
            'name' => "أحمد قنديل",
            'email' => "ahmedkhandil@gmail.com",
            'password' => bcrypt("12345678"),
        ]);
    }
}
