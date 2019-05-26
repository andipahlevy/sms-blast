<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        // return $this->attributes['is_admin'] == 'yes';
    }
	
	public function nomor()
    {
        return $this->hasMany('App\Models\Nomor', 'id_kelompok');
    }
	
	public function scopeDKelompok($query, Request $request)
	{
		$query = \DB::table('kelompok');
		$query->select(\DB::Raw(' count(distinct nama_kelompok) as jml_kantor, count( deskripsi) as jml_bagian '));
		return $query->first();

	}
}
