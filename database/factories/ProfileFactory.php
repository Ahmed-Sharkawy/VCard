<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      "profile_name"  =>  $this->faker->name(),
      "phone"         =>  $this->faker->phoneNumber(),
      "email"         =>  $this->faker->unique()->freeEmail(),
      "fb"            =>  $this->faker->url(),
      "linkedin"      =>  $this->faker->url(),
      "github"        =>  $this->faker->url(),
      "profile_pic"   =>  "2022-04-22_62629671ec67f.jpg",
      "user_id"       =>  "1"
    ];
  }
}
