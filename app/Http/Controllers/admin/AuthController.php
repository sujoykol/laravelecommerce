<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Validator;
use Session;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function auth_admin_login(Request $request){
		  $validator=Validator::make($request->all(),[
            "email" => "required|email",
            "password" =>"required"
        ]);

        if($validator->passes()){
            $remember = !empty($request->remember) ? true:false;
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],
            $remember)){
                $user = Auth::user();
                if($user->is_admin == 1){
                    return redirect()->route('admin.dashboard');
                }
                 else {
                     Auth::logout();
                     Session::flush();
                    return redirect()->back()->with('error', "You are not authorized to login in admin panel");
                 }
             }
            else {
                return redirect()->back()->with('error', "Email/Password is incorrect");
            }
            }else{
                return back()->withErrors($validator)->withInput($request->only('email'));
            }
    }
    public function dashborad(){
       return view('admin.dashborad');
   }
   public function changepassword() {
       return view('admin.changepassword');
   }
    public function postchangepassword(Request $request){
          $request->validate([
              "opassword"=>"required",
              "npassword"=>'required|min:4',
              'cpassword' => 'required_with:npassword|same:npassword',
          ]);
          $user = Auth::user();
          if(!Hash::check($request->opassword, $user->password)){
            return redirect()->route('admin.setting')->with('error', 'Current password is incorrect');
          }
          $user->password = Hash::make($request->npassword);
          $user->save();
          return redirect()->route('admin.setting')->with('success', 'Password updated successfully');
    }

   public  function admin_logout(){
    Auth::logout();
    Session::flush();
    return redirect()->route('admin.login')->with('success', "Logout Successfully");
   }
}
