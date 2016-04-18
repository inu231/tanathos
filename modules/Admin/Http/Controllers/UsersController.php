<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\user;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('id', '>', '0')
                    ->orderBy('id', 'asc')
                    ->take(50)
                    ->get();

        return view('Users.index', ['users' => $users]);
    }

    public function add()
    {
        return view('Users.add');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Users.edit', array('user' => $user));
    }

    public function store(Request $request)
    {
          \Session::put('teste', 'isso é um teste');
          $user = new User($request->all());
          $user->save();
          \Session::flash('flash_message','successfully saved.');
          return redirect()->action('UsersController@index')->with(array('teste' => 'Teste'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('Users.show', ['user' => $user]);
    }

    public function destroy($id)
    {

      $user = User::find($id);
      if ($user)
      {
          $user->delete();
          return redirect()->action('UsersController@index')->with('error', 'Record successfully deleted.');
      } else {
          return redirect()->action('UsersController@index')->with('error', 'Something went wrong.');
      }

    }

}
