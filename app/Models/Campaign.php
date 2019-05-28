<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaign';
	
	protected $fillable = [
		'id_kelompok',
		'campaign_text',
		'perihal',
	]; 
	protected $hidden = [
		'sms',
	]; 
	
	protected $appends = ['jumlah_sms'];
	
	public function getJumlahSmsAttribute()
	{
		return $this->sms->count();
	}
	
	public function kelompok()
	{
		return $this->belongsTo('App\Models\Kelompok', 'id_kelompok');
	}
	
	public function sms()
	{
		return $this->hasMany('App\Models\SMS', 'id_campaign');
	}
}
