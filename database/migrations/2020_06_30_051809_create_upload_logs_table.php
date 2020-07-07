<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('excel_name');
            $table->unsignedInteger('user_id');
            $table->string('document_no')->nullable();
            $table->string('slug_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_logs');
    }
}
