<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('password');
			$table->string('email_verified', 16)->default('');
			$table->string('remember_token', 100)->nullable();
			$table->string('contact');
			$table->integer('type');
			$table->integer('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
