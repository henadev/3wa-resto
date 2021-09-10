<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'name' =>  $faker -> word,
        'photo'  =>  $faker -> imageUrl( 640, 480, 'food'),
        'description'  =>  $faker -> sentence,
        'stock_quantity'  =>   $faker -> numberBetween(1,  2),
        'buy_price'  =>  $faker -> randomFloat(3, 2, 150),
        'sale_price'  =>$faker -> randomFloat(3, 2, 200),
        'created_at'  =>  now()
    ];
});
