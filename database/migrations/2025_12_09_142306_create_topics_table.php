<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index()->comment('帖子标题');
            $table->text('content')->comment('帖子内容');
            $table->unsignedBigInteger('user_id')->index()->comment('作者ID');
            $table->unsignedBigInteger('category_id')->index()->comment('分类ID');
            $table->unsignedInteger('reply_count')->index()->default(0)->comment('帖子的回复数');
            $table->unsignedInteger('view_count')->index()->default(0)->comment('帖子的浏览数');
            $table->unsignedBigInteger('last_reply_user_id')->index()->default(0)->comment('最后一个回复用户ID');
            $table->unsignedInteger('order')->index()->default(0)->comment('排序');
            $table->text('desc')->nullable()->comment('SEO内容索引');
            $table->string('slug')->nullable()->comment('SEO优化');
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
        Schema::dropIfExists('topics');
    }
};
