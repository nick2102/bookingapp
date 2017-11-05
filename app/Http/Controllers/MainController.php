<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;


class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function submit(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'checkIn' => 'required',
            'checkOut' => 'required',
            'single_price' => 'required',
            'days' => 'required',
            'room_type' => 'required',
            'the_price' => 'required',

        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        \Stripe\Stripe::setApiKey("YOUR API KEY HERE");

        // Store all input
        $inputs = $request->all();
        $formSession= array();

        foreach ($inputs as $key => $value) {
            $formSession[$key]=$value;
        }


//        dd($request);
        $request->session()->put('datesForm', $formSession);

        $response = \Stripe\Source::create(array(
            "type" => "sofort",
            "amount" => $inputs['the_price']*100,
            "currency" => "eur",
            "redirect" => array(
                "return_url" =>route('app.checkout'),
            ),
            "owner" => array(
                "email" => $inputs['email']
            ),
            "sofort" => array(
                "country" => "DE"
            )
        ));


        return redirect($response->redirect['url']);

//        return redirect()->route('app.checkout');
    }


    public function checkout(Request $request)
    {
        $getReq = $request->all();
        $session= Session::get('datesForm');
        $data = ['session' => $session, 'getReq' => $getReq];

        return view('checkout')->with($data);
    }



    public function checkoutAction(Request $request)
    {

        \Stripe\Stripe::setApiKey("YOUR API KEY HERE");


        $errors = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'days' => 'required',
            'room_type' => 'required',
            'the_price' => 'required',
            'checkIn' => 'required',
            'checkOut' => 'required',

        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }


// Get the payment token ID submitted by the form:
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $room_type = $request->room_type;
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;
        $days = $request->days;
        $amount = $request->the_price*100;
        $source = $request->source;

        \Stripe\Stripe::setApiKey("YOUR API KEY HERE");
        $charge = \Stripe\Charge::create(array(
            "amount" => $amount,
            "currency" => "eur",
            "source" => $source,
            "description" => 'Reservation for '.$room_type,
            "metadata" =>array(
                "Name" => $firstName.' '.$lastName,
                "Address" => $address,
                "Phone" => $phone,
                "Mail" => $email,
                "Room_type" => $room_type,
                "Check_in" => $checkIn,
                "Check_out" => $checkOut,
                "Days" => $days
            ),
        ));

        $input = $request->all();

        Reservation::create($input);



        Session::flash('flash_message', 'Reservation made successfully!');
        $request->session()->forget('datesForm');

        return redirect()->route('app.reservations');



    }

    public function reservations()
    {
        $reservation = Reservation::orderBy('created_at', 'desc')->get();
        $data = ['reservation' => $reservation];
        
        return view('reservations')->with($data);
    }

}


