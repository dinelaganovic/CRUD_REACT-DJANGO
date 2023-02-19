<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use App\Models\Exam;
use App\Models\Material;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeC(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'informacije' => 'required',
            'ImePrezP'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $cs=new Course();
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        $cs::create($input);
        return redirect('/teacherpage')
                        ->with('success','Otvorili ste novi kurs.');
    
    }
    
    public function ZatvoriC(Request $request)
    {  
      $data=Course::find($request->id);
      $data->activnost='zatvoren';
      $data->save();
      return redirect('/teacherpage');
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function showCourse(Course $course)
    {
      $datacs=Course::all();
      $dat=Material::all();
      return view('auth.teacherpage',['course'=>$datacs],['material'=>$dat]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroyCr(Course $course)
    {
        $course->delete();
        return redirect('teacherpage');
    }

}
