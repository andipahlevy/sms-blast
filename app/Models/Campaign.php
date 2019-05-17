<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaign';
	
	protected $fillable = [
		'id_kelompok',
		'campaign_text',
	]; 
	
	public function kelompok()
	{
		return $this->belongsTo('App\Models\Kelompok', 'id_kelompok');
	}
}
