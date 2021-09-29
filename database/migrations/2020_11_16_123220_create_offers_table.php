<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_id')->unsigned();
            $table->integer('buyer_id')->unsigned();
            $table->decimal('amount',10,0);
            $table->string('message',255);
            $table->timestamps();
            
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
