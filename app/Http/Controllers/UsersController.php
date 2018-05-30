<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function getInfos()
    {
      return view('profil');
    }


    public function postInfos(Request $request)
    {
        return view('modify-profile');
        try {
          $this->addToUsersTable($request, null);
        } catch (CardErrorException $e) {
           $this->addToUsersTable($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    protected function addToUsersTable($request, $error)
      {
          // Insert into orders table
          $user = Order::update([
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
