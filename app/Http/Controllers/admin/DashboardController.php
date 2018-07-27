<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Item;
use App\Reservation;
use App\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	$sliderCount = Slider::count();
    	$categoryCount = Category::count();
    	$itemCount = Item::count();
    	$reservations = Reservation::where('status', false)->get();
    	$messageCount = Contact::count();
    	return view('admin.dashboard', compact('sliderCount', 'categoryCount', 'itemCount', 'reservations', 'messageCount'));
    }
}
