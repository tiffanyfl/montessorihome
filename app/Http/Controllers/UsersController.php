<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\ModifyProfileRequest;

class UsersController extends Controller
{
    //
    public function getInfos()
    {
      return view('profil');
    }

    public function modify(Request $request) {
      return view('modify-profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(ModifyProfileRequest $request)
    {
      $profile = User::find(auth()->user()->id);
      return User::make('users.modify')
            ->with('user_id', $profile);
    }

    protected function addToUsersTable($request, $error)
      {
          // Insert into orders table
          $user = User::make([
              'user_id' => auth()->user()->id,
              'email' => $request->email,
              'name' => $request->name,
              'address' => $request->address,
              'city' => $request->city,
              'postalcode' => $request->postalcode,
              'phone' => $request->phone,
          ]);
      }

}
