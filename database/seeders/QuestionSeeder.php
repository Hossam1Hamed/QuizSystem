<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
   
    public function run()
    {
        Question::create([
            'text' => 'what is club of the century in africa' ,
        ]);
        Question::create([
            'text' => 'Alahly' ,
            'parent_id' => '1' ,
        ]);
        Question::create([
            'text' => 'Elzamalek' ,
            'parent_id' => '1' ,
        ]);
        Question::create([
            'text' => 'Taragy' ,
            'parent_id' => '1' ,
        ]);
        Question::create([
            'text' => 'Rajaa' ,
            'parent_id' => '1' ,
        ]);
        Question::create([
            'text' => 'what is club of the century in Eaurop' ,
        ]);
        Question::create([
            'text' => 'Real Madrid' ,
            'parent_id' => '6' ,
        ]);
        Question::create([
            'text' => 'Barcelona' ,
            'parent_id' => '6' ,
        ]);
        Question::create([
            'text' => 'AC Milan' ,
            'parent_id' => '6' ,
        ]);
        Question::create([
            'text' => 'Arsenal' ,
            'parent_id' => '6' ,
        ]);
        Question::create([
            'text' => 'what is club of the century in Asia' ,
        ]);
        Question::create([
            'text' => 'El Helal' ,
            'parent_id' => '11' ,
        ]);
        Question::create([
            'text' => 'Al Nasr' ,
            'parent_id' => '11' ,
        ]);
        Question::create([
            'text' => 'El Etihad' ,
            'parent_id' => '11' ,
        ]);
        Question::create([
            'text' => 'Al Sad' ,
            'parent_id' => '11' ,
        ]);
    }
}
