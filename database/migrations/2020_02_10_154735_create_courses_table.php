<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar');
			$table->string('name_en');
			$table->string('teacher_ar');
			$table->string('teacher_en');
			$table->integer('level_id')->unsigned();
			$table->integer('class_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}