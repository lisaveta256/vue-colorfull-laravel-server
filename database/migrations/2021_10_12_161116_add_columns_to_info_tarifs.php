<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInfoTarifs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_tarifs', function (Blueprint $table) {
            $table->enum('addons',['YES','NO', 'FREE'])->default('FREE')->after('perks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //  Schema::table('info_tarifs', function (Blueprint $table) {
            //
     //   });
    }
}
