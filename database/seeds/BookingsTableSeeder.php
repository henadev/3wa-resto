<?php

use Illuminate\Database\Seeder;
use App\Booking;
class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Booking::class,  50)->create();
}
}
