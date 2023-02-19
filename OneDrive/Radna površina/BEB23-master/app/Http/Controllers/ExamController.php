<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
  public function testpage(){
    return view('auth.testpage');
}
    public function AddExam(Request $request){
        $exam=new Exam();
        $exam->name=$request->name;
        $exam->težina=$request->težina;
        $exam->course_id=$request->csid;
        $exam->save();
        return redirect('/testpage')->with('success','Uspešno ste kreirali test.');
    }
      public function showExam()
    { 
      $courses=Course::all();
      $exams=Exam::with('courses')->get();
      $result=Result::all();
      $questions=Question::all();
      return view('auth.testpage',compact('courses','exams','result','questions'));
    }

    public function destroyExm(Exam $exam)
    {
        $exam->delete();
        return redirect('testpage');
    }
}
