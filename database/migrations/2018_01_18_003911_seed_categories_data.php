<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        =>'分享',
                'description' =>'分享创造，分享发现',
            ],
            [
                'name'        =>'知识',
                'description' =>'分享小知识，造福niwota~',
            ],
            [
                'name'        =>'问答',
                'description' =>'请保持友善，互帮互助',
            ],
            [
                'name'        =>'技术',
                'description' =>'技术知识',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
