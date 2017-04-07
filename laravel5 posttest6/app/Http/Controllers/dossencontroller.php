<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\dossen;
use App\pengguna;

class dossencontroller extends Controller
{
    public function awal(){
    	$semuadosen = dossen::all();
        return view('dossen.awal',compact('semuadosen'));
 	//return "hello dari dossencontroller";
 }

 public function tambah(){
 	  	return view('dossen.tambah');
 	//return $this->simpan();
 }

 public function simpan(Request $input){
 	$pengguna = new pengguna($input->only('username','password'));
    if($pengguna->save()){
        $dossen = new dossen;
        $dossen->nama = $input->nama;
        $dossen->nip = $input->nip;
        $dossen->alamat = $input->alamat;
    //$dossen->pengguna_id = $input->pengguna_id;
    if($pengguna->dossen()->save($dossen)) 
        $this->informasi = 'Berhasil simpan data';
    }
    return redirect('dossen')->with(['informasi'=>$this->informasi]);
 	/*$dossen = new dossen();
 	$dossen->nip    = '1';
 	$dossen->nama   = 'Dr.Marsen';
 	$dossen->alamat = 'jakarta';
 	$dossen->pengguna_id = '1';
 	$dossen->save();
 	return"data dengan username {$dossen->nama} telah disimpan";*/
 }

 public function edit($id)
    {
        $dossen = dossen::find($id);
        return view('dossen.edit')->with(array('dossen'=>$dossen));
    }

public function lihat($id)
    {
        $dossen = dossen::find($id);
        return view('dossen.lihat')->with(array('dossen'=>$dossen));
    }

public function update($id, Request $input)
    {
        $dossen = dossen::find($id);
        $pengguna = $dossen->pengguna;
        $dossen->nama = $input->nama;
        $dossen->nip = $input->nip;
        $dossen->alamat = $input->alamat;
        $dossen->save();
            $pengguna->fill($input->only('username'));
            if (!empty($input->password)){
                $pengguna->password = $input->password;
            }
            if ($pengguna->save()){
                $this->informasi = 'Berhasil simpan data';
            }
            else{
                $this->informasi = 'Gagal Simpan Data';
            }
        return redirect('dossen')->with(['informasi' => $this-> informasi]);
    }

    public function hapus($id)
    {
        $dossen = dossen::find($id);
        if($dossen->pengguna()->delete()){
            if($dossen->delete()) 
                $this->informasi = 'Berhasil hapus data';
            return redirect('dossen')-> with(['informasi'=>$this->informasi]);
        }
    }
}