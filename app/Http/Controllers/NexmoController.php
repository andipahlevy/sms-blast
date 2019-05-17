<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nexmo;

class NexmoController extends Controller
{
    public function saldoku()
	{
		$nexmo = Nexmo::find(1);
		echo $nexmo->remaining_balance;
	}
}
