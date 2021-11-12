<x-admin-layout>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create A New Product !</h3>
    </div>
    <!-- /.card-header -->
    @include('admin.partials.admin-form-product', [
      'action' => route('admin.products.store'),
      'method' => 'POST'
    ])
    
    <!-- /.card-body -->
  </div>
</x-admin-layout>