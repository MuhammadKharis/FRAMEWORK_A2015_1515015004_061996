<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\dosen_matakuliahRequest;
use App\dosen_matakuliah;
use App\dossen;
use App\matakuliah;
use App\jadwal_matakuliah;

class dosen_matakuliahcontroller extends Controller
{
     public function awal(){
       $semuadosenmatakuliah = dosen_matakuliah::all();
       return view('dosen_matakuliah.awal', compact('semuadosenmatakuliah'));

    //return "Hello dari dosen_matakuliahcontroller";
	}
	public function tambah()
    {      
        $dossen = new dossen;
        $matakuliah = new matakuliah;
        return view('dosen_matakuliah.tambah',compact('dossen','matakuliah'));
        return $this->simpan();
    }


	public function simpan(dosen_matakuliahRequest $input){
		$dosen_matakuliah = new dosen_matakuliah($input->only('dossen_id','matakuliah_id'));
    	if($dosen_matakuliah->save()) $this->informasi = "Matakuliah dan Dosen Mengajar berhasil disimpan";
    	return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
		//$dosen_matakuliah= new dosen_matakuliah();
		//$dosen_matakuliah->dossen_id  = '1';
		//$dosen_matakuliah->matakuliah_id  = '1';
		//$dosen_matakuliah->save();
	//return "data dengan id dosen {$dosen_matakuliah->dossen_id} yang mengajar matakuliah dengan id {$dosen_matakuliah->id} telah disimpan";
	}

	public function lihat($id){
        $dosen_matakuliah = dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat',compact('dosen_matakuliah'));
    }

    public function edit($id){
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dossen = new dossen;
        $matakuliah = new matakuliah;
        return view('dosen_matakuliah.edit',compact('dossen','matakuliah','dosen_matakuliah'));
    }

    public function update($id,dosen_matakuliahRequest $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen_matakuliah->fill($input->only('dossen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Matakuliah dan Dosen Mengajar berhasil diperbarui";
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }

    public function hapus($id,Request $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        if($dosen_matakuliah->delete()) $this->informasi = "Matakuliah dan Mahasiswa berhasil dihapus";
        return redirect('dosen_matakuliah')-> with(['informasi'=>$this->informasi]);
    }
}
