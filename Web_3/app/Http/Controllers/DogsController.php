<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dogs = Dog::orderBy('created_at', 'dec')->paginate(6);
        return view('pages.index')->with('dogs', $dogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
      [
        'name' => 'required',
        'bread' => 'required',
        'sex' => 'required',
        'years' => 'required',
        'months' => 'required',
        'body' => 'required',
      ]);

      //create dog
      $dog = new Dog;
      //add from form
      $dog->name = $request->input('name');
      $dog->bread = $request->input('bread');
      $dog->sex = $request->input('sex');
      $dog->years = $request->input('years');
      $dog->months = $request->input('months');
      $dog->body = $request->input('body');
      //save in db
      $dog->save();

      return redirect('/dogs')->with('success', 'Dog added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dog = Dog::find($id);
        return view('dogs.show')->with('dog', $dog);
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
