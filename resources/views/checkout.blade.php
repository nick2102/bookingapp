@extends('layouts.main')

@section('content')

    @if($session)

    <div class="col-md-12 col-sm-12">

        <section id="pricing_table">

            <div class="row">
                <div class="col-xs-12">
                    <h3 class="approved" id="room">Your transaction has been approved! Please confirm your reservation</h3>
                </div>

            </div><!--/.row -->

            <div class="row">
                <div class="col-xs-7">
                    <h4 id="room">Room:</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="single_price"> {{ $session['room_type'] }}</h4>
                </div>
            </div><!--/.row -->

            <div class="row">
                <div class="col-xs-7">
                    <h4>From / To</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="days">
                        From: {{ $session['checkIn'] }} <br><br> to: {{ $session['checkOut'] }}
                    </h4>
                </div>
            </div><!--/.row -->

            <div class="row">
                <div class="col-xs-7">
                    <h4>Number of days</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="days">
                        {{ $session['days'] }}
                    </h4>
                </div>
            </div><!--/.row -->

            <div class="row">
                <div class="col-xs-7">
                    <h4>Cost per day</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="days">
                        {{ $session['single_price'] }}
                    </h4>
                </div>
            </div><!--/.row -->

            <div class="row" id="total_row">
                <div class="col-xs-7">
                    <h4>Total</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="total">${{ $session['the_price'] }}</h4>

                </div>
            </div><!--/.row -->

            <form action="{{route('app.checkout.action')}}" method="post" id="payment-form">
                {!! csrf_field() !!}


                <input id="the_button" type="submit" class="btn btn-lg btn-success" value="Confirm Reservation">

                @foreach($session as $key => $value)
                    <input type="hidden" value="{{$value}}" name="{{$key}}">
                @endforeach
                <input type="hidden" value="{{$getReq['source']}}" name="source">
            </form>

        </section>
    </div>
    @else

    <div class="inputs_bg col-md-12"><p>You haven't selected check in and check out date. <a href="{{route('app.home')}}"> Select dates</a></p></div>

@endif


@endsection