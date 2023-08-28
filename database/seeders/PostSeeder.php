<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Category;
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
        $categories=Category::all();//prendo tutte le categorie (dal model)
        for($i=0;$i<50;$i++){
            $newPost = new Post();
            $newPost->category_id = ($faker->randomElement($categories))->id;//prendo id da una categoria randomica
            $newPost->title=$faker->word(3,true);
            $newPost->image=$faker->imageUrl(640, 480, 'posts', true);
            $newPost->description=$faker->paragraphs(2,true);
            //$newPost->slug=$faker->slug();
            $newPost->save();
        };
    }
}
