@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Bookings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Booking</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Booking Edit Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('bookings.update', $booking->id) }}"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">User Name</label>
                            <input type="text" class="form-control" id="user_id" autocomplete="off" placeholder="User Name"
                                   name="name" value="{{$booking->user_id}}">
                        </div>
                        <div class="form-group">
                            <label for="business_id">Business Name</label>
                            <input type="text" class="form-control" id="business_id" autocomplete="off" placeholder="Business Name"
                                   name="name" value="{{$booking->business_id}}">
                        </div>
                        <div class="form-group">
                            <label for="item_id">Item</label>
                            <input type="number" class="form-control" id="item_id" autocomplete="off" placeholder="Item"
                                   name="item_id" value="{{$booking->item_id}}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <input type="number" class="form-control" id="category_id" autocomplete="off" placeholder="Category"
                                   name="category_id" value="{{$booking->category_id}}">
                        </div>
                        <div class="form-group">
                            <label for="nosfm">Number Of Suits For Men</label>
                            <input type="number" class="form-control" id="nosfm" autocomplete="off" placeholder="Number Of Suits For Men"
                                   name="nosfm" value="{{$booking->nosfm}}">
                        </div>

                        <div class="form-group">
                            <label for="nosfw">Number Of Suits For Women</label>
                            <input type="number" class="form-control" id="nosfw" autocomplete="off" placeholder="Number Of Suits For Women"
                                   name="nosfw" value="{{$booking->nosfw}}">
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Booking Date</label>
                            <div class="input-group date datepicker" id="datePickerExample">
                                <input type="text" name="booking_date" class="form-control" value="{{$booking->booking_date}}"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('bookings.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
