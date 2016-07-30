<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('reference');
            $table->text('description');
            $table->integer('location_id')->unsigned();
            // ->foreign('location_id')->references('id')->on('location');
            $table->integer('invtype_id')->unsigned();
            // ->foreign('invtype_id')->references('id')->on('invtype');
            $table->integer('updated_person_id')->unsigned();
            // ->foreign('updated_person_id')->references('id')->on('person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inv_items');
    }
}
