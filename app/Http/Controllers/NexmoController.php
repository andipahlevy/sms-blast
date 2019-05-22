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
		echo $nexmo->remaining_balance.'  ('.$quota.' SMS)';
	}
}
