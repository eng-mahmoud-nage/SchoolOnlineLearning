<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLevelsTable extends Migration {

	public function up()
	{
		Schema::create('levels', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar');
			$table->string('name_en');
			$table->integer('stage_id')->unsigned();
			$table->string('user_name')->unique();
			$table->string('password');

		});
	}

	public function down()
	{
		Schema::drop('levels');
	}
}