@extends('layouts.backend')
@section('styles')
    <style>
        .table td img {
            width: 75px;
            height: 75px;
            border-radius: 0%;
        }
    </style>
@endsection
@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Product
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Products</h6>
                    <p class="card-description">All the products are listed here.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Discount
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Product Type
                                </th>
                                <th>
                                    Brand
                                </th>
                                <th>
                                    Business
                                </th>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Updated At
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=> $product)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>

                                    <td>
                                        {{$product->title}}
                                    </td>
                                    <td>
                                        {{$product->description}}
                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                    <td>
                                        {{$product->discount}}
                                    </td>
                                    <td>
                                        <img src="{{asset('images/products/'. $product->image)}}" alt="dress image">
                                    </td>
                                    <td>
                                        {{$product->category->name}}
                                    </td>
                                    <td>
                                        {{$product->productType->name}}
                                    </td>
                                    <td>
                                        {{$product->brand->name}}
                                    </td>
                                    <td>
                                        {{isset($product->business['user']['name'])?$product->business['user']['name']:''}}
                                    </td>
                                    <td>
                                        {{$product->item->name}}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($product->created_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($product->updated_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block"
                                              action="{{ route('products.destroy',$product->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('products.edit',$product->id) }}"
                                           class="btn btn-warning btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
