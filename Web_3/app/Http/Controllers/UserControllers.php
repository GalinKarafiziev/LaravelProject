<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserControllers extends Controller
{
    public function index()
    {
      	$users = User::all()->toArray();

      	if($users !=null)
      	{
        	return response()->json($users)->setStatusCode(202);
    	}
    	else
    	{
    		return response()->json(['error_message'=>'no users found'])->setStatusCode(404);
    	}
     }

    public function user($id)
    {
      	$user = User::find($id);
      
      	if($user !=null)
      	{
        	return response()->json($user)->setStatusCode(202);
    	}
    	else
    	{
    		return response()->json(['error_message'=>'user not found'])->setStatusCode(404);
    	}
     }

    public function delete(Request $request)
    {
		$user = User::find($request->id);

		if($user != null)
		{
        	$user->delete();
        	return response()->json(['error_message'=>'user deleted'])->setStatusCode(202);
    	}
    	else
    	{
    		return response()->json(['error_message'=>'user not found'])->setStatusCode(404);
    	}
        
     }

    public function update(Request $request)
    {
      	$user = User::find($request->id);

      	if($user != null)
		{
			$newUser = User::where("id",$user->id)->update(['name'=>$request->name]);
			$updatedUser = User::find($request->id);
			return response()->json($updatedUser)->setStatusCode(202);
    	}
    	else
    	{
    		return response()->json(['error_message'=>'user not found'])->setStatusCode(404);
    	}
     }

    public function create(Request $request)
    {
			$user = User::create($request->all());
			return response()->json($user, 202);
     }
}
