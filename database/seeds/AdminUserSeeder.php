<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'nama' => 'Admin',
        	'email' => 'admin@gmail.com',
            'username' => 'admin',
        	'password' => bcrypt(123),
        ]);
        $user->assignRole('admin');

    }
}
