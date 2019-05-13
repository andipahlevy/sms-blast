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
	
	public function nomor()
    {
        return $this->hasMany('App\Models\Nomor', 'id_kelompok');
    }
}
