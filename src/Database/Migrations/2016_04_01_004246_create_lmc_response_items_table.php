<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLmcResponseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lmc_response_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('response_id')->index();
            $table->integer('question_id')->index();
            $table->integer('choice_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lmc_response_items');
    }
}