<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
	protected $table = 'mahasiswa';
    protected $fillable = ['nama','nim','alamat','pengguna_id'];

    public function pengguna()
	{
		return $this->belongsTo(pengguna::class);
	}
	
	 public function jadwal_matakuliah()
	{
		return $this->hasMany(jadwal_matakuliah::class,'mahasiswa_id');
	}

	 public function getusernameAttribute(){
    	return $this->pengguna->username;
    }

    public function listMahasiswaDanNim()
	{
		$out = [];
		foreach ($this->all() as $mhs) {
			$out[$mhs->id] ="{$mhs->nama} ({$mhs->nim})";
		}
		return $out;
	}
}
