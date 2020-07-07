<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('item_code')->nullable();
			$table->string('item_code_w_variant')->nullable();
			$table->string('item_name')->nullable();
			$table->double('item_quantity')->nullable()->default(0);
			$table->unsignedInteger('item_base_unit_1_id')->nullable()->default(1);
			$table->unsignedInteger('item_base_unit_2_id')->nullable()->default(2);
			$table->double('base_1_to_base_2')->nullable()->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}
}
