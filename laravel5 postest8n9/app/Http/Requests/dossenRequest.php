<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class dossenRequest extends Request
{
    public function authorize()
    {
    	return true;
    }
    public function rules()
    {
    	$validasi = [
        'nama'=>'required',
        'nip'=>'required|integer',
        'alamat'=>'required',
        'username'=>'required',
      ];
      if($this->is('dossen/tambah')){
        	$validasi['password']= 'required';
      }
      return $validasi;
    }
}
