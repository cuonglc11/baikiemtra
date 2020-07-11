<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Hash;

class QuenController extends Controller
{
    public function  getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(Request $re)
    {
        $coutDB =  DB::table('users')->where('email',$re->email)->count();
        if($coutDB == 1){
            return redirect('getRegister');
        }else{
            $arrayUser = array('name' =>$re->name , 'email'=>$re->email ,'password'=>bcrypt($re->password));
            $arraytoken = array('email'=>$re->email ,'token'=>bcrypt($re->password));
            $pr = array('email'=>$re->email, 'price'=>0 ,'time_date'=>date('Y-m-d'));
            $insert  = DB::table('users')->insert($arrayUser);
            $data  = DB::table('users')->where('email',$re->email)->get();
            $idUser = '';
            $token =    DB::table('password_resets')->insert($arraytoken);
            $giaodiches = DB::table('giaodiches')->insert($pr);
            return redirect('home'); 
        }
    }
}
