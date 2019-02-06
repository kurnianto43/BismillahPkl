@extends('layouts.master2')

@section('title')
Tambah Data Instansi
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Tambah Data Instansi

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('suratmasuk.index') }}"><i class="fa fa-envelope-open"></i> Instansi</a></li>
        <li class="active">Tambah Data Instansi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form tambah data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('instansi.update', $instansi) }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">

                <div class="form-group {{ $errors->has('nama_instansi') ? ' has-error' : '' }}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Instansi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_instansi" value="{{ $instansi->nama_instansi }}" id="nama_instansi">

                            @if ($errors->has('nama_instansi'))      
                                    <span class="help-block">{{ $errors->first('nama_instansi') }}</span>
                            @endif

                  </div>
                </div>


                <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                    <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $instansi->alamat }}</textarea>

                            @if ($errors->has('alamat'))      
                                    <span class="help-block">{{ $errors->first('alamat') }}</span>
                            @endif

                    </div>
                </div>


                <div class="form-group {{ $errors->has('no_telp') ? ' has-error' : '' }}">
                  <label for="inputPassword3" class="col-sm-3 control-label">Nomor Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_telp" placeholder="" value="{{ $instansi->no_telp }}" class="form-control" id="inputPassword3">

                             @if ($errors->has('no_telp'))      
                                    <span class="help-block">{{ $errors->first('no_telp') }}</span>
                            @endif
                  </div>
                </div>


            </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <a href="{{ route('instansi.index') }}" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </section>
          </div>
@endsection

@section('script')
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@endsection