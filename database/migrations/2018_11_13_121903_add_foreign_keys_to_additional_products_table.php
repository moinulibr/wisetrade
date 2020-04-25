<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdditionalProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('additional_products', function(Blueprint $table)
		{
			$table->foreign('productsid', 'additional_products_ibfk_1')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('usersid', 'additional_products_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('additional_products', function(Blueprint $table)
		{
			$table->dropForeign('additional_products_ibfk_1');
			$table->dropForeign('additional_products_ibfk_2');
		});
	}

}
