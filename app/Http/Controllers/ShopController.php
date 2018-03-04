<?php

namespace App\Http\Controllers;

use App\Product;
use App\Group;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 3;
        $groups = Group::all();

        if(request()->group){
            //display products from group
            $products = Product::with('groups')->whereHas('groups', function($query) {
                $query->where('slug', request()->group);
            });
            // $groups = Group::all();
            //name of group
            $groupName = $groups->where('slug', request()->group)->first()->name;
        } else{
            $products = Product::where('featured', true);
            // $groups = Group::all();
            $groupName = 'Featured';
        }
        
        //By order
        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($pagination);
        }elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }else{
            $products = $products->paginate($pagination);
        }

        return view('shop', compact(['products','groups', 'groupName']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();

        return view('product', compact(['product', 'mightAlsoLike']));
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
