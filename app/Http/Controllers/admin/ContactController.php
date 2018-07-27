<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
    	$messages = Contact::all();
    	return view('admin.contact.index', compact('messages'));
    }
    public function show($id)
    {
    	$message = Contact::find($id);
    	return view('admin.contact.show', compact('message'));
    }
    public function delete($id)
    {
    	Contact::find($id)->delete();
    	Toastr::success('Message SuccessFully Deleted .', 'success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();

    }
}
