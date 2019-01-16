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
        	'nama' => 'Aulia Rahmi',
        	'email' => 'auliarahmi@gmail.com',
            'username' => 'admin',
        	'password' => bcrypt(12345),
        ]);

        $user->assignRole('admin');
    }
}
