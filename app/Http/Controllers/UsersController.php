<?php

namespace App\Http\Controllers;

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
        return 'Le nom est ' . $request->input('nom');
    }

}
