<?php

use Illuminate\Database\Seeder;
use App\Orderline;

class OrderlinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Orderline::class,  50)->create();
    }
}
