<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->text('operation');
            $table->string('ip',50);
            $table->timestamps();
        });

        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
