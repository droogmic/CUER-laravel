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
        Schema::create('inv_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('type_id')->unsigned();
            // ->foreign('type_id')->references('id')->on('inv_type');
            $table->string('reference')->unique()->nullable();
            
            $table->integer('location_id')->unsigned()->nullable();
            // ->foreign('location_id')->references('id')->on('locations');
            
            $table->integer('updated_by')->unsigned()->nullable();
            // ->foreign('updated_by')->references('id')->on('person');
            
            // polymorphic
            // $table->integer('storage_id')->unsigned()->nullable();
            // $table->string('storage_type')->nullable();
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
