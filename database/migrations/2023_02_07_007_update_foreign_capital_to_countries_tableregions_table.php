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
        Schema::table('regions', function (Blueprint $table) {
            $table->unsignedBigInteger("capital_id")->after("code")->nullable();
            $table->foreign("capital_id")
                ->references("id")
                ->on("cities");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->dropForeign("regions_capital_id_foreign");
            $table->dropColumn("capital_id");
        });
    }
};