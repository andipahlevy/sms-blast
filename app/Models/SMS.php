<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $table = 'sms';
	
	protected $fillable = [
		'id_campaign',
		'body',
		'to',
		'message_id',
		'message_price',
		'status',
		'desc',
	]; 
}
