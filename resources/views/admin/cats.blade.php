<table class="table table-hover table-striped">
	<tr>
	<td colspan="5" align="right"><b>Total:</b> {{App\Cat::count()}}</td>
	</tr>
	<tr>
		<th style="padding: 10px;"> Category Name</th>

		<th> Update</th>
	</tr>
	@foreach($data as $product )
	<tr>
		<td style="padding: 10px;"> {{ $product->cat_name }} </td>
		
		<td> <a href="{{ url('/admin/editProduct') }}/{{ $product->id }}" class="btn btn-sm btn-fill btn-primary"> Edit </a> </td>
	</tr>
	@endforeach
</table>