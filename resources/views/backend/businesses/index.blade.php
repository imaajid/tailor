@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Businesses</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('businesses.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Business
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Businesses</h6>
                    <p class="card-description">All the businesses are listed here.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                          <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Profile
                                </th>
                                <th>
                                    Shop
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Phone No
                                </th>
                                <th>
                                    Gender
                                </th>
                                <th>
                                    Business Email
                                </th>
                                <th>
                                    Opening Time
                                </th>
                                <th>
                                    Closing Time
                                </th>
{{--                                <th>--}}
{{--                                    Role--}}
{{--                                </th>--}}
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
                            @foreach ($businesses as $key => $business)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $business->user->name }}</td>
                                <td>
                                    <img src="{{asset('images/profiles/'. $business->image)}}" alt="profile image">
                                </td>
                                <td>
                                    <img src="{{asset('images/shops/'. $business->image)}}" alt="shop image">
                                </td>
                                <td>{{ $business->user->email }}</td>
                                <td>{{ $business->user->address }}</td>
                                <td>{{ $business->user->phone_no }}</td>
                                <td>{{ $business->user->gender }}</td>
                                <td>{{ $business->business_email }}</td>
                                <td>{{ $business->opening_time }}</td>
                                <td>{{ $business->closing_time }}</td>
{{--                                <td>--}}
{{--                                    @if(!empty($business->getRoleNames()))--}}
{{--                                        @foreach($business->getRoleNames() as $v)--}}
{{--                                            <label class="badge badge-success">{{ $v }}</label>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td>
                                    {{ \Carbon\Carbon::parse($business->created_at)->diffForhumans() }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($business->updated_at)->diffForhumans() }}
                                </td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('businesses.destroy',$business->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('businesses.edit',$business->id) }}" class="btn btn-warning btn-icon-text">
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
