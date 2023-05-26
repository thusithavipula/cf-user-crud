<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\UserModel;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
            $user_data = $this->generateFakeUser();
            $user = new UserModel();
            $user->insertUser($user_data);
        }
    }

    private function generateFakeUser()
    {
        $faker = Factory::create();
        $user_data = array(
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'email' => $faker->email(),
            'mobile' => $faker->phoneNumber(),
            'user_name' => $faker->userName(),
            'password' => $faker->password(6, 20)
        );
        return $user_data;
    }
}
