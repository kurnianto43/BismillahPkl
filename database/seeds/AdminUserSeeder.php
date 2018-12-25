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
        	'nama' => 'Aulia',
        	'email' => 'auliarahmi@gmail.com',
        	'password' => bcrypt(12345),
        ]);

        $user->assignRole('admin');
    }
}
