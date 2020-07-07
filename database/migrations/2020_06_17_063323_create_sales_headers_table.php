<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_no');
            $table->date('document_date');
            $table->string('document_memo')->nullable();
            $table->string('document_memo_2', 253)->nullable();
            $table->string('external_document')->nullable();
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
        Schema::dropIfExists('sales_headers');
    }
}
