<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('customersid')->nullable()->index('customersid');
			$table->integer('projectsid')->nullable()->index('projectsid');
			$table->timestamp('dates')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('usersid')->nullable();
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
		Schema::drop('sales');
	}

}
