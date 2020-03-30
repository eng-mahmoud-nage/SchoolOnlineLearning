<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar');
			$table->string('name_en');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('active')->default(1);
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}