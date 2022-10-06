<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=['total_points','user_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot(['option_id' , 'points']);
    }
}
