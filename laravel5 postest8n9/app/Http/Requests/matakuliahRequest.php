<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class matakuliahRequest extends Request
{
    public function authorize()
    {
    	return true;
    }
    public function rules()
    {
    	$validasi= [
        'tittle'=>'required',
        'keterangan'=>'required|integer',
       
      ];
      if($this->is('matakuliah/tambah')){
        	$validasi['tittle']= 'required';
      }
      return $validasi;
    }
}
