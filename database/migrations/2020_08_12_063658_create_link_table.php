<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(str_replace("=","",base64_encode('url')), function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('result');
            $table->dateTime('created');
            $table->dateTime('expired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(str_replace("=","",base64_encode('url')));
    }
}
