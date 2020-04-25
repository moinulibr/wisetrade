<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDailyExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('daily_expense', function(Blueprint $table)
		{
			$table->foreign('projectsid', 'daily_expense_ibfk_1')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('usersid', 'daily_expense_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('daily_expense', function(Blueprint $table)
		{
			$table->dropForeign('daily_expense_ibfk_1');
			$table->dropForeign('daily_expense_ibfk_2');
		});
	}

}
