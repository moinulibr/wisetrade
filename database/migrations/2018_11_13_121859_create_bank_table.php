<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->string('name')->nullable();
			$table->string('accountno')->nullable();
			$table->string('branch')->nullable();
			$table->float('balance', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bank');
	}

}
