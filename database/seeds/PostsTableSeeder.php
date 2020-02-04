<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::all()->pluck('id')->toArray();
        $faker = Faker::create();

        DB::table('posts')->insert([
            [
                'user_id' =>Arr::random($user),
                'title' => 'How to use a lightsaber efficiently',
                'body' => $faker->text($maxNbChars = 2000),
            ],
            [
                'user_id' =>Arr::random($user),
                'title' => 'How to deal with an distant father',
                'body' => $faker->text($maxNbChars = 2000),
            ],
            [
                'user_id' =>Arr::random($user),
                'title' => 'How to lose a holochess game to a Wookie',
                'body' => $faker->text($maxNbChars = 2000),
            ],
        ]);
    }
}
