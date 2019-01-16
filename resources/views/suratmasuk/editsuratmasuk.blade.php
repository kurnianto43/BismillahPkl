@extends('layouts.master2')

@section('title')
Ubah Data Surat Masuk
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Ubah Data Surat Masuk

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('suratmasuk.index') }}"><i class="fa fa-envelope-open"></i> Surat Masuk</a></li>
        <li class="active">Ubah Data Surat Masuk</li>
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
            <form class="form-horizontal" action="{{ route('suratmasuk.update', $suratmasuk) }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('nomor_surat') ? ' has-error' : '' }}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $suratmasuk -> nomor_surat }}" name="nomor_surat" id="inputEmail3">
                    @if ($errors->has('nomor_surat'))      
                                    <span class="help-block">{{ $errors->first('nomor_surat') }}</span>
                            @endif
                  </div>
                </div>

                <div class="form-group {{ $errors->has('unit_kerja') ? ' has-error' : '' }}">
                  <label for="inputPassword3" class="col-sm-3 control-label">Unit Kerja</label>

                  <div class="col-sm-9">
                    <input type="text" name="unit_kerja" class="form-control" value="{{ $suratmasuk -> unit_kerja }}" id="inputPassword3">
                    @if ($errors->has('unit_kerja'))      
                                    <span class="help-block">{{ $errors->first('unit_kerja') }}</span>
                            @endif
                  </div>
                  </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Perihal</label>

                  <div class="col-sm-9">
                  <textarea rows="3" cols="80" name="perihal"  class="form-control"> {{ $suratmasuk -> perihal }} </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Surat</label>

                  <div class="col-sm-9">
                    <input type="date" name="tanggal_surat" value="{{ $suratmasuk -> tanggal_surat }}" class="form-control" id="inputPassword3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Diterima</label>

                  <div class="col-sm-9">
                    <input type="date" name="tanggal_diterima" value="{{ $suratmasuk -> tanggal_diterima }}" class="form-control" id="inputPassword3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Lampiran</label>

                  <div class="col-sm-9">
                    <input type="file" name="lampiran" value="{{ $suratmasuk -> lampiran }}" class="form-control" id="inputPassword3">
                    <p>** Ukuran maksimal 2Mb</p>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <a href="{{ route('suratmasuk.index') }}" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </section>
          </div>
@endsection