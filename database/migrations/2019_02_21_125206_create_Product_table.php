<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	public function up()
	{
		Schema::create('Product', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('type', array('simple', 'variant'));
			$table->string('name', 255);
			$table->integer('provider_id')->unsigned()->nullable();
			$table->enum('visibility', array('visible', 'not_visible_individual'));
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('variation_name', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Product');
	}
}