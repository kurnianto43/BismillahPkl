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
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">
                
                  <div class="form-group {{ $errors->has('surat_masuk_id') ? ' has-error' : '' }}">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>
                    <div class="col-sm-9">
                      <select name="surat_masuk_id" class="form-control">
                        @foreach($suratmasuks as $suratmasuk)
                        <option></option>
                        <option 
                          value="{{$suratmasuk->id}}"
                            @if ($suratmasuk->id === $disposisi->surat_masuk_id)
                              selected
                            @endif
                          >{{$suratmasuk->nomor_surat}}</option>
                        @endforeach
                      </select>

                              @if ($errors->has('surat_masuk_id'))      
                                      <span class="help-block">{{ $errors->first('surat_masuk_id') }}</span>
                              @endif

                    </div>
                  </div>


                  <div class="form-group {{ $errors->has('isi_disposisi') ? ' has-error' : '' }}">
                      <label for="inputPassword3" class="col-sm-3 control-label">Unit Kerja</label>
                      <div class="col-sm-9">
                          <textarea name="isi_disposisi" class="form-control" id="" cols="30" rows="10">{{ $disposisi->isi_disposisi }}</textarea>

                              @if ($errors->has('isi_disposisi'))      
                                      <span class="help-block">{{ $errors->first('isi_disposisi') }}</span>
                              @endif

                      </div>
                  </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <a href="{{ route('disposisi.index') }}" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </section>
          </div>
@endsection