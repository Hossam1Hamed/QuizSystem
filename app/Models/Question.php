<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['text' , 'parent_id'];


    public function question()
    {
        return $this->belongsTo(Question::class, 'parent_id', 'id');
    }

    public function choices()
    {
        return $this->hasMany(Question::class, 'parent_id');
    }
}
