<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceTable extends Migration {

	public function up()
	{
		Schema::create('Price', function(Blueprint $table) {
			$table->increments('id');
			$table->double('price')->default('0.0');
			$table->integer('product_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Price');
	}
}