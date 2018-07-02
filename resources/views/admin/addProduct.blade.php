@extends('admin.master')
@section('title', 'Add Products')

@section('content')

<script>
$(document).ready(function(){

  //alert("working");
  $("#msg").hide();

  $("#btn").click(function(){

    $("#msg").show();

    //Get all inputs from the forms 
    var cat_id = $("#cat_id").val();
    var pro_name = $("#pro_name").val();
    var pro_code = $("#pro_code").val();
    var pro_price = $("#pro_price").val();
    var pro_info = $("#pro_info").val();
    var token = $("#token").val();

    //---------------Insert the data using AJAX----------------
    $.ajax({
      type: "post",
      data: "pro_name=" + pro_name +  "&pro_code=" + pro_code + "&pro_price=" + pro_price + "&pro_info=" + pro_info +  "&_token=" + token + "&cat_id=" + cat_id, 
      url: "<?php echo url('admin/saveProduct') ?>",
      success:function(data){
        $("#msg").html("Product has been successfully added");
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

    $('#cat_id').select2();

});
</script>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                         
                            <div class="content">
                                <h2> Add Product </h2>

                                    <!-- DIV will be filled dynamically by success message-->
                                    <p id="msg" class="alert alert-success"></p>

                                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                                    <label> Category </label>
                                    <select id="cat_id" class="form-control">
                                        <option> Please select a Category</option>
                                        @foreach(App\Cat::all() as $cData)
                                            <option value="{{ $cData->id}}"> {{ $cData->cat_name}} </option>
                                        @endforeach
                                    </select>
                                    <br> <br>

                                    <label> Product Name </label>
                                    <input type="text" id="pro_name" class="form-control">
                                    <br>

                                    <label> Product Code </label>
                                    <input type="text" id="pro_code" class="form-control">
                                    <br>

                                    <label> Product Price </label>
                                    <input type="text" id="pro_price" class="form-control">
                                    <br>

                                     <label>Product Info</label>
                                    <textarea id="pro_info" class="form-control"></textarea>
                                    <br>


                                    <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn">
                                
                              <div class="footer">
                                <!-- ADD ANY ADDITIONAL INFORMATION HERE-->
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5" style="height:400px; overflow-y:scroll; overflow-x:hidden">
                        <div class="card">
                            
                            <div class="content" id="products">
                           
                                <div class="footer"> </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection
