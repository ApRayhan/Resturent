<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
	public function index()
	{
		$reservations = Reservation::all();
    	return view('admin.reservation.index', compact('reservations'));
	}
	public function reserve($id)
	{
		$reservation = Reservation::find($id);
		$reservation->status = true;
		$reservation->save();
		Toastr::success('Reservation SuccessFull Added', 'success', ["positionClass" => "toast-top-right"]);
		return redirect()->back();
	}
	public function delete($id)
	{
		Reservation::find($id)->delete();
		Toastr::success('Reservation SuccessFull Delete', 'success', ["positionClass" => "toast-top-right"]);
		return redirect()->back();
	}
	
}
