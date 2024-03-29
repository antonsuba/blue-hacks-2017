<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('user_types', function (Blueprint $table) {
			$table->increments('id');
			
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');
			
			$table->integer('rating');
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
		Schema::dropIfExists('user_types');
    }
}
