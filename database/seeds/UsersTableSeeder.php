<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        
        DB::table('users')->insert([
	        'name' => 'admin',
	        'email' => 'admin@gmail.com',
	        'email_verified_at' => now(),
	        'password' => Hash::make('admin'), 
            'role'=>'admin',
	        'remember_token' => str_random(10),
        ]);

	factory(App\User::class, 10)->create()->each(function ($user) {

         $user->posts()->save(factory(App\Post::class)->make());
          $user->posts()->save(factory(App\Post::class)->make());//creation d'un deuxième post pour un même utilisateur
    });

    }
}
