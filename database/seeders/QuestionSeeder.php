<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Category;
use Faker;
class QuestionSeeder extends Seeder
{
   
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::all();

        foreach($categories as $category)
        {
            foreach(range(1,2) as $index)
            {
                $category->questions()->create([
                    'question_text' => $faker->sentence(4)
                ]);
            }
        }
        
    }
}
