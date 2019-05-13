@extends('layouts.app')

@section('theme_js')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_layouts.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('content')

<!-- Basic datatable -->
<form method="POST" action="{{ route('data.nomor.save', Request::segment(2)) }}">
	@csrf
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Form Tambah Data Kotak Pegawai</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
				</ul>
			</div>
		</div>

		<div class="panel-body">
			
			@if (\Session::has('error'))
				<div class="alert alert-warning no-border">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
					<span class="text-semibold">Terjadi kesalahan!</span> {{ \Session::get('error') }}
				</div>
			@endif
			
			<input type="hidden" name="id_kelompok" value="{{ Request::segment(2) }}"/>
			
			<div class="form-group">
				<label>Nama Pegawai:</label>
				<input type="text" name="nama_anggota" value="{{ old('nama_anggota') }}" required class="form-control" placeholder="Nama Pegawai">
			</div>
			<div class="form-group">
				<label>NIP Pegawai:</label>
				<input type="text" name="nip" value="{{ old('nip') }}" required class="form-control" placeholder="Nomor Induk Pegawai">
			</div>
			
			<div class="form-group">
				<label>Nomor HP:</label>
				<div class="input-group">
					<span class="input-group-addon">+62</span>
					<input type="number" class="form-control" required placeholder="853XXXXXXXX" name="nohp" value="{{ old('nohp') }}"/>
				</div>
			</div>
			
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
			</div>
			
		</div>

	</div>
</form>

@endsection