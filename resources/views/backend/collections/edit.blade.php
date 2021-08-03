@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">Collections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Collection</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Collection Edit Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('collections.update', $collection->id) }}"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title"
                                   name="title" value="{{$collection->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="brand_id">Select Brand</label>
                            <select class="js-example-basic-single w-100" name="brand_id" id="brand_id">
                                @foreach($brands as $brand)
                                    <option
                                        value="{{$brand->id}}" {{$collection->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_type_id">Select Product Type</label>
                            <select class="js-example-basic-single w-100" name="product_type_id" id="product_type_id">
                                @foreach($product_types as $product_type)
                                    <option
                                        value="{{$product_type->id}}">{{$product_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="item_id">Select Item</label>
                            <select class="js-example-basic-single w-100" name="item_id" id="item_id">
                                @foreach($items as $item)
                                    <option
                                        value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select class="js-example-basic-single w-100" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{$collection->website_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image upload</label>
                            <input type="file" name="image" id="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" id="image" class="form-control file-upload-info" disabled=""
                                       placeholder="Upload Image" name="banner" value="{{$collection->image}}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('collections.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
