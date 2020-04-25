<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSalesdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('salesdetails', function(Blueprint $table)
		{
			$table->foreign('salesid', 'salesdetails_ibfk_1')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('productsid', 'salesdetails_ibfk_2')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('salesdetails', function(Blueprint $table)
		{
			$table->dropForeign('salesdetails_ibfk_1');
			$table->dropForeign('salesdetails_ibfk_2');
		});
	}

}
