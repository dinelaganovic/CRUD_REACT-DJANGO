<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Course;
use App\Models\News;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function showN()
    { 
      $por="otvoren";
      $today=date("Y/m/d");
      $prikaz=date('Y-m-d', strtotime($today. ' - 7 days'));
      $datan=News::where([['created_at', '>', $prikaz]])->get();
      $datac=Contact::all();
      $datacs=Course::all()->where('activnost', '=', $por);;
      return view('homepage',['news'=>$datan, 'contact'=>$datac, 'course'=>$datacs]);
    } 
}
