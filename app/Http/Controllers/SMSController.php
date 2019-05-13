<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SMS;

class SMSController extends Controller
{
    
	public function smslist()
	{
		$data = SMS::all();
		return view('index_sms', compact('data'));
	}
	
}
