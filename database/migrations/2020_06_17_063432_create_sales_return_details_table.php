<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_return_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_header_id')->nullable();
            $table->string('document_no')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->double('quantity')->nullable();
            $table->unsignedInteger('item_base_unit_id')->nullable();
            $table->string('item_base_unit')->nullable();
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
        Schema::dropIfExists('sales_return_details');
    }
}
