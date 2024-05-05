<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('password');
			$table->string('phone');
			$table->integer('blood_type_id')->unsigned();
			$table->date('last_donation_date');
			$table->date('d_o_b');
			$table->integer('city_id')->unsigned();
			$table->integer('pin_code');
			$table->string('api_token',length:60)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}