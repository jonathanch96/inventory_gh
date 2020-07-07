<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemLedgerEntriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_ledger_entries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('item_code');
			$table->string('item_name')->nullable();
			$table->unsignedInteger('item_id');
			$table->string('description')->nullable();
			$table->string('document_no')->nullable();
			$table->unsignedInteger('document_type_id')->nullable();
			$table->string('document_type_name')->nullable();
			$table->unsignedInteger('document_id')->nullable();
			$table->string('location_code')->nullable()->default('GH');
			$table->double('quantity')->nullable()->default(0);
			$table->integer('reconciled')->nullable()->default(0);
			$table->unsignedInteger('reconciled_id')->nullable();
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
		Schema::drop('item_ledger_entries');
	}
}
