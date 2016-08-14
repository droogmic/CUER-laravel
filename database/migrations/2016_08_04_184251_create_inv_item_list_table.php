<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvItemListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_item_list', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('item_id')->unsigned();
            $table->integer('list_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inv_item_list');
    }
}
