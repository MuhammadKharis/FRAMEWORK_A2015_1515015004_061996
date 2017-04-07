<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dossen extends Model
{
    protected $table = 'dossen';
	protected $fillable =['nama','nip','alamat','pengguna_id'];

	public function pengguna(){
		return $this->belongsTo(pengguna::class);
	}

	public function dosen_matakuliah(){
		return $this->hasMany(dosen_matakuliah::class,'dossen_id');
	}

	public function getUsernameAttribute(){
		return $this->pengguna->username;
	}
	
	public function listDosenDanNip(){
        $out = [];
        foreach ($this->all() as $dsn) {
            $out[$dsn->id] = "{$dsn->nama} ({$dsn->nip})";
        }
        return $out;
    }

    public function listDosenDanMatakuliah()
    {
    	$out = [];
    	foreach ($this->all() as $dsnMtk) {
    		$out[$dsnMtk->id] = "{$dsnMtk->dossen->nama} {$dsnMtk->dossen->nip} (matakuliah {$dsnMtk->matakuliah->title})";
    	}
    	return $out;
    }
}