<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('stages_ar');
			$table->string('stages_en');
			$table->string('educ_admin_name_ar');
			$table->string('educ_admin_name_en');
			$table->string('school_name_ar');
			$table->string('school_name_en');
			$table->string('logo');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}