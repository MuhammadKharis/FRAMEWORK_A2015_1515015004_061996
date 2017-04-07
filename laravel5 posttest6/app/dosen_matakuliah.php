<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    protected $table = 'dosen_matakuliah';
    protected $fillable = ['dossen_id','matakuliah_id'];
    // protected $guarded = ['id'];

    public function dossen(){
    	return $this->belongsTo(dossen::class,'dossen_id');
    }
    public function jadwal_matakuliah(){
    	return $this->hasMany(jadwal_matakuliah::class,'dosen_matakuliah_id');
    }
    public function matakuliah(){
    	return $this->belongsTo(matakuliah::class,'matakuliah_id');
    }

    public function getNamadosenAttribute(){
        return $this->dossen->nama;
    }

    public function getNipdosenAttribute(){
        return $this->dossen->nip;
    }
    
    public function getTitlematakuliahAttribute(){
        return $this->matakuliah->title;
    }

    public function listDosenDanMatakuliah()
    {
        $out = [];
        foreach ($this->all() as $dsnMtk) {
            $out[$dsnMtk->id] = "{$dsnMtk->dossen->nama} (matakuliah{$dsnMtk->matakuliah->title})";
        }
        return $out;
    }
}
