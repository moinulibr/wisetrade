<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment', function(Blueprint $table)
		{
			$table->foreign('salesid', 'payment_ibfk_1')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('usersid', 'payment_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment', function(Blueprint $table)
		{
			$table->dropForeign('payment_ibfk_1');
			$table->dropForeign('payment_ibfk_2');
		});
	}

}
