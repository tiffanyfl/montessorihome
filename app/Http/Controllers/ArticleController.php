<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function show($n)
    {
        return view('facture')->with('numero', $n);
    }
}
