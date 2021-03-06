<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
	public function up()
	{
		Schema::create('notices', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('reply_count')->unsigned()->default(0);
            $table->integer('view_count')->unsigned()->default(0);
            $table->integer('last_reply_user_id')->unsigned()->default(0);
            $table->boolean('sticky_post')->default(false);
            $table->integer('order')->unsigned()->default(0);
            $table->text('excerpt');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('notices');
	}
}
