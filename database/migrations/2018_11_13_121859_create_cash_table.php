<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCashTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cash', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->float('amount', 10)->nullable();
			$table->timestamp('dates')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('paymentid')->nullable();
			$table->integer('daily_expenseid')->nullable();
			$table->integer('usersid')->nullable()->index('usersid');
			$table->integer('verified')->nullable();
			$table->integer('debit_credit')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cash');
	}

}
