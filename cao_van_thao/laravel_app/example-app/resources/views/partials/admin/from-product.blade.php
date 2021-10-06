<form action="{{ $action }}" method="POST">
		@csrf

		@if ($method == 'PUT')
			@method('PUT')
		@endif

		<div class="card-body">
						<div class="form-group" data-select2-id="44">
										<label>CATEGORY</label>
										<select class="form-control" name="categories_id">
														@foreach ($categories as $id => $category)
																		<option value="{{ $id }}"
																			@if ($id == @$product->id)
																				selected
																			@endif
																		>{{ $category }}</option>
														@endforeach
											</select>
							</div>
						<div class="form-group">
														<label for="">Name</label>
														<input type="text" name="name" class="form-control" id="" placeholder="Name..." value="{{ @$product->name }}">
						</div>

						<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="description"  rows="5" placeholder="Enter Quantity...">{{ @$product->description }}</textarea>
						</div>
						<div class="form-group">
										<label for="">Price</label>
										<input type="text" name="price"  class="form-control" id="" placeholder="Price..." value="{{ @$product->price }}">
						</div>
						<div class="form-group">
							<label for="">Quantity</label>
							<input type="text" name="quantity"  class="form-control" id="" placeholder="quantity..." value="{{ @$product->quantity }}">
			</div>
						<div class="form-group">
										<label for="">Sale_off</label>
										<input type="text" name="sale_off"  class="form-control" id="" placeholder="%" value="{{ @$product->sale_off }}">
						</div>
						<div class="form-group">
								<label for="exampleInputFile">File Image</label>
								<div class="input-group" name="image" >
																<div class="custom-file">
																								<input type="file" name="image" class="custom-file-input" id="exampleInputFile"  value="{{ @$product->image }}">
																								<label class="custom-file-label" for="exampleInputFile">Image file</label>
																</div>
																<div class="input-group-append">
																								<span class="input-group-text">Upload</span>
																</div>
								</div>
						</div>
						<div class="form-check">
														<input type="checkbox" name="is_public" class="form-check-input" id="exampleCheck1" value="1"
														@if (@$product->is_public)
																checked
														@endif>
														<label class="form-check-label" for="exampleCheck1">Public</label>
						</div>
		</div>
        <!-- /.card-body -->
		<div class="card-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
		</div>
</form>