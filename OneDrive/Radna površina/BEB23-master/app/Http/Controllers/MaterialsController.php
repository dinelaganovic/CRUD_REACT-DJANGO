<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function addLectures(Request $request ){
        $this->validate($request,[
            'course_id'=>'required',
            'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);
        $lecture=new Material();
        $lecture->course_id=$request->course_id;
        if($file=$request->file('file'))
        {
          $file->move('images',$file->getClientOriginalName());
          $file_name=$file->getClientOriginalName();
          $lecture->file=$file_name;
        }
        $lecture->save();
   
        return redirect('/teacherpage')->with('success','Uspešno ste postavili materijal');
    }

}
