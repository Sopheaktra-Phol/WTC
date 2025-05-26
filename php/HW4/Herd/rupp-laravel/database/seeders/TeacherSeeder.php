<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('teacher')->insert([
            'name' => Str::random(10),                                      
            'email' => Str::random(10).'@example.com',
            'degree' => Str::random(10),
        ]);
    }
}
