<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin'=>'1'])) {
                // echo "Success"; die;
                // $request->session()->put('adminSession', $data['email']);
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            } else {
                // echo "Failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }
            
        }
        return view('admin.admin_login');
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin')->with('flash_message_success', 'Logout has Successfull');
    }

    public function dashboard()
    {
        // if (Session::has('adminSession')) {
        //     return view('admin.admin_dashboard');
        // } else {
        //     return redirect('/admin')->with('flash_message_error', 'Please Login to Access');
        // }
        return view('admin.admin_dashboard');
    }

    public function settings()
    {
        return view('admin.admin_settings');
    }

    public function chkPassword(Request $request){
        // $data = $request->all();
        // //echo "<pre>"; print_r($data); die;
        // $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count(); 
        //     if ($adminCount == 1) {
        //         //echo '{"valid":true}';die;
        //         echo "true"; die;
        //     } else {
        //         //echo '{"valid":false}';die;
        //         echo "false"; die;
        //     }
    }

    public function updatePassword(Request $request){
        // if($request->isMethod('post')){
        //     $data = $request->all();
        //     //echo "<pre>"; print_r($data); die;
        //     $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        //     if ($adminCount == 1) {
        //         // here you know data is valid
        //         $password = md5($data['new_pwd']);
        //         Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
        //         return redirect('/admin/settings')->with('flash_message_success', 'Password updated successfully.');
        //     }else{
        //         return redirect('/admin/settings')->with('flash_message_error', 'Current Password entered is incorrect.');
        //     }
        // }
    }
}
