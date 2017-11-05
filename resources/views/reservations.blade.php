@extends('layouts.main')

@section('content')
    <div class="inputs_bg col-lg-12">
        @if(Session::has('flash_message'))
            <div class="col-lg-12 alert alert-success" style="margin-bottom: 20px;">
                {{ Session::get('flash_message') }}
            </div>
        @endif


        <h2>List of reservations</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Room</th>
                <th>Days</th>
                <th>Check In/Out</th>
                <th>Price per night</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>

            @foreach($reservation as $r)
            <tr>
                <td>{{$r->firstName}}</td>
                <td>{{$r->lastName}}</td>
                <td>{{$r->address}}</td>
                <td>{{$r->email}}</td>
                <td>{{$r->phone}}</td>
                <td>{{$r->room_type}}</td>
                <td>{{$r->days}}</td>
                <td>{{$r->checkIn}} to {{$r->checkOut}}</td>
                <td>{{$r->single_price}}</td>
                <td>{{$r->the_price}}</td>

            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection