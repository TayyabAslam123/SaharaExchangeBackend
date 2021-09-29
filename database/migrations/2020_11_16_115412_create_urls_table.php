<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('listing_id')->unsigned();
            $table->string('type',50);
            $table->string('url',150);
            $table->string('google_analytics_token')->nullable()->default(null);

            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade')->onUpdate('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
