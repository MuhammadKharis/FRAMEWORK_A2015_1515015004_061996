<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dossen extends Model
{
   protected $table = 'dossen';
    protected $fillable = ['nama','nip','alamat','pengguna_id'];

    public function pengguna()
	{
		return $this->belongsTo(pengguna::class);
	}
	public function dosen_matakuliah()
	{
		return $this->hasMany(dosen_matakuliah::class);
		
		$dosen_mengajar = App\dossen::find(1)->dosen_matakuliah;
		foreach ($dosen_mengajar as $mengajar) {
			# code...
		}
	}
}
