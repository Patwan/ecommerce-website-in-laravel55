		@foreach($data as $p)
				<div class="col-xs-6 col-sm-4">
					<div class="itemBox">
						<div class="prod"><img src="{{ asset('img/'.$p->pro_img) }}" alt="" /></div>
						<label>{{ $p->pro_name }}</label>
						<span class="hidden-xs">Code: {{ $p->pro_code }} </span> <br>
						<span class="hidden-xs">Info: {{ $p->pro_info }} </span>
						<div class="addcart">
							<div class="price"> Kshs. {{ $p->pro_price }}</div>
							<div class="cartIco hidden-xs"><a href="{{ asset('front_theme/img/cart.png') }}"></a></div>
						</div>
					</div>
				</div>
				@endforeach