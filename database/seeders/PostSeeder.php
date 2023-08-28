<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        for($i=0;$i<50;$i++){
            $newPost = new Post();
            $newPost->title=$faker->word(3,true);
            $newPost->image=$faker->imageUrl(640, 480, 'posts', true);
            $newPost->description=$faker->paragraphs(2,true);
            $newPost->slug=$faker->slug();
            $newPost->save();
        };
    }
}
