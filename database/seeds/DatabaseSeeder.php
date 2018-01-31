<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
		$this->call(TopicsTableSeeder::class);
		$this->call(NoticesTableSeeder::class);
        $this->call(ReplysTableSeeder::class);
        $this->call(NoticereplysTableSeeder::class);
        $this->call(LinksTableSeeder::class);
    }
}
