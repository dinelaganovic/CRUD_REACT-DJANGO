<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolled;
use App\Models\Exam;
use App\Models\Material;
use App\Models\Question;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Storage;
use App\Models\Result;

class StudentController extends Controller
{
    public function studentpage(){
        return view('auth.studentpage');
    }

    public function showCourses()
    { 
      $urid=Session()->get('loginId');
      $por="otvoren";
      $enrr=Enrolled::select('course_id')->where('user_id', '=', $urid)->get()->toArray();
      $datacsm=Course::where([['activnost', '=', $por]])->whereNotIn('id', $enrr)->get();
      return view('auth.studentpage',['courses'=>$datacsm]);
    } 

    public function EnrollS(Request $request){
        $s=new Enrolled();
        $s->user_id=$request->user_id;
        $s->course_id=$request->course_id;
        $res=$s->save();
        if($res==true){
           return redirect('/studentpage');
        }
    }

    public function mycourses(){
        return view('auth.mycourses');
    }

    public function showCM()
    {  
        $urid=Session()->get('loginId');
        $por="otvoren";
        $enrr=Enrolled::select('course_id')->where('user_id', '=', $urid)->get()->toArray();
        $datacs=Course::where([['activnost', '=', $por]])->whereIn('id',$enrr)->get();
        $dm=Material::all();
        return view('auth.mycourses',['coursesm'=>$datacs],['material'=>$dm]);
    }

    public function download(Request $request,$file){
        return response()->download(public_path('images/'.$file));
    }

    public function teststudentpage(){
        return view('auth.teststudentpage');
    }

    public function ExS(){
        $urid=Session()->get('loginId');
        $enrr=Enrolled::select('course_id')->where('user_id', '=', $urid)->get()->toArray();
        $datex=Exam::whereIn('course_id',$enrr)->get();
        return view('auth.teststudentpage',['exams'=> $datex]);
    }

    public function examP(Request $request){
        $datex=Question::all()->where('exam_id','=',$request->id);
        return view('auth.testpitanja',['pitanja'=>$datex]);
    }
    public function submit_question(Request $request){

        $yes_ans=0;
        $no_ans=0;
        $data=$request->all();
        $result=array();
        for($i=1; $i<=$request->index; $i++)
        {
            if(isset($data['question'.$i]))
            {
                $question=Question::where('id', $data['question'.$i])->get()->first();
                if($question->odgovor===$data['ans'.$i])
                {
                    $result[$data['question'.$i]]='YES';
                    $yes_ans++;
                }
                else{
                    $result[$data['question'.$i]]='NO'; 
                    $no_ans++; 
                }
            }
        }
        $datares=new Result();
        $datares->exam_id=$request->test_id;
        $datares->user_id=Session()->get('loginId');
        $datares->yes_ans=$yes_ans;
        $datares->no_ans=$no_ans;
        $datares->save();
        return redirect('/analysis')->with('success','Imate '.$yes_ans.' tačna i '.$no_ans.'netačnih odgovora na testu.');
    }

    public function analysis(){
        $result_info=Result::all();
        return view('auth.analysis',['results'=>$result_info]);
    }

}
