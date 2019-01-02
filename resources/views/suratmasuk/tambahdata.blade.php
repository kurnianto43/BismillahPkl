@extends('layouts.master2')

@section('content')
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-8 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('suratmasuk.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nomor_surat" id="inputEmail3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Unit Kerja</label>

                  <div class="col-sm-9">
                    <input type="text" name="unit_kerja" class="form-control" id="inputPassword3">
                  </div>
                  </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Perihal</label>

                  <div class="col-sm-9">
                  <textarea rows="3" cols="80" name="perihal" class="form-control"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Surat</label>

                  <div class="col-sm-9">
                    <input type="date" name="tanggal_surat" class="form-control" id="inputPassword3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Diterima</label>

                  <div class="col-sm-9">
                    <input type="date" name="tanggal_diterima" class="form-control" id="inputPassword3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Lampiran</label>

                  <div class="col-sm-9">
                    <input type="file" name="lampiran" class="form-control" id="inputPassword3">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </section>
          </div>
@endsection