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

    public function edit()
    {
      return view('modify-profile');
    }

    public function update(ModifyProfileRequest $request)
{

    $user = User::findOrFail(auth()->user()->id);

    $user->name = $request->get('name');

    $user->email = $request->get('email');

    $user->address = $request->get('address');

    $user->city = $request->get('city');

    $user->postalcode = $request->get('postalcode');

    $user->phone = $request->get('phone');

    $user->save();

    return \Redirect::route('users.index')->with('message', 'Votre profil a bien été modifié');

}

}
