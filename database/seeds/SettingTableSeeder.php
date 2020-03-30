<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'stages_ar' => 'ابتدائى - اعدادى - ثانوي - روضه',
            'stages_en' => 'KGS - Primary - Middle - Secondary',
            'educ_admin_name_ar' => 'اداره المرج التعليميه',
            'educ_admin_name_en' => 'El marg',
            'school_name_ar' => 'مدارس الخطيب',
            'school_name_en' => 'El khateb schools',
            'logo' => 'logo.png',
        ]);

    }
}
