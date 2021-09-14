<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('type');
            $table->string('location_type');
            $table->mediumText('description');
            $table->mediumText('benefit')->nullable();
            $table->mediumText('rule')->nullable();
            $table->integer('price');
            $table->string('phone');
            $table->string('bkash')->nullable();
            $table->timestamp('deadline');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('location')->references('upazila')->on('upazilas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
