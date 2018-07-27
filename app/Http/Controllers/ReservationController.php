<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    		'message' => 'required',
    		'datepicker' => 'required'

    	]);
    	$reservation = new Reservation();
    	$reservation->name = $request->name;
    	$reservation->email = $request->email;
    	$reservation->phone = $request->phone;
    	$reservation->message = $request->message;
    	$reservation->date_and_time = $request->datepicker;
    	$reservation->status = false;
    	$reservation->save();
        Toastr::success('Reservation SuccessFull Added', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    	
    }
}
