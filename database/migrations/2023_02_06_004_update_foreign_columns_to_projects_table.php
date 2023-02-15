<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            /* foreing */
            /* 1/many */
            $table->unsignedBigInteger('type_id')->nullable()->after('cover_img');
            $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('level_id')->nullable()->after('type_id');
            $table->foreign('level_id')->references('id')->on('levels');


            /*  Admin +
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users'); */



            /*many/many */
            /*  $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages');
            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign("projects_type_id_foreign");
            $table->dropColumn("type_id");
            $table->dropForeign("projects_level_id_foreign");
            $table->dropColumn("level_id");
        });
    }
};