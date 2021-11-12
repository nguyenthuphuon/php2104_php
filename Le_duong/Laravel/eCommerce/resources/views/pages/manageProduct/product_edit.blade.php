@extends('layouts.board')
@section('breadcrumbs')
    <x-breadcrumbs-board/>
@endsection
@section('content')
    <h4>Edit {{$product->name}}</h4>
    <div class="row g-2">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"  value="{{$product->name}}" disabled>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control"  value="{{$product->price}}" disabled>
            </div>
            <div class="form-group">
                <label>Size</label>
                <input type="text" class="form-control"  value="{{$product->size}}" disabled>
            </div>
            <div class="form-group">
                <label>Color</label>
                <input type="text" class="form-control"  value="{{$product->color}}" disabled>
            </div>
            <div class="form-group">
                <label>Inventory</label>
                <input type="text" class="form-control"  value="{{$product->inventory}}" disabled>
            </div>
            <div class="form-group">
                <label>Description Long</label>
                <textarea rows="10" type="text" class="form-control" disabled>
                    {!! $product->description_long !!}
                </textarea>
            </div>
            <div class="form-group">
                <label>Description Short</label>
                <textarea rows="10" type="text" class="form-control" disabled>
                     {!! $product->description_short !!}
                </textarea>
            </div>
            <div class="form-group">
                <label >Category</label>
                <input type="text" class="form-control" value="{{$product->category}}" disabled>
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" value="{{$product->code}}" disabled>
            </div>
            <div class="form-group">
                <label>Photo Product</label>
                <img src="{{asset('/storage/images/products/'.$product->photos)}}" class="img-thumbnail" alt="{{$product->name}}">
            </div>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="{{route('products.update',['product' => $product])}}" enctype="multipart/form-data">
                @csrf
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="Enter price" name="price">
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input type="text" class="form-control" placeholder="Enter size" name="size">
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input type="text" class="form-control" placeholder="Enter color" name="color">
                </div>
                <div class="form-group">
                    <label>Inventory</label>
                    <input type="text" class="form-control" placeholder="Enter inventory" name="inventory">
                </div>
                <div class="form-group">
                    <label>Description Long</label>
                    <textarea rows="10" type="text" class="form-control" placeholder="Enter description long" name="description_long"></textarea>
                </div>
                <div class="form-group">
                    <label>Description 2</label>
                    <textarea rows="10" type="text" class="form-control" placeholder="Enter description short" name="description_short"></textarea>
                </div>
                <div class="col-auto mb-4">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                        <option selected>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{!!$category->name!!}">{!!$category->name!!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control" placeholder="Enter code" name="code">
                </div>
                <div class="form-group">
                    <label>Photo Product</label>
                    <input type="file" class="form-control-file" name="product">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-upload"></i>
                    Update</button>
            </form>
        </div>
    </div>
@endsection
