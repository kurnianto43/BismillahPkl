@extends('layouts.master2')


@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratmasuk.pdf') }}"><i class="fa fa-print"></i></a>
              <a class="btn btn-primary pull-right" href="{{ route('suratmasuk.create') }}"><i class="fa fa-plus"></i></a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Surat</th>
                  <th>Unit Kerja</th>
                  <th>Perihal</th>
                  <th>Tanggal Surat</th>
                  <th>Tanggal Diterima</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $suratmasuks as $suratmasuk )
                    <tr>
                      <td>{{ $suratmasuk -> id}}</td>
                      <td>{{ $suratmasuk -> nomor_surat }}</td>
                      <td>{{ $suratmasuk -> unit_kerja }}</td>
                      <td>{{ $suratmasuk -> perihal }}</td>
                      <td>{{ $suratmasuk -> tanggal_surat }}</td>
                      <td>{{ $suratmasuk -> tanggal_diterima }}</td>
      
                      <td>
                        <form action="">
                            <a class="btn btn-warning btn-sm" href=""><i class="fa fa-edit"></i></a>
                            <a  class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a>
                            <a  class="btn btn-secondary btn-sm" href=""><i class="fa fa-info-circle"></i></a>
                        </form>                      
                      </td>
                    </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection