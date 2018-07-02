@extends('admin.master')
@section('title', 'Edit')

@section('content')


<script>
$(document).ready(function(){

  //alert("working");
  $("#msg").hide();

  $("#btn").click(function(){

    $("#msg").show();

    //Get all inputs from the forms 
    var pro_name = $("#pro_name").val();
    var pro_code = $("#pro_code").val();
    var pro_price = $("#pro_price").val();
    var pro_info = $("#pro_info").val();
    var token = $("#token").val();
    var id = $("#id").val();

    /*If there is error in parsing data you can debug using:

    var data = "id=" + id + "&pro_name=" + pro_name + "&pro_info=" + pro_info + "&pro_code=" +  pro_code + "&pro_price=" + pro_price + "&_token=" + token;

    console.log(data);
    */

    //---------------Insert the data using AJAX----------------
    $.ajax({
      type: "post",
      data: "id=" + id + "&pro_name=" + pro_name + "&pro_info=" + pro_info + "&pro_code=" +  pro_code + "&pro_price=" + pro_price + "&_token=" + token, 
      url: "<?php echo url('admin/saveProduct') ?>",
      success:function(data){
        $("#msg").html("Product has been successfully updated");
        $("#msg").fadeOut(6000);
      }
    });
    //--------------END INSERT PRODUCT-------------
  });

    var auto_refresh = setInterval(
        function(){
            $('#products').load('<?php echo url('admin/products');?>').fadeIn("slow");
        },100
    );

});
</script>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="content">
                                <h2>Product Image</h2>
                                <img src="{{url('/img')}}/{{$data[0]->pro_img}}"
                                width="100%"/> 
                                <div class="footer" style="text-align:center">
                                    <!-- Parse the image we are changing together with its id-->
                                    <a href="{{url('admin/changeImage')}}/{{$data[0]->id}}" class="btn btn-fill btn-sm btn-primary">change product image</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            
                            <div class="content">
                                <!-- DIV will be filled dynamically by success message-->
                                <p id="msg" class="alert alert-success"></p>
                                 <input type="hidden" value="{{$data[0]->id}}" id="id"/> <br>
                                <input type="hidden" value="{{ csrf_token() }}" id="token">
                                <label> Product Name </label>
                                <input type="text" id="pro_name" value="{{ $data[0]->pro_name }}" class="form-control">
                                <br>

                                <label> Product Code </label>
                                <input type="text" id="pro_code" value="{{ $data[0]->pro_code }}" class="form-control">
                                <br>

                                <label> Product Price </label>
                                <input type="text" id="pro_price" value="{{ $data[0]->pro_price }}" class="form-control">
                                <br>

                                <label> Product Description </label>
                                <textarea type="text" id="pro_info" class="form-control"> {{ $data[0]->pro_info }} </textarea>
                                <br>

                                <input type="submit" class="btn btn-success" value="Submit" id="btn">

                                <div class="footer">
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection




