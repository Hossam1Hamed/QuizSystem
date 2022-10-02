<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question_text' , 'category_id','created_at','updated_at'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function options()
    {
        return $this->hasMany(Option::class , 'question_id' , 'id');
    }
    
}
