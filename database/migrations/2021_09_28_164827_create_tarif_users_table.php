<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tarif_id');
            $table->string('status')->nullable();
            $table->timestamps();
           /* $table->foreign("user_id")
            ->references("id")->on("users")
            ->onDelete("cascade");
            $table->foreign("tarif_id")
            ->references("id")->on("tarifs")
            ->onDelete("cascade");*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarif_users');
    }
}
