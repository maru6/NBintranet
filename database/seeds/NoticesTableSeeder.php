<?php

use Illuminate\Database\Seeder;
use App\Models\Notice;
use App\Models\User;
use App\Models\Department;

class NoticesTableSeeder extends Seeder
{
    public function run()
    {
    // 所有用户 ID 数组，如：[1,2,3,4]
    $user_ids = User::all()->pluck('id')->toArray();

    // 所有分类 ID 数组，如：[1,2,3,4]
    $department_ids = department::all()->pluck('id')->toArray();

    // 获取 Faker 实例
    $faker = app(Faker\Generator::class);

    $notices = factory(Notice::class)
                     ->times(50)
                     ->make()
                     ->each(function ($notice, $index)
                        use ($user_ids, $department_ids, $faker)
    {
        // 从用户 ID 数组中随机取出一个并赋值
        $notice->user_id = $faker->randomElement($user_ids);

        // 话题分类，同上
        $notice->department_id = $faker->randomElement($department_ids);

    });

      Notice::insert($notices->toArray());
    }

}
