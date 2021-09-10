<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(MealsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderlinesTableSeeder::class);
    }
}
