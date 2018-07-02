<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{
    public function proCat(Request $request){
    	$cat = $request->cat;

    	//Joins id column in cats table with cat_id column in products table where cat_name in cats table is equal to cat (this is the last part of the url the user entered in the form) then use get methd to fetch the products
    	$data = Product::join('cats', 'cats.id' , 'products.cat_id')->where('cats.cat_name', $cat)->get();

    	//Returns the data to the front part
    	return view('front.products', [
    		'data' => $data , 'catByUser' => $cat
    	]);
    }



    public function productsCat(Request $request){
        $cat_id = $request->cat_id;

        /*Removes the hyphen separating the price and makes an array eg 100 - 200 to [0 => "500" ,1 => "1000"]*/
        $price = explode("-",$request->price);

        $priceCount = count($price);

        //Returns true if category id is NOT empty and no of price is NOT empty (CHECK BUG)
        if($cat_id!="" && $priceCount >"1"){

            $start = $price[0];
            $end = $price[1];

            echo "both are selected";
            $data = Product::join('cats','cats.id','products.cat_id')
            ->where('products.cat_id',$cat_id)
            ->where('products.pro_price', ">=", $start)
            ->where('products.pro_price', "<=", $end)
            ->get();
        }

        //Returns true if category is NOT empty (CHECK BUG)
        else if($cat_id >= "1"){
            echo "cat is selected";
            $data = Product::join('cats','cats.id','products.cat_id')
            ->where('products.cat_id',$cat_id)
            ->get();
        }
        //Returns true if price is NOT empty
        else if($priceCount > "1"){
            $price = explode("-",$request->price);
            $start = $price[0];
            $end = $price[1];

            echo "price is selected";
            $data = Product::join('cats','cats.id','products.cat_id')
            ->where('products.pro_price', ">=", $start)
            ->where('products.pro_price', "<=", $end)
            ->get();
       }
        else{
            echo "nothing is slected";
            return "<h1 align='center'>Please select atleast one filter from dropdown</h1>";
        }

        if(count($data)=="0"){
           echo "<h1 align='center'> No products found under <b style='color:red;'>" . $start ."-" . $end. "</b> price range </h1>";
        }else{
            return view('front.produtsPage',[
                'data' => $data, 'catByUser' => $data[0]->cat_name
            ]);
        }
    } 

  
          


    public function search(Request $request){
    	$searchData= $request->searchData;

      	//start query for search
      	$data = Product::join('cats','cats.id','products.cat_id')
      	->where('products.pro_name', 'like', '%' . $searchData . '%')
      	->get();
      	return view('front.products',[
        	'data' => $data, 'catByUser' => $searchData
      	]);
    }
}






