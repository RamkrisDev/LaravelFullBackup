<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //  \App\Models\Post::factory(10)->create();
        $faker=Faker::create();
        foreach(range(1,100)as $index){
            DB::table('posts')->insert([
                'title'=>$faker->text(40),
                'body'=>$faker->text(30)
            ]);
        }

    }
}
