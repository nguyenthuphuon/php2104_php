<x-admin-layout>
	@if (session('msg'))
		<div class="alert alert-success">
			{{ session('msg') }}
		</div>
	@endif

	@if (session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif
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
					<td><img width="100px" height="100px" src="{{ showImageProduct($product->image) }}" alt="{{ $product->image }}" /></td>
					<td>{{ $product->categories_id }}</td>
					<td>
						<a href="{{ route('products.product-detail', ['id' => $product->id]) }}" target="_blank">demo</a>
					</td>
					<td>
						<div class="row">
						<div class="col-md-4">
								<a href="{{ route('adminproducts.edit', ['product' => $product->id]) }}" class="btn btn-info btn-xs">
										Edit
								</a>
						</div>
							<div class="col-md-4">
								<button type="button"
									class="btn btn-danger btn-xs confirm-delete"
									data-toggle="modal"
									data-target="#modal-delete"
									data-url="{{ route('adminproducts.destroy', ['product' => $product->id]) }}"
								>
									Delete
								</button>
							</div>
						</div>
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
	@include('partials.admin.from-delete')
</x-admin-layout>