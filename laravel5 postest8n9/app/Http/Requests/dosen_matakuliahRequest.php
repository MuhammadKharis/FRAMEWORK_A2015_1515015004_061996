<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;


class dosen_matakuliahRequest extends Request
{
    //
    public function authorize()
    {
    	return true;
    }
public function rules()
{
	$validasi = [
		'dossen_id'=>'required',
		'matakuliah_id'=>'required'
		
	];

	if ($this->is('dosen_matakuliah/tambah')){
		$validasi['password'] = 'required';
	}
	return $validasi;
	}
}