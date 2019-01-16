<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'email'      => 'jordanabryan88@gmail.com',
			'password'   => Hash::make('qwerty1'),
			'name' => 'Jordan Bryan',
			'created_at' => new DateTime(),
			'updated_at' => new DateTime()
		]);
	}

}