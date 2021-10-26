<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\model\ClassRoom;
use Faker\Generator as Faker;

$factory->define(ClassRoom::class, function (Faker $faker) {
    $shift = ['matutino', 'vespertino', 'noturno'];
    $leve_education = ['infantil', 'fundamental 1', 'fundamental 2', 'médio'];
    $serie = ['1º ano', '2º ano', '3º ano', '4º ano', '5º ano', '6º ano', '7º ano', '8º ano', '9º ano'];
    shuffle($shift);
    shuffle($leve_education);
    shuffle($serie);
    return [
        //$class['id'] = $id;
        'year' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'level_education' => $leve_education[0],
        'serie' => $serie[0],
        'shift' => $shift[0]      //$class['school_id'] = $request['school_id'];
    ];
});
