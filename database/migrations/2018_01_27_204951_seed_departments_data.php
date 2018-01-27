<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDepartmentsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $departments = [
            [
                'name'        => '总经办',
                'description' => '总经理办公室,权威的信息~',
            ],
            [
                'name'        => '人力资源部',
                'description' => '人资，招聘信息应有尽有~',
            ],
            [
                'name'        => '百货',
                'description' => '这里充满着促销信息~',
            ],
            [
                'name'        => '信息管理部',
                'description' => '查数请找我们~',
            ],
        ];

        DB::table('departments')->insert($departments);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('departments')->truncate();
    }
}
