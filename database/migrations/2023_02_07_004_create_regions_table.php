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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("code", 2)->nullable();

            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")
                ->references("id")
                ->on("countries");

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
        Schema::dropIfExists('regions');
    }
};