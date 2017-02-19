<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('conversations', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('adviser_id')->unsigned();
			$table->foreign('adviser_id')->references('id')->on('users');
            $table->integer('advisee_id')->unsigned();
			$table->foreign('advisee_id')->references('id')->on('users');
			$table->rememberToken();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::dropIfExists('conversations');
    }
}
