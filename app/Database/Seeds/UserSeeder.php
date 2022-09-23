<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;


class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $user_data = [
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "user_name" => $faker->userName,
                "user_phone_number" => $faker->phoneNumber(),
                "user_email" => $faker->email,
                "user_password" => password_hash($faker->password, PASSWORD_DEFAULT)


            ];
            $userModel = new User();
            $userModel->save($user_data);
        }
    }
}