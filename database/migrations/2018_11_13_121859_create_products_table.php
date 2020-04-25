<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->float('price', 10)->nullable();
			$table->float('vat', 10)->nullable();
			$table->float('discount', 10)->nullable();
			$table->integer('customersid')->nullable()->index('customersid');
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
		Schema::drop('products');
	}

}
