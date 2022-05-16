<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use Cart;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart as CartCart;

class CartController extends Controller
{
    public function index(){
        $cate=category::getData();
        Cart::getcontent();
        return view('frontend.cart',['cate'=>$cate]);
    }
    public function addcart(Request $re){
        $pro = book::find($re->idbook);
        $row = ['id'=>$re->idbook,'name'=>$pro->namebook,
                'price'=>$pro->price,'quantity'=>$re->quantity,
                'attributes'=>['image'=>$pro->image]];
        Cart::add($row);
        return redirect()->route('user.showcart');
    }
    public function updatecart(Request $re){
        Cart::update($re->id,['quantity'=>$re->quantity]);
        return redirect()->route('user.showcart');
    }
    public function deletecart(Request $re){
        Cart::remove($re->id);
        return redirect()->route('user.showcart');
    }
}
