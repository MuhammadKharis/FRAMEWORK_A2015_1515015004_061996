<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
	protected $table = 'pengguna';
	protected $fillable = ['username','password'];
	public function mahasiswa()
	{
		return $this->hasOne(mahasiswa::class);
		// $mahasiswa=pengguna::find(1)->mahasiswa;
	}
	public function dossen()
	{
		return $this->hasOne(dossen::class);
	}
	// public function peran()
	// {
	// 	return $this->belongsTo(peran::class);
	// }
}
