<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Coupon;

class CouponsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $coupon = Coupon::where('code', $request->coupon_code)->first();
     if (!$coupon) {
         return back()->withErrors('Code invalide. Veuillez réessayer.');
     }
     dispatch_now(new UpdateCoupon($coupon));
     return back()->with('success_message', 'Le code a été appliqué !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
      session()->forget('coupon');
      return back()->with('success_message', 'Le code a été supprimé.');
    }
}
