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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('profile_img');
            $table->dropColumn('cover_img');
            $table->dropColumn('primary_color');
            $table->dropColumn('secondary_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('primary_color')->nullable()->default('hsl(276, 36%, 40%)');
            $table->string('secondary_color')->nullable()->default('rgb(233, 216, 231)');
        });
    }
};
