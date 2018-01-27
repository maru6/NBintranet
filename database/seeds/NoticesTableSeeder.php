<?php

use Illuminate\Database\Seeder;
use App\Models\Notice;

class NoticesTableSeeder extends Seeder
{
    public function run()
    {
        $notices = factory(Notice::class)->times(50)->make()->each(function ($notice, $index) {
            if ($index == 0) {
                // $notice->field = 'value';
            }
        });

        Notice::insert($notices->toArray());
    }

}

