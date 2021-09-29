<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('guide_id')->nullable();
            $table->mediumText('info_letter');
            $table->date('date');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('guide_id')->references('id')->on('guides');
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
        Schema::dropIfExists('hires');
    }
}
