<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['option_text' , 'points' , 'question_id' , 'created_at' , 'updated_at'];
    public function question()
    {
        return $this->belongsTo(Question::class , 'question_id');
    }
}
