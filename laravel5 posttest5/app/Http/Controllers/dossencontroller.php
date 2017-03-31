<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dossen;
class dossencontroller extends Controller
{
    public function awal(){
 	return "hello dari dossencontroller";
 }
 public function tambah(){
 	return $this->simpan();
 }
 public function simpan(){
 	$dossen = new dossen();
 	$dossen->nip    = '1';
 	$dossen->nama   = 'Dr.Marsen';
 	$dossen->alamat = 'jakarta';
 	$dossen->pengguna_id = '1';
 	$dossen->save();
 	return"data dengan username {$dossen->nama} telah disimpan";
 }
}
