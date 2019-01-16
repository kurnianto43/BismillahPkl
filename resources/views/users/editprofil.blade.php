@extends('layouts.master2')

@section('title')
Ubah profil
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Ubah Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('profil.index') }}"><i class="fa fa-user"></i> Profil</a></li>
        <li class="active">Ubah profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-8 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form ubah profil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ Auth::user()->nama }}" name="nama" id="nama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ Auth::user()->username }}" name="username" id="username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" id="email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="avatar" class="col-sm-3 control-label">Avatar</label>

                  <div class="col-sm-9">
                    <input type="file" name="avatar" class="form-control" id="avatar">
                  </div>
                  </div>

                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-default"   href="{{ route('beranda') }}">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </section>
          </div>
@endsection