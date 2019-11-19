<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Flat;
use App\Detail;
use App\Address;


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        $log = Auth::user()->id;
        if ($id != Auth::user()->id ) {
          return redirect("profile/$log");
        }
        $user = User::findOrFail($id);
        // $userFlat = Flat::where('user_id', Auth::user()->id)->get();

        $userFlat = Flat::where('user_id', Auth::user()->id)->paginate(4);


        // dd($arrDetail);

        return view('profile')->with('user', $user)
                              ->with('userFlat', $userFlat);

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
        $user = User::findOrFail($id);

        return view('editProfile', compact('user'));
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
        $validatedData = $request -> validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'birthday' => 'required'
        ]);
        User::whereId($id) -> update($validatedData);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id) -> delete();

        return redirect('/');
    }
}
