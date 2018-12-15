<?php

namespace App\Http\Controllers;
use App\Dog;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

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
            return view('home')->with('dogs', $user->dogs)->with('user', $user);
        }
        else{

            return view('adminhome')->with('dogs', $dogs)->with('user', $user);
        }
    }
    public function yourPosts(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
            return view('yourPosts')->with('dogs', $user->dogs)->with('user', $user);

    }
    public function Update_avatar(Request $request){
        // Handle the upload of a image
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
           $filename = time().'.'.$avatar->getClientOriginalExtension();
            //Image::make($avatar)->save(public_path('/avatar'.$filename));
            $path = $avatar->storeAs('public/avatar', $filename);
            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();
            return view('home')->with('dogs', $user->dogs)->with('user', $user);
        }

    }

}
