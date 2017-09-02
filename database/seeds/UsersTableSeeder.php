<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create(
                [
                    'name' => 'Natan Melo',
                    'email' => 'natan.suporte@hotmail.com',
                    'admin' =>  true,
                    'password' => bcrypt('inside')
                ]
        );
    }

}
