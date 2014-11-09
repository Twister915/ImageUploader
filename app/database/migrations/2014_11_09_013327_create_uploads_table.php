<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uploads', function (Blueprint $table) {
			$table->increments('id');
			$table->text('url');
			$table->integer('api_key_id')->unsigned();
			$table->foreign('api_key_id')->references('id')->on('api_keys');
			$table->text('type');
			$table->text('filename');
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
		Schema::dropIfExists('uploads');
	}

}
