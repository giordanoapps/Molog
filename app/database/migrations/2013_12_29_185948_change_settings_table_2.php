<?php

use Illuminate\Database\Migrations\Migration;

class ChangeSettingsTable2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function($table)
		{
			$table->float('font_color');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function($table)
		{
			$table->dropColumn('font_color');
		});
	}

}