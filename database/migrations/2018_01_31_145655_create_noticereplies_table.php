<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticerepliesTable extends Migration
{
	public function up()
	{
		Schema::create('noticereplies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('notice_id')->unsigned()->default(0)->index();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->text('content');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('noticereplies');
	}
}
