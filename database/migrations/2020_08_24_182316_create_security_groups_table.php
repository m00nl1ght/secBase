<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sec_main_id')->unsigned();
            $table->foreign('sec_main_id')->references('id')->on('securities');

            $table->integer('sec_writer_id')->unsigned();
            $table->foreign('sec_writer_id')->references('id')->on('securities');

            $table->integer('sec_1')->unsigned();
            $table->foreign('sec_1')->references('id')->on('securities');

            $table->integer('sec_2')->unsigned();
            $table->foreign('sec_2')->references('id')->on('securities');

            $table->integer('sec_3')->unsigned();
            $table->foreign('sec_3')->references('id')->on('securities');

            $table->integer('sec_4')->unsigned();
            $table->foreign('sec_4')->references('id')->on('securities');

            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')->references('id')->on('dates');
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
        Schema::dropIfExists('security_groups');
    }
}
