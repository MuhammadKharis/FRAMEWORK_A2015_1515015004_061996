<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_matakuliah extends Model
{
    protected $table = 'jadwal_matakuliah';
    protected $fillable = ['mahasiswa_id','ruangann_id','dosen_matakuliah'];
     public function mahasiswa(){
     	return $this->belongsTo(mahasiswa::class);
     }
     public function dosen_matakuliah(){
     	return $this->belongsTo(dosen_matakuliah::class);
     }
     public function ruangann(){
     	return $this->belongsTo(ruangann::class);
     }
}
