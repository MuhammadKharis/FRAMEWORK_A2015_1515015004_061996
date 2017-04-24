<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ruangannRequest extends Request
{
    public function authorize()
    {
    	return true;
    }
    public function rules()
    {
    	$validasi = [
        'tittle'=>'required',
        
      ];
      if($this->is('ruangann/tambah')){
        	$validasi['tittle']= 'required';
      }
      return $validasi;
    }
}
