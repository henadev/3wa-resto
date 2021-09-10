<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Orderline;
use Faker\Generator as Faker;
use App\Order;
use App\Meal;


$factory->define(Orderline::class, function (Faker $faker) {
    return [
        'quantity_ordered'  =>  $faker -> numberBetween(1,  12),
        'price_each'  =>  $faker -> randomFloat(3,2,1000),
        'meal_id'  =>   Meal::get('id') -> random(),
        'order_id'  =>  Order::get('id') -> random(),
        'created_at'  =>  now()
    
    ];
});
