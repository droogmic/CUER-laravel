<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeyConstraintsInvItemList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inv_item_list', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('inv_items');
            $table->foreign('list_id')->references('id')->on('inv_lists');
        });
        Schema::table('inv_lists', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inv_item_list', function (Blueprint $table) {
            $table->dropForeign('inv_item_list_item_id_foreign');
            $table->dropForeign('inv_item_list_list_id_foreign');
        });
        Schema::table('inv_lists', function (Blueprint $table) {
            $table->dropForeign('inv_lists_location_id_foreign');            
            $table->dropForeign('inv_lists_updated_by_foreign');
        });
    }
}
