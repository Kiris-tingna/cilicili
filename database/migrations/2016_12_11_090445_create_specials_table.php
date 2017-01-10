<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');           // 专辑名称
            $table->string('info');                 // 次要介绍(看点)
            $table->text('description')->nullable();// 简要介绍
            $table->string('picture_uri');          // 图片地址

            $table->string('area');          // 地区
            $table->smallInteger('year');    // 年份
            $table->smallInteger('month');   // 月份
            $table->smallInteger('weekday'); // 周几更新
            $table->string('state');         // 状态 连载/完结
            $table->smallInteger('particles');    // 目前为止的集数

            $table->integer('played')->default(0);      // 播放次数
            $table->integer('commented')->default(0);   // 评论次数
            $table->integer('liked')->default(0);       // 被喜欢次数

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
        Schema::drop('specials');
    }
}
