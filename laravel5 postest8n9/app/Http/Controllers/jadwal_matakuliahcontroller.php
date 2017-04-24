<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\jadwal_matakuliahRequest;
use App\jadwal_matakuliah;
use App\mahasiswa;
use App\dosen_matakuliah;
use App\ruangann;

class jadwal_matakuliahcontroller extends Controller
{
	protected $informasi = 'Gagal Melakukan Aksi'; 

      
    public function awal(){
        $semuaJadwalMatakuliah = jadwal_matakuliah::all();
        return view('jadwal_matakuliah.awal', compact('semuaJadwalMatakuliah'));
    // return "Hello dari jadwal_matakuliahcontroller";
	     }   
	 public function tambah(){
        $mahasiswa = new mahasiswa;
        $ruangann = new ruangann;
        $dosen_matakuliah = new dosen_matakuliah;
        return view('jadwal_matakuliah.tambah', compact('mahasiswa', 'ruangann', 'dosen_matakuliah'));
	     // return $this->simpan();
}

	public function simpan(jadwal_matakuliahRequest $input){
        $jadwal_matakuliah = new jadwal_matakuliah($input->only('ruangann_id', 'dosen_matakuliah_id', 'mahasiswa_id'));
        if ($jadwal_matakuliah->save()) $this->informasi = "Jadwal Mahasiswa Berhasil Disimpan";
        return redirect('jadwal_matakuliah')->with(['informasi' => $this->informasi]);
	//$jadwal_matakuliah->mahasiswa_id  = '1';
	//$jadwal_matakuliah->ruangann_id  = '1';
	//$jadwal_matakuliah->dosen_matakuliah_id  = '1';
	//$jadwal_matakuliah->save();
	//return "data dengan id mahasiswa {$jadwal_matakuliah->mahasiswa_id} dengan id ruangan {$jadwal_matakuliah->ruangann_id} dan dengan id dosen matakuliah {$jadwal_matakuliah->dosen_matakuliah_id} telah disimpan";
}

	public function edit ($id){
		$jadwalmatakuliah = jadwal_matakuliah::find($id);
		$mahasiswa = new mahasiswa;
		$ruangann =	new ruangann;
		$dosen_matakuliah = new dosen_matakuliah; 
		return view('jadwal_matakuliah.edit', compact('mahasiswa','ruangann','dosen_matakuliah','jadwalmatakuliah'));
}

	public function lihat($id){
		$jadwal_matakuliah = jadwal_matakuliah::find ($id); 
		return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
}

	public function update ($id, jadwal_matakuliahRequest $input){ 
		$jadwal_matakuliah = jadwal_matakuliah::find ($id);
		$jadwal_matakuliah->ruangann_id = $input->ruangann_id;
		$jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
		$jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
		$informasi = $jadwal_matakuliah->save() ? 'Berhasil Update data': 'Gagal Update Data';
		return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
}

 	public function hapus($id){
		$jadwal_matakuliah = jadwal_matakuliah::find ($id);
		$informasi = $jadwal_matakuliah->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data' ;
	 	return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
	}
}