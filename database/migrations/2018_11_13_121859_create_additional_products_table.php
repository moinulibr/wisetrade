<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdditionalProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('additional_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('productsid')->nullable()->index('productsid');
			$table->integer('stock')->nullable();
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
		Schema::drop('additional_products');
	}

}
