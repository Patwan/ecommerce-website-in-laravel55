<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function addProduct(){
      return view('admin.addProduct');
    }

    public function editProduct($id){
      return view('admin.editProduct', [
          'data' => Product::where('id', $id)->get()
      ]);
    }

    public function changeImage(){
        return view('admin.changeImage');
    }

    public function saveProduct(Request $request){
        $pro_name = $request->pro_name;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $cat_id = $request->cat_id;

        
         //UPDATE  the products
        if(isset($request->id)){
            $id = $request->id;
            $add_product = DB::table("products")->where('id',$id)
            ->update([
                'pro_name' => $pro_name,
                'pro_code' => $pro_code,
                'pro_price' => $pro_price,
                'pro_info' => $pro_info,
                'pro_img' => "img.jpg",
                //'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
        //SAVES the products in the database
        else{
            $add_product = DB::table("products")->insert([
                'pro_name' => $pro_name,
                'pro_code' => $pro_code,
                'pro_price' => $pro_price,
                'pro_info' => $pro_info,
                'cat_id' => $cat_id,
                'pro_img' => "img.jpg",
                //Inserts the current data and time
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }

      if($add_product){
        echo "done";
      }else{
        echo "Error";
      }
    }

    public function uploadPP(Request $request){
        //Gets the image from the form through the name of input field
        $pic = $request->file('pic');
        //Gets the name of the image
        $filename = $pic->getClientOriginalName();
        //Adds the time before the file name
        $filename = time(). $filename;
        //Path to store the image after uploading
        $path = 'img/';
        //Gets the id from the form
        $id = $request->id;
        //Moves the image with the path as 1st parameter and filename as the name of the file
        $pic->move($path,$filename);

        //update command to change the file in the database
        //Use where to find if the id in the database matches with our current id of the image then use update function to update pro_img column with the new file name
        $update = Product::where('id',$id)->update(['pro_img' => $filename]);

        if($update){
        // if everything is going right rediect to edit product of this pro id
        //We also parse the data from the database field 
            return view('admin.editProduct',
                [ 'data' => Product::where('id',$id)->get()]
            );
        }else{
        //show odbc_errormsg
        echo "Error";
      }

    }

    public function saveCategory(Request $request){
        $cat_name = $request->cat_name;

        $add_cat = DB::table('cats')->insert([
            'cat_name' => $cat_name,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        if($add_cat){
            echo "done";
        }else{
            echo "error";
        }
    }

    public function banUser(Request $request){
        //return $request->all();
        $status = $request->status;
        $userId = $request->userId;

        $update_status = User::where('id', $userId)
        ->update([
            'status' => $status
        ]);

        if($update_status){
            echo "Status Updated successfully";
        }
    }
}






