<?php

namespace App\Traits;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentMail;
use App\Mail\TeacherMail;

trait HelperTrait
{
    public function sendMailToStudent($user,$result){
        Mail::to($user)->send(new StudentMail($result));
    }

    public function sendMailToTeacher($user,$name){
        Mail::to($user)->send(new TeacherMail($name));
    }
}