<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use Faker\Factory;
class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $questions = Question::all();

        foreach($questions as $question)
        {
            $correctOption = rand(1,4);

            foreach(range(1,4) as $index)
            {
                $question->options()->create([
                    'option_text' => $faker->unique()->word,
                    'points' => $index == $correctOption ? 1 : 0,
                ]);
            }
        }
    }
}
