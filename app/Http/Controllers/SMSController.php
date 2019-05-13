<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Kelompok;

class SMSController extends Controller
{
    
	public function list()
	{
		$data = Campaign::with('kelompok')->get();
		return view('index_campaign', compact('data'));
	}
	
	public function create_campaign()
	{
		$kelompok = Kelompok::all();
		return view('form_campaign', compact('kelompok'));
	}
	
	public function send_campaign()
	{
		dd(123);
	}
	
}
