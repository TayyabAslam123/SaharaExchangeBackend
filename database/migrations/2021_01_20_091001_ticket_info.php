<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_info', function (Blueprint $table) {

        $table->increments('id');
        $table->integer('ticket_id')->unsigned();
        $table->text('message');
        
        $table->enum('user_type',['client','support']);
        $table->timestamps();
        
        $table->foreign('ticket_id')->references('id')->on('support_ticket')->onDelete('cascade')->onUpdate('cascade');

    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_info');
    }
}
