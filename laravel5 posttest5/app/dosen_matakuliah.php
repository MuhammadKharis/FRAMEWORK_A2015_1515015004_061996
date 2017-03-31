<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    protected $table = 'dosen_matakuliah';
    protected $fillable = ['dossen_id','matakuliah_id'];
    public function dossen(){
    	return $this->belongsTo(dossen::class);
    }
    public function jadwal_matakuliah(){
    	return $this->hasMany(jadwal_matakuliah::class);
    }
    public function matakuliah(){
    	return $this->belongsTo(matakuliah::class);
    }
}
