<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('levels', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('level_id')->references('id')->on('levels')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->foreign('level_id')->references('id')->on('levels')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

	}

	public function down()
	{
		Schema::table('levels', function(Blueprint $table) {
			$table->dropForeign('levels_stage_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_level_id_foreign');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_level_id_foreign');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_class_id_foreign');
		});
	}
}