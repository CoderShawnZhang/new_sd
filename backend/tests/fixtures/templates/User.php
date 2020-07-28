<?php
// users.php file under template path (by default @tests/unit/templates/fixtures)
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'username' => $faker->title,
    'password' => $faker->realText,
    'auth_key' => $faker->firstName,
    'password_hash' => $faker->boolean,
    'password_reset_token' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'email' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'status' => $faker->imageUrl($width = 640, $height = 480),
    'created_at' => $faker->imageUrl($width = 640, $height = 480),
    'updated_at' => $faker->imageUrl($width = 640, $height = 480)
];