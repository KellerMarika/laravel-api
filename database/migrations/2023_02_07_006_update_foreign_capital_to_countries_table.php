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
    public function up() {
        Schema::table('countries', function (Blueprint $table) {
            $table->unsignedBigInteger("capital_id")->after("flag")->nullable();
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
    public function down() {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropForeign("countries_capital_id_foreign");
            $table->dropColumn("capital_id");
        });
    }
};