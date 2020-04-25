<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales', function(Blueprint $table)
		{
			$table->foreign('customersid', 'sales_ibfk_1')->references('id')->on('customers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('projectsid', 'sales_ibfk_2')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales', function(Blueprint $table)
		{
			$table->dropForeign('sales_ibfk_1');
			$table->dropForeign('sales_ibfk_2');
		});
	}

}
