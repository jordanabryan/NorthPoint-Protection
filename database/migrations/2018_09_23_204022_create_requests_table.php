<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('services')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->boolean('contacted')->default(0);
            $table->string('form')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
