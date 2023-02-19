<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nname' => 'required',
            'detail' => 'required',
        ]);
   
        $news= new News();
        $news->name=$request->nname;
        $news->detail=$request->detail;
        $res=$news->save();
        if($res){
        return redirect('/adminpage')
                        ->with('success','Vest je kreirana uspešno.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
      
        return redirect('adminpage')
                        ->with('success','Obrisali ste vest.');
    }
}
