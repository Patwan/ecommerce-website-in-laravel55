<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class cartController extends Controller
{
    public function index(){
    	$cart = Cart::content();

    	return view('cart.index' , [
    			'data' => $cart
    		]);

    }

    public function addItem($id){
    	$pro = Product::find($id);
    	$cart = Cart::add(['id' => $pro->id , 'name' => $pro->pro_name, 'qty' => 1,
    		'price' => $pro->pro_price , 
    		'options' => [
				'img' => $pro->pro_img	
    		]]);

    	echo "Added to Cart successfully";
    }

    public function removeItem($id){
    	Cart::remove($id);
    	return back();
    }

    public function update(Request $request){
    	$qty = $request->newQty;

    	$rowId = $request->rowID;

    	Cart::update($rowId, $qty);
    	// return back();
    	echo "Cart updated successfully";

    }
}
