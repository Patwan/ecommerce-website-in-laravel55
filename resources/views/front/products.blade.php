@extends('front.master')

@section('content')

@include('front.ourJs')
<div class="greyBg">
    <div class="container">
		<div class="wrapper">
			<div class="row">
				<div class="col-sm-12">
				<div class="breadcrumbs">
			        <ul>
			          <li><a href="#">Home</a></li>
			          <li><span class="dot">/</span> 
			          	<!-- If data is equal to zero display the URL-->
			          	@if(count($data) == "0")
			          		<b>{{ $catByUser}}</b>
			          	@else
			          		<a href="{{ url('products') }}/{{ $catByUser }}">{{ $catByUser }} </a> 
			          	@endif
			          </li>
			        </ul>
                </div>
                </div>
		    </div>
		     @if(count($data)!="0")
        <h1 class="text-center">{{$catByUser}} </h1>
		    <div class="row">
		    		<div class="col-xs-6 col-sm-3">

							<select id="catID">
							   <option value="">Select a Category</option>
                 @foreach(App\Cat::all() as $cList)
                 <option class="option" value="{{$cList->id}}">{{$cList->cat_name}}</option>
                 @endforeach
               </select>

				    </div>
				    <div class="col-xs-6 col-sm-3">
						<select id="priceID">
						    <option value="">Select Price Range</option>
						    <option class="option" value="0-100">0-100</option>
						    <option class="option" value="100-300">100-300</option>
						    <option class="option" value="300-500">300-500</option>
						    <option class="option" value="500-1000">500-1000</option>
						</select>
          </div>


				<div class="col-sm-6 hidden-xs">
					<div class="row">

						<div class="col-sm-4 pull-right">
							<button id="findBtn" class="btn btn-success">Find</button>
						</div>
						<div class="styleNm">16 style(s)</div>
					</div>
				</div>
        @endif
		    </div>
		    <!-- PULLS DATA DYNAMICALLY FROM THE DATABASE -->
	    	<div class="row top25">
	    		<!-- Counts data to check if it is equal to zero-->
	    		@if(count($data) == '0')
	    			<div class="col-md-12" align="center">
	    				<h1 style="margin: 20px;"> No Products found under <b style="color: red">{{ $catByUser }} </b> category</h1>
	    			</div>
	    		<!-- If data is more than zero -->
	    		@else
	    		<div id="productData">
		    		@foreach($data as $p)
		    		<div class="col-xs-6 col-sm-4">
		    			<div class="itemBox">
		    				<div class="prod"><img src="{{ asset('img/'.$p->pro_img) }}" alt="" /></div>
		    				<label>{{ $p->pro_name }}</label>
		    				<span class="hidden-xs">Code: {{ $p->pro_code }} </span> <br>
		    				<span class="hidden-xs">Info: {{ $p->pro_info }} </span>
		    				<div class="addcart">
		    					<div class="price"> Kshs. {{ $p->pro_price }}</div>
		    					<div class="cartIco hidden-xs"><a href="{{ url('/cart/add')}}/{{ $p->id}}"></a></div>
		    				</div>
		    			</div>
		    		</div>
		    		@endforeach
		    	</div>
	    		@endIf
	    	</div>
	    	<!-- END PULL DATA-->
		</div>
	</div>		
</div>
@endsection