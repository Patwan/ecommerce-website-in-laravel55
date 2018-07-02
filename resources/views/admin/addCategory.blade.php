@extends('admin.master')
@section('title', 'Add Category')

@section('content')

<script>
$(document).ready(function(){

  //alert("working");
  $("#msg").hide();

  $("#btn").click(function(){

    $("#msg").show();

    //Get all inputs from the forms 
    var cat_name = $("#cat_name").val();
    
    var token = $("#token").val();

    //---------------Insert the data using AJAX----------------
    $.ajax({
      type: "post",
      data: "cat_name=" + cat_name + "&_token=" + token, 
      url: "<?php echo url('admin/saveCategory') ?>",
      success:function(data){
        $("#msg").html("Category has been successfully created");
        $("#msg").fadeOut(6000);
      }
    });
    //--------------END INSERT PRODUCT-------------
  });

    /*Refrehes the DOM and shows a new category instantly after it is created*/
    var auto_refresh = setInterval(
        function(){
            $('#category').load('<?php echo url('admin/cats');?>').fadeIn("slow");
        },100
    );

});
</script>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                         
                            <div class="content">
                                <h2> Add Category </h2>

                                    <!-- DIV will be filled dynamically by success message-->
                                    <p id="msg" class="alert alert-success"></p>

                                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                                    <label> Category Name </label>
                                    <input type="text" id="cat_name" class="form-control">
                                    <br>

                                    <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn">
                                
                              <div class="footer">
                                <!-- ADD ANY ADDITIONAL INFORMATION HERE-->
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            
                            <div class="content" id="category">
                           
                                <div class="footer"> </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection
