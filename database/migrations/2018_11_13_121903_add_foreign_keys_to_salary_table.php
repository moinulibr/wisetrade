<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSalaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('salary', function(Blueprint $table)
		{
			$table->foreign('employeeid', 'salary_ibfk_1')->references('id')->on('employee')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('bankid', 'salary_ibfk_2')->references('id')->on('bank')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('usersid', 'salary_ibfk_3')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('salary', function(Blueprint $table)
		{
			$table->dropForeign('salary_ibfk_1');
			$table->dropForeign('salary_ibfk_2');
			$table->dropForeign('salary_ibfk_3');
		});
	}

}
