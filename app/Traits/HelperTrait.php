<?php

namespace App\Traits;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentTeacher;

trait HelperTrait
{
    public function sendMail($user){
        Mail::to($user)->send(new StudentTeacher);
    }
}