<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolled;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherpage(){
        return view('auth.teacherpage');
    }

    public function analysisT(){
        $datacs=Course::all();
        $datac=Enrolled::all();
        return view('auth.analysisT', ['course'=>$datacs],['enrol'=>$datac]);
    }
}
 

