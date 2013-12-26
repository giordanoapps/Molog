<?php

use Illuminate\Database\Migrations\Migration;

class CreateTwittersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('twitters', function($table)
		{
			$table->increments('id');

			$table->string('oauth_token');
			$table->string('oauth_token_secret');
			$table->string('user_id');
			$table->string('screen_name');

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
		Schema::drop('twitters');
	}

}