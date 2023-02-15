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
        Schema::create('continents', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code", 2)->nullable();
            $table->unsignedBigInteger("area")->nullable();

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
    public function down() {
        Schema::dropIfExists('continents');
    }
};