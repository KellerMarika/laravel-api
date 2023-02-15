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
        Schema::table('paths', function (Blueprint $table) {
 /*            $table->string("title")->unique()->change(); */
          /*   $table->string("code")->unique()->change(); */
            $table->unique('code', 'paths_code_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paths', function (Blueprint $table) {
         /*    $table->string("title")->nullable()->change(); */
         $table->dropUnique('paths_code_unique');
        });
    }
};
