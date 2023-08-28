<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $catergories=[ 'News', 'Sport', 'Music', 'Art', 'Movies', 'Books', 'Games'];
         foreach($catergories as $category)
          {
            $NewCategory=New Category;
            $NewCategory->name= $category;//gli elementi cilcati dell'array
            $NewCategory->slug=Str::of($category)->slug('-');
            $NewCategory->save();

          };
       
    }
}
