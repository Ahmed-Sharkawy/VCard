<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'name'      => 'Ahmed Al Sharkawy',
      'username'  => 'Ahmed Al Sharkawy',
      'img'       => "2022-04-27_6268b42fdf847.jpg",
      'email'     => 'ahmedmaher0110@gmail.com',
      'email_verified_at' => now(),
      'password'  => '$2y$10$J/0z8yo3iIwu2.HSypcEYOKFbcvX8zcEMNsAhaiLJdxUJArwLOf.u', // 123456
      'role'      => '2',
      'remember_token' => Str::random(10),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  public function unverified()
  {
    return $this->state(function (array $attributes) {
      return [
        'email_verified_at' => null,
      ];
    });
  }
}
