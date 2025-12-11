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
        $data = [
            [
                'name'=>'文化',
                'description'=>'赏读优秀文章，提升心灵境界'
            ],
            [
                'name'=>'体育',
                'description'=>'最新体坛信息，耀眼体坛巨星'
            ],
            [
                'name'=>'旅行',
                'description'=>'欣赏不一样的旅途风景'
            ],
            [
                'name'=>'美食',
                'description'=>'天南地北，民以食为天'
            ],
            [
                'name'=>'历史',
                'description'=>'以历为镜，明辨是非'
            ],
        ];

        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        DB::table('categories')->truncate();
    }
};
