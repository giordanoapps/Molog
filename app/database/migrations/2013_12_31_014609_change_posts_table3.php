<?php

use Illuminate\Database\Migrations\Migration;

class ChangePostsTable3 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function($table)
		{
			$table->string('img');
			$table->integer('minutes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function($table)
		{
			$table->dropColumn('img');
			$table->dropColumn('minutes');
		});
	}

}