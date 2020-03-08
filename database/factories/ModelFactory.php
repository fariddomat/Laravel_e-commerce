<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
   
    
    return [
        'name'=>$faker->sentence(3),
        'img'=>'default.png',
        'desc'=>$faker->paragraph(4),
        'price'=>$faker->numberBetween(100,10000),
    ];
});
