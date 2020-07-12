<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserIport;
use DB;
use Mail;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $dataNew = DB::table('users')->where('id',Auth::user()->id)->where('totle',1)->count();
        $dataNews = DB::table('users')->where('id',Auth::user()->id)->get();
        $mkSet  =  '';
        foreach ($dataNews as $key => $value) {
            $mkSet  = '' . $value->id;
        }
        $admin = DB::table('users')->where('email',Auth::user()->email)->where('is_admin',1)->count();
        if($admin == 1){
            return redirect('admin');
        }
        if($dataNew == 1){
            return redirect('doimk/'.$mkSet) ;
        }else{
            $datas =  DB::table('giaodiches')->where('email',Auth::user()->email)->get();
            $coutPrice =  DB::table('giaodiches')->where('email',Auth::user()->email)->where('time_date',$dt->toDateString())->count();      
            if($coutPrice == 0){
                $priceEx = '';
                foreach ($datas as $key => $value){
                      $priceEx = '' . $value->price;
                }
                $priceIntereset  =  $priceEx * (10/100);
                $priceSum = $priceIntereset + $priceEx;
                $interest  = array('email'=>Auth::user()->email  , 'price'=>$priceSum, 'time_date'=>$dt->toDateString() , 'interest'=>$priceIntereset);
                $giaodiches = DB::table('giaodiches')->insert($interest);
            }
           return view('home' , compact('datas'));
        }
       
    }
    public  function admin()
    {
      
       return view('excle');
    }
    public function importFile()
    {
       return  view('them');     
    }
    public  function importExcel(Request $request)
    {
        $file  = $request->file('file');
        Excel::import(new UserIport , $file);
       
        return back();
    }
    public  function newAccont()
    {
        $data = DB::table('exes')->get();
        return view('accout' ,compact('data'));
    }
    public function postAccont(Request $re)
    {
        $email  = $re->accout;
        $cuong  =preg_replace('/\s+/', '', $email);
        echo $cuong;
        $err = '';
        echo '<br>';
        $data = DB::table('exes')->get();
        $mk  = bcrypt('abcd');
        $pir =  '';
        $arr = array('price'=>'ds');
        foreach ($data as $key => $value){
            $pr =''. $value->price;
            $emaiuser  = DB::table('users')->where('email',$value->email)->count();
            if($emaiuser==0){
                $arrayData = array('name' =>$value->email ,'email'=>$value->email, 'password'=>$mk, 'totle'=>1); 
                $giao  = array('email'=>$value->email  , 'price'=>$pr, 'time_date'=>date('Y-m-d'));
                $token  = array('email'=>$value->email  , 'token'=>$mk);

                $insert  = DB::table('users')->insert($arrayData);
                $giaodiches = DB::table('giaodiches')->insert($giao);
                $tokeninsert = DB::table('password_resets')->insert($token);
            }
        }
        foreach ($data as $key => $value){
            $SendEmails = $value->email;
            $user = DB::table('users')->where('email',$SendEmails)->get();
            $mk  =  '';
            foreach ($user as $key => $value) {
                 $mk  =  '' .  $mk;
             }
            $datas =  ['pass'=>'abcd','email'=>$re->email];
                 Mail::send('mailuser',$datas , function($msg) use ($datas,$SendEmails){
                    $msg->from('lucuong837@gmail.com','Lấy  Mật Khẩu');
                    $msg->to($SendEmails,'cone vỹ')->subject('Mật khẩu ');
                 });
            }
        
        return redirect('home');
    }   
}
