<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingMonetizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_monetizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_id')->unsigned();
            $table->integer('monetization_id')->unsigned();
            $table->timestamps();

                               
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('monetization_id')->references('id')->on('monetizations')->onDelete('cascade')->onUpdate('cascade');
          


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_monetizations');
    }
}
