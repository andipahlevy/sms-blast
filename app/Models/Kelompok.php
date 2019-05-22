<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';
	
	protected $fillable = [
		'nama_kelompok',
		'deskripsi',
	]; 
	
	protected $appends = ['is_admin'];
	
	public function getCountNomorAttribute()
	{
		return $this->nomor->count();
	}
	
	public function getIsAdminAttribute()
    {
        return $this->attributes['admin'] == 'yes';
    }
	
	public function nomor()
    {
        return $this->hasMany('App\Models\Nomor', 'id_kelompok');
    }
}
