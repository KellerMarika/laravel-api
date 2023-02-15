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
  Schema::create('countries', function (Blueprint $table) {
   $table->id();

   $table->string("name");
   $table->string("official_name")->nullable();
   $table->string("code_two", 2);
   $table->string("code_three", 3)->nullable();
   $table->string("flag")->nullable();

   /* $table->unsignedBigInteger("capital_id");
   $table->foreign("capital_id")
   ->references("id")
   ->on("cities"); */

   $table->unsignedBigInteger("continent_id");
   $table->foreign("continent_id")
    ->references("id")
    ->on("continents");

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
  Schema::dropIfExists('countries');
 }
};