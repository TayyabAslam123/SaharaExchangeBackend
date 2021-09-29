<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_ticket', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable();

            $table->string('name',100);
            $table->string('email',50);
            $table->string('subject',100);
            $table->string('priority',50)->nullable();
            $table->tinyInteger('status_id')->unsigned()->nullable();
            $table->boolean('is_completed')->default(false);
          
            $table->timestamps();
            
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_ticket');
    }
}
