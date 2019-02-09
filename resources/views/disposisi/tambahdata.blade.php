@extends('layouts.master2')

@section('title')
Tambah Data Surat Masuk
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Tambah Data Surat Masuk

      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-envelope-open"></i> Surat Masuk</a></li>
        <li class="active">Tambah Data Surat Masuk</li>
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
            <form class="form-horizontal" action="{{route('disposisi.store')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">

                <div class="form-group {{ $errors->has('surat_masuk_id') ? ' has-error' : '' }}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat Masuk</label>
                  <div class="col-sm-9">
                    <select name="surat_masuk_id" class="form-control">
                      @foreach($suratmasuks as $suratmasuk)
                      <option></option>
                      <option value="{{$suratmasuk->id}}">{{$suratmasuk->nomor_surat}}</option>
                      @endforeach
                    </select>

                            @if ($errors->has('surat_masuk_id'))      
                                    <span class="help-block">{{ $errors->first('surat_masuk_id') }}</span>
                            @endif

                  </div>
                </div>


                <div class="form-group {{ $errors->has('surat_masuk_id') ? ' has-error' : '' }}">
                    <label for="inputPassword3" class="col-sm-3 control-label">Isi Disposisi</label>
                    <div class="col-sm-9">
                        <textarea name="isi_disposisi" class="form-control" id="" cols="30" rows="4"></textarea>

                            @if ($errors->has('surat_masuk_id'))      
                                    <span class="help-block">{{ $errors->first('surat_masuk_id') }}</span>
                            @endif

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

@section('script')
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@endsection