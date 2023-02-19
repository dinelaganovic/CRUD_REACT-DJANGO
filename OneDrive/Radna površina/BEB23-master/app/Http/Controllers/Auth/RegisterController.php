<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\console;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
    
    
  
 **/
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function registerUser(Request $request){
        
        $request->validate([
            'email'=>'unique:users',
            'jmbg'=>'unique:users',
         ]);


        $user= new User();
        $user->firstname=$request->name;
        $user->lastname=$request->lastname;
        $username=str_replace(' ', '', $username=strtolower($request->name.$request->lastname.rand(1,1000)));
        $user->username=$username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->gender=$request->gender;
        $user->countryofbirth=$request->birthCountry;
        $user->placeofbirth=$request->birthPlace;
        $user->contact=$request->contact;
        if ($image = $request->file('profilePicture')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $user->image = "$profileImage";
        }
        $user->dateofbirth=$request->birthDate;
        $user->jmbg=$request->jmbg;
        $user->tip=$request->accountType;
        if($request->accountType=='student'){
            $user->info=$request->acc;
            $user->zahtev='načekanju';
        }
        elseif($request->accountType=='teacher'){
            $user->info=$request->accc;
            $user->zahtev='načekanju';
        }else{
            $user->info='admin';
            $user->zahtev='odobreno';
        }
        $res=$user->save();
        if($res==true){
           return redirect('register')->with('success','Uspešno ste se popunili zahtev za registraciju! Vaše korisničko ime je : '.$username);
        }
        else{
            return redirect('register')->with('fail','Nešto nije u redu!');
        }
    }
}
