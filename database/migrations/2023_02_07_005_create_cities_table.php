<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("zip_code", 10)->nullable();
            $table->unsignedInteger("population")->nullable();

            $table->unsignedBigInteger("region_id");
            $table->foreign("region_id")
                ->references("id")
                ->on("regions");

            $table->unsignedBigInteger("coordinates_id")->nullable();
            $table->foreign("coordinates_id")
                ->references("id")
                ->on("coordinates");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};