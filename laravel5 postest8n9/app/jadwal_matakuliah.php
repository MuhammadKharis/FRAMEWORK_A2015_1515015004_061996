<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_matakuliah extends Model
{
    protected $table = 'jadwal_matakuliah';
    protected $fillable = ['mahasiswa_id','ruangann_id','dosen_matakuliah_id'];
    protected $guarded = ['id'];
    
     public function mahasiswa(){
     	return $this->belongsTo(mahasiswa::class,'mahasiswa_id');
     }

     public function dosen_matakuliah(){
     	return $this->belongsTo(dosen_matakuliah::class,'dosen_matakuliah_id');
     }

     public function ruangann(){
     	return $this->belongsTo(ruangann::class,'ruangann_id');
     }

     public function getNamadsnAttribute(){
         return $this->dosen_matakuliah->dossen->nama;
     }

     public function getNipdsnAttribute(){
         return $this->dosen_matakuliah->dossen->nip;
     }

     public function getMKdsnAttribute(){
         return $this->dosen_matakuliah->matakuliah->title;
     }
    
     public function getNamamhsAttribute(){
         return $this->mahasiswa->nama;
     }

     public function getNimAttribute(){
         return $this->mahasiswa->nim;
     }

     public function getTitleruanganAttribute(){
         return $this->ruangann->title;
     }
    
     public function listDosenMatakuliahDanMahasiswaDanRuangan()
     {
      $out = [];
      foreach ($this->all() as $jdwlMtk) {
          $out[$jdwlMtk->id] = "{$jdwlMtk->dosen_matakuliah->dossen->nama} {$jdwlMtk->dosen_matakuliah->dossen->nama} {$jdwlMtk->mahasiswa->nama} (ruangan {$jdwlMtk->ruangann->title})";
      }
      return $out;
     }
}
