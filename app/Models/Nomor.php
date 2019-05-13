<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomor extends Model
{
    protected $table = 'nomor';
	
	protected $fillable = [
		'nama_anggota',
		'nip',
		'nohp',
		'id_kelompok',
	]; 
}
