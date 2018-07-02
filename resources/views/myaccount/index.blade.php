@extends('front.master')

@section('content')

<div class="greyBg">
    <div class="container">
        <div class="wrapper">
      <div class="row">
                <div class="col-sm-12">
                 <div class="breadcrumbs">
                   <ul>
                      <li><a href="{{url('/')}}">Home </a></li>
                 <li><span class="dot">/</span>
                      <a href="{{url('/home')}}"> {{Auth::user()->name}}</a></li>
                    </ul>
            </div>
         </div>
            </div>

        <div class="row top25">
            <div class="panel itemBox">
                <div class="prod"> <h2 align="left"> My Account </h2></div>

                <div class="panel-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($link))
                        <div class="myContent">
                        <ul class="nav nav-tabs">
                            @if($link == "profile")
                                <li class="active"> <a href="#profile" data-toggle="tab"> Profile </a></li>
                                <li> <a href="#myorders" data-toggle="tab"> My Orders </a></li>
                                <li> <a href="#changepassword" data-toggle="tab"> Change Password </a></li>
                            @elseif($link == "myorders")
                                <li> <a href="#profile" data-toggle="tab"> Profile </a></li>
                                <li class="active"> <a href="#myorders" data-toggle="tab"> My Orders </a></li>
                                <li> <a href="#changepassword" data-toggle="tab"> Change Password </a></li>
                            @elseif($link == "changepassword")
                                <li> <a href="#profile" data-toggle="tab"> Profile </a></li>
                                <li> <a href="#myorders" data-toggle="tab"> My Orders </a></li>
                                <li class="active"> <a href="#changepassword" data-toggle="tab"> Change Password </a></li>
                            @else
                                something else
                            @endif
                        </ul>

                        <div class="tab-content col-md-6">
                            <div id="profile" class="tab-pane fade in active">
                                <form action="" method="post">
                                    <lable> Name </lable>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control">
                                    <br>

                                    <lable> Email </lable>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" readonly style="background-color:#efefef" class="form-control">
                                    <br>

                                    <lable> City</lable>
                                    <input type="text" name="city" value="" class="form-control">
                                    <br>

                                    <lable> Country </lable>
                                    <input type="text" name="country" value="" class="form-control">
                                    <br>

                                    <lable> Phone Number </lable>
                                    <input type="text" name="phoneNumber" value="" class="form-control">
                                    <br>

                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            </div>
                            <div id="myorders" class="tab-pane fade in"> Myorders tab</div>
                            <div id="changepassword" class="tab-pane fade in"> Change Password </div>
                        </div>
                        </div>
                    @else
                    <div class="myContent">
                         <ul class="nav nav-tabs">
                            <li class="active"> <a href="#profile" data-toggle="tab"> Profile </a></li>
                            <li> <a href="#myorders" data-toggle="tab"> My Orders </a></li>
                            <li> <a href="#changepassword" data-toggle="tab"> Change Password </a></li>
                        </ul>

                        <div class="tab-content col-md-6">
                            <div id="profile" class="tab-pane fade in active">
                                <form action="" method="post">
                                    <lable> Name </lable>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control">
                                    <br>

                                    <lable> Email </lable>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" readonly style="background-color:#efefef" class="form-control">
                                    <br>

                                    <lable> City</lable>
                                    <input type="text" name="city" value="" class="form-control">
                                    <br>

                                    <lable> Country </lable>
                                    <input type="text" name="country" value="" class="form-control">
                                    <br>

                                    <lable> Phone Number </lable>
                                    <input type="text" name="phoneNumber" value="" class="form-control">
                                    <br>

                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            </div>
                            <div id="myorders" class="tab-pane fade in"> Myorders tab</div>
                            <div id="changepassword" class="tab-pane fade in"> Change Password </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
