@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Dosen</strong>
		<a href="{{ url('dossen/tambah') }}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i> Dosen</a>
		<div class="clearfix"></div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>NIP</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $x=1; ?>
			@foreach($semuadosen as $dossen)
				<tr>
					<td>{{ $x++ }}</td>
					<td>{{ $dossen->nama or 'nama kosong' }}</td>
					<td>{{ $dossen->nip or 'nip kosong' }}</td>
					<td>{{ $dossen->alamat or 'alamat kosong' }}</td>
					<td>
						<div class="btn-group" role="group">
							<a href="{{ url('dossen/edit/'.$dossen->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="ubah"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('dossen/'.$dossen->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-eye"></i></a>
							<a href="{{ url('dossen/hapus/'.$dossen->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-remove"></i></a>
						</div>
					</td>
				</tr>
				@endforeach
		</tbody>
	</table>
</div>
@stop