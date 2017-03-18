<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruangann;

class ruanganncontroller extends Controller
{
     public function awal(){
 	return "hello dari ruanganncontroller";
 }
 public function tambah(){
 	return $this->simpan();
 }
 public function simpan(){
 	$ruangann = new ruangann();
    $ruangann->title  = '405';
	$ruangann->save();
	return "data ruangan dengan nama ruangan {$ruangann->title} telah disimpan";
 }
}
