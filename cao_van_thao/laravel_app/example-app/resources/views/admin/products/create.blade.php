<x-admin-layout>
	<div class="card card-warning">
		<div class="card-header">
			<h3 class="card-title">Create Products</h3>
		</div>
		@include('partials.admin.from-product', [
			'action' => route('adminproducts.store'),
			'method' => 'POST',
		])
	</div>
</x-admin-layout>
