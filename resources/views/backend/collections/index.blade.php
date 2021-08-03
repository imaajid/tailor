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
                <li class="breadcrumb-item active" aria-current="page">Collections</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('collections.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Collection
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Collections</h6>
                    <p class="card-description">All the collections are listed here.</p>
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
                            @foreach($collections as $key=> $collection)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>

                                    <td>
                                        {{$collection->title}}
                                    </td>
                                    <td>
                                        {{$collection->description}}
                                    </td>

                                    <td>
                                        <img src="{{asset('images/collections/'. $collection->image)}}" alt="dress image">
                                    </td>

                                    <td>
                                        {{$collection->category->name}}
                                    </td>
                                    <td>
                                        {{$collection->productType->name}}
                                    </td>
                                    <td>
                                        {{$collection->brand->name}}
                                    </td>
                                    <td>
                                        {{isset($collection->business['user']['name'])?$collection->business['user']['name']:''}}
                                    </td>
                                    <td>
                                        {{$collection->item->name}}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($collection->created_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($collection->updated_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block"
                                              action="{{ route('collections.destroy',$collection->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('collections.edit',$collection->id) }}"
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
