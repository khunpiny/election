<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('header_name');
            $table->integer('master_id')->unsigned();
            $table->foreign('master_id')->references('id')->on('users');
            $table->string('tel');
            $table->string('province');
            $table->string('amphoe');
            $table->string('district');
            $table->string('comment')->nullable();
            $table->text('image');
            $table->string('email')->unique();
            $table->enum('status', ['0', '1']);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('headers');
    }
}
