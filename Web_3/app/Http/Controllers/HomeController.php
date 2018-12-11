<?php

namespace App\Http\Controllers;
use App\Dog;

use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $dogs = Dog::all();
        if($user->admin == 0) {
            return view('home')->with('dogs', $user->dogs);
        }
        else{

            return view('adminhome')->with('dogs', $dogs);
        }
    }
    public function yourPosts(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
            return view('yourPosts')->with('dogs', $user->dogs);

    }

}
