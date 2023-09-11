@extends('products.layout')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Swart work Project</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
		</div>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Number of Bedrooms</th>
		<th>Price</th>
		<th>Property Type</th>
		<th>For Sale / For Rent</th>
		<th width="280px">Action</th>
	</tr>
	@foreach ($products as $product)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $product->County }}</td>
		<td>{{ $product->Number_of_Bedrooms }}</td>
		<td>{{ $product->Price }}</td>
		<td>{{ $product->Property_Type }}</td>
		<td>{{ $product->Sale_or_Rent }}</td>
		<td>
			<form action="{{ route('products.destroy',$product->id) }}" method="POST">
				
				<a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
				
				<a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
				
				@csrf
				@method('DELETE')
				
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>

{!! $products->links() !!}

@endsection