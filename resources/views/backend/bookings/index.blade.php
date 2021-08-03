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
                <li class="breadcrumb-item active" aria-current="page">Bookings</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Booking
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Bookings</h6>
                    <p class="card-description">All the bookings are listed here.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    User Name
                                </th>
                                <th>
                                    Business Name
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Number of suites for Men
                                </th>
                                <th>
                                    Number of suites for Women
                                </th>
                                <th>
                                    Booking Date
                                </th>
                                <th>
                                    Status
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
                            @foreach($bookings as $key=> $booking)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>
                                        {{$booking->user_id}}
                                    </td>
                                    <td>
                                        {{$booking->business_id}}
                                    </td>
                                    <td>
                                        {{$booking->category_id}}
                                    </td>
                                    <td>
                                        {{$booking->item_id}}
                                    </td>
                                    <td>
                                        {{$booking->nosfm}}
                                    </td>
                                    <td>
                                        {{$booking->nosfw}}
                                    </td>
                                    <td>
                                        {{$booking->booking_date}}
                                    </td>
                                    <td>
                                        {{$booking->status}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($booking->created_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($booking->updated_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block" action="{{ route('bookings.destroy',$booking->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('bookings.edit',$booking->id) }}"
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
