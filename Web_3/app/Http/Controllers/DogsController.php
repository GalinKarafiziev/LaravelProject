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
        'some_image' => 'image|nullable|max:1999'
      ]);

      //handling the file upload
      if($request->hasFile('some_image')){
        //filename with extension
        $filenameWithE = $request->file('some_image')->getClientOriginalName();
        //filename
        $filename = pathinfo($filenameWithE, PATHINFO_FILENAME);
        //extension
        $extension = $request->file('some_image')->getClientOriginalExtension();
        //actual store
        $fileNameToStore = $filename.'__'.time().'.'.$extension; //with timestamp makes it unique
        //uploading
        $path = $request->file('some_image')->storeAs('public/images', $fileNameToStore);
      }
      else{
          $fileNameToStore = 'noimage.jpg';
      }

      //create dog
      $dog = new Dog;
      //add from form
      $dog->name = $request->input('name');
      $dog->bread = $request->input('bread');
      $dog->sex = $request->input('sex');
      $dog->years = $request->input('years');
      $dog->months = $request->input('months');
      $dog->body = $request->input('body');
      $dog->some_image = $fileNameToStore;
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
        $dog = Dog::find($id);
        return view ('dogs.edit')->with('dog', $dog);
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
        $this->validate($request,
        [

          'years' => 'required',
          'months' => 'required',
          'body' => 'required',
        ]);

        //get dog
        $dog = Dog::Find($id);
        //edit from form
        $dog->years = $request->input('years');
        $dog->months = $request->input('months');
        $dog->body = $request->input('body');
        //save in db
        $dog->save();

        return redirect('/dogs')->with('success', 'Dog edited');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dog = Dog::find($id);
        $dog->delete();
        return redirect('/dogs')->with('success', 'Dog removed');
    }
}
