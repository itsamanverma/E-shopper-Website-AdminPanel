<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
                echo "Success"; die;
            }else{
                echo "Failed"; die;
            }
        }
        return view('admin.admin_login');
    }
}
