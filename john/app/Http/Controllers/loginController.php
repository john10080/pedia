<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Guzzle\Http\Client;

class loginController extends Controller
{

    protected $medix;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('nocache');
        $this->medix = new \App\Medix\Client();
    }
    
    public function index()
    {
        if (\Session::has('user')) {
            return redirect('home');
        }

        return view('login');
    }



    /**
     * Login using Medix API
     *
     * 
     */
    public function medixAPI(Request $req)
    {
        $req -> all();

        $email = $req->input('email');
        $pass  = $req->input('password');

        $data = [
            'username'  => $email,
            'password'  => $pass
        ];

        $auth = $this->medix->auth($data);

        if (! $auth->access_token) {
            return view('errors.503');
        }

        // Store Token to Session
        \Session::put('token', $auth->access_token);

        // GET User Information
        $user = $this->medix->post('auth/info');
        \Session::put('user_id', $user->data->user_info->id);
        \Session::put('fname', $user->data->user_info->firstname);
        \Session::put('lname', $user->data->user_info->lastname);
        \Session::put('role', $user->data->user_info->role);
        \Session::put('prc', $user->data->role_info->prc);
        \Session::put('ptr', $user->data->role_info->ptr);
        \Session::put('license', $user->data->role_info->s2_license);
        return redirect('home');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
