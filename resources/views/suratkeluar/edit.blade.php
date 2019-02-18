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
        <li class="active">Ubah Data Surat Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form ubah data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('suratkeluar.update', $suratkeluar) }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('PATCH')
              <div class="box-body">

                <div class="form-group {{ $errors->has('nomor_surat') ? ' has-error' : '' }}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nomor_surat" value="{{ $suratkeluar -> nomor_surat }}" id="nomor_surat">

                            @if ($errors->has('nomor_surat'))      
                                    <span class="help-block">{{ $errors->first('nomor_surat') }}</span>
                            @endif

                  </div>
                </div>


                <div class="form-group {{ $errors->has('instansi_id') ? ' has-error' : '' }}">
                    <label for="inputPassword3" class="col-sm-3 control-label">Instansi</label>
                    <div class="col-sm-9">
                        <select name="instansi_id" id="" class="form-control">
                          @foreach ($instansis as $instansi)
                            <option 
                                      value="{{ $instansi -> id }}"
                                          @if  ( $instansi->id === $suratkeluar->instansi_id )
                                              selected
                                          @endif
                                  >
                                  {{ $instansi -> nama_instansi }}
                                  </option>
                          @endforeach
                          
                        </select>

                            @if ($errors->has('instansi_id'))      
                                    <span class="help-block">{{ $errors->first('instansi_id') }}</span>
                            @endif

                    </div>
                </div>


                <div class="form-group {{ $errors->has('perihal') ? ' has-error' : '' }}">
                  <label for="inputPassword3" class="col-sm-3 control-label">Perihal</label>
                  <div class="col-sm-9">
                    <textarea rows="3" cols="80" name="perihal" class="form-control">{{ $suratkeluar -> perihal }}</textarea>

                            @if ($errors->has('perihal'))      
                                    <span class="help-block">{{ $errors->first('perihal') }}</span>
                            @endif

                  </div>
                </div>


                <div class="form-group {{ $errors->has('tanggal_surat') ? ' has-error' : '' }}">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Surat</label>
                  <div class="col-sm-9">
                    <input type="date" name="tanggal_surat" value="{{ $suratkeluar -> tanggal_surat }}" class="form-control" id="inputPassword3">

                            @if ($errors->has('tanggal_surat'))      
                                    <span class="help-block">{{ $errors->first('tanggal_surat') }}</span>
                            @endif

                  </div>
                </div>


                <div class="form-group {{ $errors->has('tanggal_kirim') ? ' has-error' : '' }}">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Dikirim</label>
                  <div class="col-sm-9">
                    <input type="date" name="tanggal_kirim" value="{{ $suratkeluar -> tanggal_kirim }}" class="form-control" id="inputPassword3">

                            @if ($errors->has('tanggal_kirim'))      
                                    <span class="help-block">{{ $errors->first('tanggal_kirim') }}</span>
                            @endif
                  </div>
                </div>


                <div class="form-group {{ $errors->has('lampiran') ? ' has-error' : '' }}">
                  <label for="inputPassword3" class="col-sm-3 control-label">Lampiran</label>
                  <div class="col-sm-9">
                    <input type="file" name="lampiran" placeholder="" value="{{ old('lampiran') }}" class="form-control" id="inputPassword3">

                             @if ($errors->has('lampiran'))      
                                    <span class="help-block">{{ $errors->first('lampiran') }}</span>
                            @endif

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

@section('script')
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@endsection