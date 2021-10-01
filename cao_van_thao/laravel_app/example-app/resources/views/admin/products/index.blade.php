<x-admin-layout>
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th style="width: 10px">Id</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Description</th>
					<th style="width: 10px">Price</th>
					<th>Image</th>
					<th>Categories_id</th>
					<th></th>
					<th>Setting</th>
				</tr>
				</thead>
				<tbody>
				@php
					$index = (( $products->currentPage() - 1) * $products->perPage()) + 1;
				@endphp
				@foreach ($products as $product)
				<tr>
					<td>{{ $index }}.</td>
					<td>
						@php
							$index++;
						@endphp
						<a href="{{ route('adminproducts.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
					</td>
					<td>{{ $product->quantity }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->price }}.000</td>
					<td><img width="100px" height="100px" src="{{ $product->image }}" alt="" /></td>
					<td>{{ $product->categories_id }}</td>
					<td>
						<a href="{{ route('products.product-detail', ['id' => $product->id]) }}" target="_blank">demo</a>
					</td>
					<td>
						<button type="button" class="btn btn-block btn-primary btn-sm">Edit</button>
						<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="card-footer clearfix">
			{{ $products->links('partials.my-pagination') }}
		</div>
	</div>
</x-admin-layout>