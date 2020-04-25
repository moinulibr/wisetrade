<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailyExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_expense', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('projectsid')->nullable()->index('projectsid');
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->float('amount', 10)->nullable();
			$table->integer('paymentmethod')->nullable();
			$table->integer('status')->nullable();
			$table->timestamp('dates')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('daily_expense');
	}

}
