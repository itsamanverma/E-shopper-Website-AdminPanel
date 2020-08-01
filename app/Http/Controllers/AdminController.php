<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            # code...
            $data = $request->input();
            // dd($data); die;
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin'=>'1'])) {
                # code...
                // echo "Success"; die;
                // Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard');
            }else{
                // echo "Failed"; die;
                return redirect('/admin')->with('flash_message_error','invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }
 
    // 
    public function dashboard(){
        // if (Session::has('adminSession')) {
        //     # code... perform all the dashboard task
        // }else{
        //     return redirect('/admin')->with('flash_message_error','Please login to access');
        // }
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','successfully Logged out');
    }
}
