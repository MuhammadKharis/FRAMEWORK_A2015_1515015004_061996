<?php

namespace App\Http\Controllers;

use App\dossen;

class RelationshipRebornController extends Controller
{
    public function ujiHas()
    {
        return dossen::has('dosen_matakuliah')->get();
    }
    public function ujiDoesntHave()
    {
    	return dossen::doesntHave('dosen_matakuliah')->get();
    }
}