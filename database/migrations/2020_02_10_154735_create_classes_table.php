<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassesTable extends Migration {

	public function up()
	{
		Schema::create('classes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar');
			$table->string('name_en');
			$table->integer('level_id')->unsigned();
			$table->boolean('active')->default(1);
		});
	}

	public function down()
	{
		Schema::drop('classes');
	}
}