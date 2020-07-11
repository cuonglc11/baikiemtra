<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
class UserController extends Controller
{
   public function doimk($user)
   {
       return view('doimk');
   }
   public function postdoimk($user, Request $re)
   {
      $pass = array('password'=>bcrypt($re->pass),'totle'=>2);
      $data = DB::table('users')->where('id',$user)->update($pass);
      $token  = array('token'=>bcrypt($re->pass));
      $user = DB::table('users')->where('id',$user)->get();
      $username  =  '';
      foreach ($user as $key => $value){
        $username = $value->email;
      }
      $token = DB::table('password_resets')->where('email',$username)->update($token);

      return redirect('home');
   }
   public function getEdit($id)
   {
      $data = DB::table('users')->where('id',$id)->get();
      return view('user.edit',compact('data'));
   }
   public function postEdit($id, Request $re)
   {
      if($re->pwd == ''){
         $token = array('name' => $re->name);
         $tokenInsert = DB::table('password_resets')->where('email',$re->name)->update($token);
         $data = DB::table('users')->where('id',$id)->update($token);
      }else{
         $arrayName = array('name' => $re->name ,  'password'=>bcrypt($re->pwd));
         $arrayToken = array('token'=>bcrypt($re->pwd));
         $token = DB::table('password_resets')->where('email', $re->name)->update($arrayToken);
         $data = DB::table('users')->where('id',$id)->update($arrayName);
      }
       return redirect('home');
   }
}
