<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nexmo;

class NexmoController extends Controller
{
    public function saldoku()
	{
		$nexmo = Nexmo::find(1);
		$last_price = ($nexmo->last_price ?? 1);
		$quota = round( $nexmo->remaining_balance/$last_price );
		// echo round($nexmo->remaining_balance,2).'  ('.$quota.' SMS)';
		echo $quota.' SMS';
	}
}
