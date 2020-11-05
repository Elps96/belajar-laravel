<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Karyawan;
use Faker\Generator as Faker;

$factory->define(Karyawan::class, function (Faker $faker) {
    return [
        'user_id'       =>  50,
        'name'          =>  $faker->name,
        'email'         =>  $faker->email,
        'grade_id'      =>  $faker->randomElement($array = array ('1','2','3')),
        'jenis_kelamin' =>  $faker->randomElement($array = array ('L','P')),
        'tanggal_lahir' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggal_masuk' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
        'password'      =>  Hash::make('asdqwe123')

    ];
});
