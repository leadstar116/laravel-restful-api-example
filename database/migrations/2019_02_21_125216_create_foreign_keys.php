<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Product', function(Blueprint $table) {
			$table->foreign('provider_id')->references('id')->on('Provider')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Product', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('Product')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Price', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('Product')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('Product', function(Blueprint $table) {
			$table->dropForeign('Product_provider_id_foreign');
		});
		Schema::table('Product', function(Blueprint $table) {
			$table->dropForeign('Product_parent_id_foreign');
		});
		Schema::table('Price', function(Blueprint $table) {
			$table->dropForeign('Price_product_id_foreign');
		});
	}
}