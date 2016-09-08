<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeyConstraintsInvTypesCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inv_types_categories', function (Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('inv_types');
			$table->foreign('category_id')->references('id')->on('inv_categories');
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inv_types_categories', function (Blueprint $table) {
			$table->dropForeign('inv_types_categories_type_id_foreign');
            $table->dropForeign('inv_types_categories_category_id_foreign');
        });
    }
}
