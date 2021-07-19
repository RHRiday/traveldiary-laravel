<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('type');
            $table->string('checkpoint');
            $table->integer('budget');
            $table->text('description');
            $table->mediumText('direction');
            $table->text('additional_info');
            $table->timestamps();

            $table->foreign('location')->references('upazila')->on('upazilas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}