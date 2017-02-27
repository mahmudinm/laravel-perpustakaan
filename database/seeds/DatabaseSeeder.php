<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	  App\User::create([
        'name' => 'admin',
        'email' => 'admin@email.com',
        'password' => bcrypt('password'),
        'alamat' => 'dont have',
        'no_handphone' => 'dont have',
        'nim' => 1503123123
      ]);
    }
}
