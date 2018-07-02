<table class="table table-hover table-striped">
	<tr>
	<!-- Counts the number of products in the database table-->
	<td colspan="5" align="right"><b>Total:</b> {{App\Product::count()}}</td>
	</tr>
	<tr>
		<th style="padding: 10px;"> Product Name</th>
		<th style="padding: 10px;"> Product Code</th>
		<th style="padding: 10px;"> Category </th>
		<th style="padding: 10px;"> Price </th>
		<th> Update</th>
	</tr>
	@foreach($data as $product )
	<tr>
		<td style="padding: 10px;"> {{ $product->pro_name }} </td>
		<td style="padding: 10px;"> {{ $product->pro_code }} </td>
		<td style="padding: 10px;"> {{ $product->cats->cat_name }} </td>
		<td style="padding: 10px;"> {{ $product->pro_price }} </td>
		<td> <a href="{{ url('/admin/editProduct') }}/{{ $product->id }}" class="btn btn-sm btn-fill btn-primary"> Edit </a> </td>
	</tr>
	@endforeach
</table>