<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProviderTable extends Migration {

	public function up()
	{
		Schema::create('Provider', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
		});
	}

	public function down()
	{
		Schema::drop('Provider');
	}
}