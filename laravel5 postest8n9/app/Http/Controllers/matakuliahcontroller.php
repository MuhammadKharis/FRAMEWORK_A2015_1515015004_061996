<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\matakuliahRequest;
use App\matakuliah;
use Input;
use Redirect;
use Informasi;

class matakuliahcontroller extends Controller
{
     public function awal()
     {
 	// return "hello dari matakuliahcontroller";
 	return view('matakuliah.awal', ['data'=>matakuliah::all()]);
 }
 public function tambah()
 {
 	// return $this->simpan();
 	return view('matakuliah.tambah');
 }
 public function simpan(matakuliahRequest $input)
 {
 	$matakuliah = new matakuliah();
 	$matakuliah->title  = $input->title;
 	$matakuliah->keterangan   =  $input ->keterangan;
 	$informasi = $matakuliah->save() ? 'Berhasil simpan data' : 'Gagal simpan data';
	return redirect('matakuliah')->with(['informasi'=>$informasi]);
 	// $matakuliah->save();
 	// return"data dengan nama matakuliah {$matakuliah->title} telah disimpan";
 }
 public function edit($id)
	{
		$matakuliah = matakuliah::find($id);
		return view('matakuliah.edit')->with(array('matakuliah'=>$matakuliah));
	}
 public function lihat($id)
 {
 	$matakuliah = matakuliah::find($id);
	return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
 }
 public function update($id, matakuliahRequest $input)
	{
		$matakuliah = matakuliah::find($id);
		$matakuliah->title = $input->title;
		$matakuliah->keterangan =$input->keterangan;
		$informasi = $matakuliah->save() ? 'Berhasil update data' : 'Gagal update data';
		return redirect('matakuliah')->with(['informasi'=>$informasi]);
	}
 public function hapus($id)
	{
		$matakuliah = matakuliah::find($id);
		$informasi = $matakuliah->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
		return redirect('matakuliah')->with(['informasi'=>$informasi]);
	}
}
