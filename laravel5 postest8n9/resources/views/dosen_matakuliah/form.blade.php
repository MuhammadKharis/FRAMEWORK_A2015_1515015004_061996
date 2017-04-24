<div class="form-group">
	<label class="col-sm-2 control-label" id="dossen_id"> Nama Dosen</label>
	<div class="col-sm-10">
		{!! Form::select('dossen_id',$dossen->listDosenDanNip(),null,['class'=>'form-control','id'=> 'dossen_id','placeholder'=>"Dosen"]) !!}		
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label"> Matakuliah</label>
	<div class="col-sm-10">
		{!! Form::select('matakuliah_id',$matakuliah->lists('title','id'),null,['class'=>'form-control','id'=>'matakuliah_id','placeholder'=>"matakuliah"]) !!}	
	</div>
</div>
