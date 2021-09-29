<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status_id')->unsigned();
            $table->integer('industry_id')->unsigned();

            $table->string('number',100);
            $table->string('title',1000);
            $table->text('description',255);
            $table->date('staring_date');//starting
            $table->date('making_money_date');

            $table->decimal('price',10,0);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('industry_id')->references('id')->on('industry')->onDelete('restrict')->onUpdate('cascade');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
