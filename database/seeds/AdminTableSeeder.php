<?php

use Illuminate\Support\Str;
use App\StudentAffairs\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name_ar' => 'owner',
            'name_en' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner@2020'),
            'active' => 1,
        ]);
    }
}
