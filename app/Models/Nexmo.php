<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nexmo extends Model
{
    protected $table = 'nexmo';
	
	protected $fillable = [
		'NEXMO_API_KEY',
		'NEXMO_API_SECRET',
		'remaining_balance',
	]; 
}
