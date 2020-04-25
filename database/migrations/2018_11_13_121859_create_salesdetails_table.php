<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salesdetails', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('salesid')->nullable()->index('salesid');
			$table->integer('productsid')->nullable()->index('productsid');
			$table->float('vat', 10)->nullable();
			$table->float('discount', 10)->nullable();
			$table->integer('quantity')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('salesdetails');
	}

}
