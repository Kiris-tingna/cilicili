<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('av')->unique(); // 资源唯一标识
            $table->string('name');         // 分集名称
            $table->string('description');  // 分集剧情
            $table->integer('episode');     // 所在专辑中的集数
            $table->integer('special_id');  // 专辑id
            $table->string('source_uri');   // 资源地址
            $table->string('picture_uri');  // 图片地址

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
        Schema::drop('videos');
    }
}