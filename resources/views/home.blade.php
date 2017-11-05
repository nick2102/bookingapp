@extends('layouts.main')

@section('content')

    <section id="heading" class="col-lg-12">
        <div class="jumbotron">
            <h3>Welcome to our booking system</h3>
            <h5>Please fill the information in the booking form below</h5>
        </div>
    </section>


@if(Session::has('flash_message'))
    <div class="col-lg-12 alert alert-success" style="margin-bottom: 20px;">
        {{ Session::get('flash_message') }}
    </div>
@endif

    {!! Form::open(['route' => 'app.submit', 'class' => 'booking-class']) !!}
        <div class="col-md-6 col-sm-12">
            <div class="inputs_bg col-lg-12">

                <div class='col-md-6 col-sm-12'>
                    <div class="form-group">
                        <label for="firstName">First name</label>
                        <div class="form-group">
                            <input required type='text' class="form-control" id='firstName' name="firstName" value="{{old('firstName')}}"/>
                            @if ($errors->has('firstName')) <p
                                    class="alert alert-danger">{{ $errors->first('firstName') }}</p> @endif
                        </div>
                    </div>
                </div>
                <div class='col-md-6 col-sm-12'>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input required type='text' class="form-control" id='lastName' name="lastName" value="{{old('lastName')}}"/>
                        @if ($errors->has('lastName')) <p
                                class="alert alert-danger">{{ $errors->first('lastName') }}</p> @endif
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <div class="form-group">
                            <input required type='email' class="form-control" id='email' name="email" value="{{old('email')}}"/>
                            @if ($errors->has('email')) <p
                                    class="alert alert-danger">{{ $errors->first('email') }}</p> @endif
                        </div>
                    </div>
                </div>

                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <div class="form-group">
                            <input required type='tel' class="form-control" id='phone' name="phone" value="{{old('phone')}}"/>
                            @if ($errors->has('phone')) <p
                                    class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif
                        </div>
                    </div>
                </div>

                <div class='col-md-12'>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <div class="form-group">
                            <input required type='text' class="form-control" id='address' name="address" value="{{old('address')}}"/>
                            @if ($errors->has('address')) <p
                                    class="alert alert-danger">{{ $errors->first('address') }}</p> @endif
                        </div>
                    </div>
                </div>

                <div class='col-md-12'>
                    <div class="form-group">
                        <span>Check-in Date </span>
                        <div class='input-group date'>
                            <input required type='text' class="form-control" id='checkInPicker' name="checkIn" value="{{old('checkIn')}}" placeholder="DD/MM/YYY"/>
                            @if ($errors->has('checkIn')) <p
                                    class="alert alert-danger">{{ $errors->first('checkIn') }}</p> @endif
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class="form-group">
                        <span>Check-out Date </span>
                        <div class='input-group date'>
                            <input required type='text' class="form-control" id='checkOutPicker' name="checkOut" value="{{old('checkOut')}}" placeholder="DD/MM/YYY"/>
                            @if ($errors->has('checkOut')) <p
                                    class="alert alert-danger">{{ $errors->first('checkOut') }}</p> @endif
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

                <div class='col-md-12'>
                    <div class="form-group">
                        <span>Room type </span>
                        <select required class="form-control" id="roomType" name="single_price">
                            <option selected disabled value="">Select Option</option>
                            <option data-room-type="Budget - 1 bed" value="50">Budget - 1 bed</option>
                            <option data-room-type="Budget - 2 beds" value="100">Budget - 2 beds</option>
                            <option data-room-type="Silver - 1 bed" value="100">Silver - 1 bed</option>
                            <option data-room-type="Silver - 2 beds" value="200">Silver - 2 beds</option>
                            <option data-room-type="Premium - 1 bed" value="250">Premium - 1 bed</option>
                            <option data-room-type="Premium - 2 beds" value="500">Premium - 2 beds</option>
                        </select>

                    </div>
                </div>

                <input type="hidden" id="numDays" name="days" value="{{old('days')}}">
                <input type="hidden" id="the_room" name="room_type" value="{{old('room_type')}}">
                <input type="hidden" id="the_price" name="the_price" value="{{old('the_price')}}">

                <div class="errors">
                    @if ($errors->has('days')) <p
                            class="alert alert-danger">{{ $errors->first('days') }}</p> @endif
                    @if ($errors->has('room_type')) <p
                                class="alert alert-danger">{{ $errors->first('room_type') }}</p> @endif
                        @if ($errors->has('the_price')) <p
                                class="alert alert-danger">{{ $errors->first('the_price') }}</p> @endif

                </div>
            </div>
        </div>
    <div class="col-md-6 col-sm-12">

        <section id="pricing_table">
            <div class="row">
                <div class="col-xs-7">
                    <span>Room Type</span>
                    <h4 id="room">Pick a room</h4>
                </div>
                <div class="col-xs-5">
                    <span>Price per night</span>
                    <h4 id="single_price">--</h4>
                </div>
            </div><!--/.row -->

            <div class="row">
                <div class="col-xs-7">
                    <h4>Number of days</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="days">
                        --
                    </h4>
                </div>
            </div><!--/.row -->

            <div class="row" id="total_row">
                <div class="col-xs-7">
                    <h4>Total</h4>
                </div>
                <div class="col-xs-5">
                    <h4 id="total">--</h4>

                </div>
            </div><!--/.row -->


            <p>To proceed with your reservation please click the checkout button</p>
            <input id="the_button" type="submit" class="btn btn-lg btn-success" value="Go to Booking and Payment">
        </section>
    </div>
    {!! Form::close() !!}


@endsection

@section('footer_code')
    <script type="text/javascript">




        //             ROOM INFO
        var room =  $('#roomType');
        $('#the_room').val(roomType);
        $('#single_price').html('--');

        room.on('change', function(){
            var roomType = $(this).children('option:selected').data('room-type');
            $('#room').html(roomType + ' Room');
            $('#the_room').val(roomType);
            $('#single_price').html('$'+ room.val());
            total();
        });

        //            Number of days Info

        function getDateDifference(){

            var fromDate = $('#checkInPicker').val(),
                toDate = $('#checkOutPicker').val(),
                from, to, duration;

            from = moment(fromDate, 'DD/MM/YYYY');
            to = moment(toDate, 'DD/MM/YYYY');

            /* using diff */
            duration = to.diff(from, 'days');

            /* show the result */

            if(fromDate <= 0 || toDate <=0 ){
                $('#days').html('<span>--</span>');
                $('#numDays').val('');
                $('#total').html('--');
                $('#the_price').val('');
            }else {
                $('#days').html('<span>'+ duration +'</span>');
                $('#numDays').val(duration);

            }




        }

        function getDateDifference2(){

            var fromDate = $('#checkInPicker').val(),
                toDate = $('#checkOutPicker').val(),
                from, to, duration;

            from = moment(fromDate, 'DD/MM/YYYY');
            to = moment(toDate, 'DD/MM/YYYY');

            /* using diff */
            duration = to.diff(from, 'days');

                return duration;
        }


        //            TOTAL PRICE

        function total(){
            var room =  $('#roomType'),
                price = $('#the_price');
            total_price= getDateDifference2() * room.val();

            if(total_price <= 0){
                $('#total').html('--');
                price.val('');
            }
            else
            {
                $('#total').html('$'+total_price);
                price.val(total_price);
            }


        }



      $(document).ready(function(){

          //            DATE TIME PICKER SETTINGS

          $(function () {

              $('#checkInPicker').datetimepicker({
                      format: 'DD/MM/YYYY',
                      minDate:  moment(new Date()),
                  }
              );
              $('#checkOutPicker').datetimepicker({
                  useCurrent: false,
                  format: 'DD/MM/YYYY',
                  minDate:  moment(new Date()).add(0,'day'),
              });
              $('#checkInPicker').on('dp.change', function (e) {
                  $('#checkOutPicker').data("DateTimePicker").minDate(e.date);
              });
              $('#checkOutPicker').on('dp.change', function (e) {
                  $('#checkInPicker').data("DateTimePicker").maxDate(e.date);
              });
          });



          //          Loads days Info on page load
          $(document).on('load', function(e){
              getDateDifference();
              total();
          });

          //            Loads days Info on date change

          $('#checkInPicker').on('dp.change', function(e) {
              getDateDifference();
              total();
          });

          $('#checkOutPicker').on('dp.change', function(e) {
              getDateDifference();
              total();
          });

      });


    </script>
@endsection