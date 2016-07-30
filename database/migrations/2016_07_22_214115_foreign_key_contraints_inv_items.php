<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeyContraintsInvItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inv_items', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('inv_types');
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
        Schema::table('inv_items', function (Blueprint $table) {
            $table->dropForeign('inv_items_type_id_foreign');
            $table->dropForeign('inv_items_updated_by_foreign');
        });
    }
}
