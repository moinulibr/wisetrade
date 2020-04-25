<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBankDepositTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bank_deposit', function(Blueprint $table)
		{
			$table->foreign('bankid', 'bank_deposit_ibfk_1')->references('id')->on('bank')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('usersid', 'bank_deposit_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bank_deposit', function(Blueprint $table)
		{
			$table->dropForeign('bank_deposit_ibfk_1');
			$table->dropForeign('bank_deposit_ibfk_2');
		});
	}

}
