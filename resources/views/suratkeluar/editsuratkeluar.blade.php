@extends('layouts.master2')

@section('title')
Ubah Data Surat Keluar
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Ubah Data Surat Keluar

      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-envelope-open"></i> Surat Keluar</a></li>
        <li class="active">Ubah Data Surat Keluar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-8 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form ubah data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('suratkeluar.update', $suratkeluar) }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $suratkeluar -> nomor_surat }}" name="nomor_surat" id="inputEmail3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Instansi</label>

                  <div class="col-sm-9">
                    <input type="text" name="instansi" class="form-control" value="{{ $suratkeluar -> instansi }}" id="inputPassword3">
                  </div>
                  </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Perihal</label>

                  <div class="col-sm-9">
                  <textarea rows="3" cols="80" name="perihal"  class="form-control"> {{ $suratkeluar -> perihal }} </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Instansi Tujuan</label>

                  <div class="col-sm-9">
                    <input type="text" name="instansi_tujuan" class="form-control" value="{{ $suratkeluar -> instansi_tujuan }}" id="inputPassword3">
                  </div>
                  </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Surat</label>

                  <div class="col-sm-9">
                    <input type="date" name="tanggal_surat" value="{{ $suratkeluar -> tanggal_surat }}" class="form-control" id="inputPassword3">
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Lampiran</label>

                  <div class="col-sm-9">
                    <input type="file" name="lampiran" value="{{ $suratkeluar -> lampiran }}" class="form-control" id="inputPassword3">
                    <p>** Ukuran maksimal 2Mb</p>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <a href="{{ route('suratkeluar.index') }}" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </section>
          </div>
@endsection