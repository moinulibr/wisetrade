<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->string('name')->nullable();
			$table->string('designation')->nullable();
			$table->float('amount', 10)->nullable();
			$table->integer('status')->nullable();
			$table->integer('usersid')->nullable()->index('usersid');
			$table->integer('verified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee');
	}

}
