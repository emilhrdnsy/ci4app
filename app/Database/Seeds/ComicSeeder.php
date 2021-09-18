<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ComicSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create();
    for ($i = 0; $i < 50; $i++) {
      $data = [
        'title' => $faker->name(),
        'author'    => $faker->name(),
        'publisher'    => $faker->name(),
        'volume'    => $faker->randomNumber(2, true),
        'cover'    => $faker->image(),
        'cover' => $faker->imageUrl(360, 360, 'animals', true, 'cats'),
        'author'    => $faker->name(),
        'created_at'    => Time::createFromTimeStamp($faker->unixTime()),
        'updated_at'    => Time::createFromTimeStamp($faker->unixTime())
      ];

      // Simple Queries
      // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

      // Using Query Builder
      $this->db->table('comic')->insert($data);
    }
  }
}
