<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status_id')->unsigned();

            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('company_name',100)->nullable();
            $table->string('address',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('phone_number',100)->nullable();
            $table->string('zip',20)->nullable();
            $table->string('email',50)->nullable();
            $table->string('image')->nullable();
            
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
        Schema::dropIfExists('profiles');
    }
}
