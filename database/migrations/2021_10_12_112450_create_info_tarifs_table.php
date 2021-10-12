<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_tarifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tarif_id');
            $table->text('short_description');
            $table->text('perks')->nullable();
            $table->text('abstract_painting')->nullable();
            $table->text('line_painting')->nullable();
            $table->text('pensil_painting')->nullable();
            $table->text('natural_painting')->nullable();
            $table->text('links')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_tarifs');
    }
}
