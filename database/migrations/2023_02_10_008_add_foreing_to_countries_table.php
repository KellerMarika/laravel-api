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
        Schema::table('countries', function (Blueprint $table) {
            /*    $table->unsignedBigInteger('path_title')->nullable()->after('coordinates_id');
            $table->foreign('path_title')->references('title')->on('paths'); */


            $table->string('path_code')->nullable()->after('coordinates_id')->index();
            $table->foreign('path_code')->references('code')->on('paths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            /*          $table->dropForeign("countries_path_title_foreign");
            $table->dropColumn("path_title"); */

            $table->dropForeign("countries_path_code_foreign");
            $table->dropColumn("path_code");
        });
    }
};