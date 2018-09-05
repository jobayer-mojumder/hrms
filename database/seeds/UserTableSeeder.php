<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {

        User::create(array(
            'id' => '1',
            'name' => 'Jobayer Mojumder',
            'email' => 'jobayer.pro@gmail.com',
            'group' => '1',
            'password' => '$2y$10$aj/FknNqooEjuOVp2p8Ch.FfvLvrvgvAVcN56BhcnxB451HiVscEe',
            'image' => '1505808265_587964.jpg',
            'thumb' => 'thumb_1505808265_587964.jpg',
            'image_path' => 'public/assets/user/',
            'status' => '1',
        ));
    }

}