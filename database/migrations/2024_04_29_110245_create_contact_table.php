<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration {

	public function up()
	{
		Schema::create('contact', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->text('subject');
			$table->string('message');
		});
	}

	public function down()
	{
		Schema::drop('contact');
	}
}