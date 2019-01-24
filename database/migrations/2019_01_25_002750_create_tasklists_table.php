<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasklists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();    // ユーザ識別用ID　追加
            $table->string('content');                          // 追加 VARCHAR(255)
            $table->string('status', 10);                       // 追加 VARCHAR(10)
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasklists');
    }
}
