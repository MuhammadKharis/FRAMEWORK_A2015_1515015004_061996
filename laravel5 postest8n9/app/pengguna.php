<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Password\CanResetPassword;
USe Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class pengguna extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;
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
