<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    for ($i = 0; $i < 100; $i++) {
      $data = [
        'name'    => $faker->name(),
        'address'    => $faker->address()
      ];

      // Simple Queries
      // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

      // Using Query Builder
      $this->db->table('orang')->insert($data);
    }
  }
}
