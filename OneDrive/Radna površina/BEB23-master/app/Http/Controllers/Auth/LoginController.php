<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *protected $redirectTo = RouteServiceProvider::HOME;

     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
         ]);

         $user=User::where('username', '=', $request->username)->first();
         if($user){
           if(Hash::check($request->password, $user->password)){
            if($user->tip=='admin'){
                $request->session()->put('loginId',$user->id);
                $request->session()->put('name',$user->firstname);
                 return redirect('adminpage');
            }elseif($user->tip=='teacher'){
                if($user->zahtev=='načekanju'){
                    return back()->with('fail','Vaš zahtev za registraciju još nije prihvaćen!');
                }elseif($user->zahtev=='odbijen'){
                    return back()->with('fail','Vaš zahtev za registraciju je odbijen!');
                }else{
                $request->session()->put('loginId',$user->id);
                $request->session()->put('name',$user->firstname);
                $request->session()->put('lastname',$user->lastname);
                return redirect('teacherpage');
                }
            }else{
                if($user->zahtev=='načekanju'){
                return back()->with('fail','Vaš zahtev za registraciju još nije prihvaćen!');
            }elseif($user->zahtev=='odbijen'){
                return back()->with('fail','Vaš zahtev za registraciju je odbijen!');
            }else{
                $request->session()->put('loginId',$user->id);
                $request->session()->put('name',$user->firstname);
                $request->session()->put('lastname',$user->lastname);
                return redirect('studentpage');
            }}
           }else{
            return back()->with('fail','Šifra nije ispravno uneta!');
           }
         }else{
            return back()->with('fail','Proverite korisničko ime i šifru da li su ispravno uneti!');
         }

    }
     public function logout(){
       if(Session()->has('loginId')){
           Session()->pull('loginId');
            return Redirect('login');
        }
     }
}
