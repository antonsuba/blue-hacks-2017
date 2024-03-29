<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('conversation_id')->unsigned();
			$table->foreign('conversation_id')->references('id')->on('conversations'); 
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users'); // either be user or adviser
			$table->string('content');
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
		Schema::dropIfExists('messages');
    }
}
