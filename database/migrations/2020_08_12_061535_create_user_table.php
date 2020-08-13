<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(str_replace("=","",base64_encode('users')), function (Blueprint $table) {
            $table->increments('id');
            $table->string('googleId')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('subscription');
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
        Schema::dropIfExists(str_replace("=","",base64_encode('users')));
    }
}
