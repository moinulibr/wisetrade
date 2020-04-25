<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salary', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('employeeid')->nullable()->index('employeeid');
			$table->timestamp('dates')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->float('amount', 10)->nullable();
			$table->float('bonus', 10)->nullable();
			$table->float('penalty', 10)->nullable();
			$table->integer('status')->nullable();
			$table->integer('bankid')->nullable()->index('bankid');
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
		Schema::drop('salary');
	}

}
