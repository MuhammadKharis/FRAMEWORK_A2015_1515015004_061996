<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangann extends Model
{
    protected $table = 'ruangann';
    protected $fillable = ['tittle'];
    public function jadwal_matakuliah()
	{
		return $this->hasMany(jadwal_matakuliah::class);
	}
}
