@extends('layouts.master2')

@section('title')
Rincian Surat {{ $suratkeluar->nomor_surat }}
@endsection

@section('content')
<section class="content-header">
      <h1>
        Rincian Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-envelope-open"></i> Surat Keluar</a></li>
        <li><a href="#">Data surat keluar</a></li>
        <li class="active">Rincian</li>
      </ol>
    </section>

<section class="content">
<div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rincian Surat : {{ $suratkeluar->nomor_surat }}</h3>
            </div>
                          <ul style="margin-right: 15px; margin-left: 15px;" class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nomor Surat</b> <a class="pull-right">{{ $suratkeluar->nomor_surat }}</a>
                </li>
                <li class="list-group-item">
                  <b>Unit Kerja</b> <a class="pull-right">{{ $suratkeluar->instansi->nama_instansi }}</a>
                </li>
                <li class="list-group-item">
                  <b>Perihal</b> <a class="pull-right">{{ $suratkeluar->perihal}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Surat</b> <a class="pull-right">{{ $suratkeluar->tanggal_surat }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Diterima</b> <a class="pull-right">{{ $suratkeluar->tanggal_kirim }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Lampiran</b> <a href="{{ route('suratkeluar.response', $suratkeluar) }}" target="_blank" class="pull-right">Lihat/download file</a>
                </li>
              </ul>

              <a href="{{ route('suratkeluar.index') }}" class="btn btn-default btn-block"><b>Kembali</b></a>
          </div>
      </div>
</div>
</section>

@endsection