<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');

            
            $table->integer('listing_id')->unsigned();
            $table->string('file_name',50);
            $table->string('type');
            $table->string('s3_location',150)->nullable();

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
        Schema::dropIfExists('libraries');
    }
}
