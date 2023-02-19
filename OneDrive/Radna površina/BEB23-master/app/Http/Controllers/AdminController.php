<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Session ;

class AdminController extends Controller
{
    public function adminpage(){
        return view('auth.adminpage');
    }

    public function show()
    {  
      $por="načekanju";
      $poro="odobreno";
      $tipt="teacher";
      $tips="student";
      $data=User::all()->where('zahtev', '=', $por);
      $datat=User::where([['zahtev', '=', $poro] ,['tip', '=', $tipt]])->get();
      $datas=User::where([['zahtev', '=', $poro] ,['tip', '=', $tips]])->get();
      $datan=News::all();
      $datac=Contact::all();
      return view('auth.adminpage',['user'=>$data,'news'=>$datan, 'contact'=>$datac,'teachers'=>$datat,'students'=>$datas]);
    } 
    
    public function AcceptR(Request $request)
    {  
      $data=User::find($request->id);
      $data->zahtev='odobreno';
      $data->save();
      return redirect('/adminpage');
    } 
    public function DeclineR(Request $request)
    {  
      $data=User::find($request->id);
      $data->zahtev='odbijeno';
      $data->save();
      return redirect('/adminpage');
    } 

    
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'adress' => 'required'

        ]);
   
        $input = $request->all();
           
        $contact->update($input);
     
        return redirect('adminpage#apass')
                        ->with('success','Ažurirana je kontakt stranica!');
    }
    public function destroyU(User $user)
    {
        $user->delete();
        return redirect('adminpage');
    }
}
