<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('admin_name');
            $table->integer('header_id')->unsigned();
            $table->foreign('header_id')->references('id')->on('headers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tel');
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
        Schema::dropIfExists('admins');
    }
}
