<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
         if($request->session()->has('ADMIN_LOGIN')) {
           return redirect('admin/dashboard');
        }

        else{
            $request->session()->flash('error', 'Access Denined');
            return view('admin.login');
        }

        return view('admin.login');
    }
     public function dashboard()
    {
        //
        return view('admin.dashboard');
    }


     public function auth( Request  $req)
    {
        //

        $email= $req->post('email');
        $password= $req->post('password');
        // return view('Admin.login');
        // $result=Admin::where(['email'=>$email, 'password'=>$password])->get();

        $result=Admin::where(['email'=>$email])->first();
        
        if($result){

            if(Hash::check($req->post('password'),$result->password)) {

            $req->session()->put('ADMIN_LOGIN', true);
            
            $req->session()->put('ADMIN_ID', $result->id);
            return redirect('admin/dashboard');
            }

            else {
                 $req->session()->flash('error', 'please enter valid password');
                 return redirect('admin');
            }


           
        }

        else {
            
            $req->session()->flash('error', 'please enter valid login details');
            return redirect('admin');

        }

        // if(isset($result['0']->id)) {
        //     $req->session()->put('ADMIN_LOGIN', true);
        //     $req->session()->put('ADMIN_ID', true);
        //     return redirect('admin/dashboard');

        // }

        // else{
        //     $req->session()->flash('error', 'please enter valid login details');
        //     return redirect('admin');
        // }

       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
