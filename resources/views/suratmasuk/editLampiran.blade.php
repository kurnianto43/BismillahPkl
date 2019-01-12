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
        <li class="active">Edit Lampiran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-8 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form tambah data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Lampiran</label>

                  <div class="col-sm-9">
                    <input type="file" name="lampiran" class="form-control">
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