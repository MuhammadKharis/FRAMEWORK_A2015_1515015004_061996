<?php
Route::get('/login','SesiController@form');
Route::get('/login','SesiController@validasi');
Route::get('/logout','SesiController@logout');
Route::get('/','SesiController@index');

Route::get('/', function(){
	return view('master');
});
Route::group(['middleware'=>'AuthentifikasiUser'],function()
{
Route::get('pengguna','PenggunaController@awal');
Route::get('pengguna/tambah','PenggunaController@tambah');
Route::post('pengguna/simpan','PenggunaController@simpan');
Route::get('pengguna/edit/{pengguna}','PenggunaController@edit');
Route::post('pengguna/edit/{pengguna}','PenggunaController@update');
Route::get('pengguna/hapus/{pengguna}','PenggunaController@hapus');
Route::get('pengguna/lihat/{pengguna}','PenggunaController@lihat');

Route::get('dossen','dossencontroller@awal');
Route::get('dossen/tambah','dossencontroller@tambah');
Route::post('dossen/simpan','dossencontroller@simpan');
Route::get('dossen/edit/{dossen}','dossencontroller@edit');
Route::post('dossen/edit/{dossen}','dossencontroller@update');
Route::get('dossen/hapus/{dossen}','dossencontroller@hapus');
Route::get('dossen/{dossen}','dossencontroller@lihat');

Route::get('mahasiswa','mahasiswacontroller@awal');
Route::get('mahasiswa/tambah','mahasiswacontroller@tambah');
Route::post('mahasiswa/simpan','mahasiswacontroller@simpan');
Route::get('mahasiswa/edit/{mahasiswa}','mahasiswacontroller@edit');
Route::post('mahasiswa/edit/{mahasiswa}','mahasiswacontroller@update');
Route::get('mahasiswa/hapus/{mahasiswa}','mahasiswacontroller@hapus');
Route::get('mahasiswa/lihat/{mahasiswa}','mahasiswacontroller@lihat');

Route::get('matakuliah','matakuliahcontroller@awal');
Route::get('matakuliah/tambah','matakuliahcontroller@tambah');
Route::post('matakuliah/simpan','matakuliahcontroller@simpan');
Route::get('matakuliah/edit/{matakuliah}','matakuliahcontroller@edit');
Route::post('matakuliah/edit/{matakuliah}','matakuliahcontroller@update');
Route::get('matakuliah/hapus/{matakuliah}','matakuliahcontroller@hapus');
Route::get('matakuliah/lihat/{matakuliah}','matakuliahcontroller@lihat');

Route::get('ruangann','ruanganncontroller@awal');
Route::get('ruangann/tambah','ruanganncontroller@tambah');
Route::post('ruangann/simpan','ruanganncontroller@simpan');
Route::get('ruangann/edit/{ruangann}','ruanganncontroller@edit');
Route::post('ruangann/edit/{ruangann}','ruanganncontroller@update');
Route::get('ruangann/hapus/{ruangann}','ruanganncontroller@hapus');
Route::get('ruangann/lihat/{ruangann}','ruangannController@lihat');

Route::get('dosen_matakuliah','dosen_matakuliahcontroller@awal');
Route::get('dosen_matakuliah/tambah','dosen_matakuliahcontroller@tambah');
Route::post('dosen_matakuliah/simpan','dosen_matakuliahcontroller@simpan');
Route::get('dosen_matakuliah/edit/{dosen_matakuliah}','dosen_matakuliahcontroller@edit');
Route::post('dosen_matakuliah/edit/{dosen_matakuliah}','dosen_matakuliahcontroller@update');
Route::get('dosen_matakuliah/hapus/{dosen_matakuliah}','dosen_matakuliahcontroller@hapus');
Route::get('dosen_matakuliah/lihat/{dosen_matakuliah}','dosen_matakuliahcontroller@lihat');

Route::get('jadwal_matakuliah','jadwal_matakuliahcontroller@awal');
Route::get('jadwal_matakuliah/tambah','jadwal_matakuliahcontroller@tambah');
Route::get('jadwal_matakuliah/lihat/{jadwal_matakuliah}','jadwal_matakuliahcontroller@lihat');
Route::post('jadwal_matakuliah/simpan','jadwal_matakuliahcontroller@simpan');
Route::get('jadwal_matakuliah/edit/{jadwal_matakuliah}','jadwal_matakuliahcontroller@edit');
Route::post('jadwal_matakuliah/edit/{jadwal_matakuliah}','jadwal_matakuliahcontroller@update');
Route::get('jadwal_matakuliah/hapus/{jadwal_matakuliah}','jadwal_matakuliahcontroller@hapus');

Route::get('ujiHas','RelationshipRebornController@ujiHas');
Route::get('ujiDoesntHave','RelationshipRebornController@ujiDoesntHave');

});



// Route::get('/', function () {
// 	return view('welcome');
// });

// Route::get('/pengguna', function () {
// 	return view('public');
// });








// Route::get('/',function()
// {
// 	return \App\dosen_matakuliah::whereHas('dossen',function($query)
// 	{
// 		$query->where('nama','like','%s%');
// 	})
// 	->orWhereHas('matakuliah',function ($kueri)
// 	{
// 		$kueri->where('title','like','%a%');
// 	})
// 	->with('dossen','matakuliah')
// 	->groupBy('dossen_id')
// 	->get();	
// 	});


// Route::get('/',function (Illuminate\Http\Request $request)
// {
// 	echo "ini adalah request dari method get". $request->nama;
// });

// use Illuminate\Http\Request;
// Route::get('/',function()
// {
// 	echo Form::open(['url'=>'/']).
// 	Form::label('nama').
// 	Form::text('nama',null).
// 	Form::submit('kirim').
// 	Form::close();
// });
// ROute::post('/', function (Request $request)
// {
// 	echo "Hasil dari form input tadi nama : ".$request->nama;
// });

// Route::get('pengguna/{pengguna}', function ($pengguna)
// {
// 	return "Hallo World dari pengguna $pengguna";

// });