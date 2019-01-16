@extends('layouts.master2')

@section('title')
Data surat keluar
@endsection
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat keluar
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ route('suratkeluar.index') }}"><i class="fa fa-envelope-open"></i> Surat keluar</a></li>
      </ol>
    </section>

    @include('layouts.partials._alert')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel data surat keluar</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratkeluar.pdf') }}"><i class="fa fa-print"></i></a>
              <a class="btn btn-primary pull-right" href="{{ route('suratkeluar.create') }}"><i class="fa fa-plus"></i></a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Surat</th>
                  <th>Instansi</th>
                  <th>Perihal</th>
                  <th>Instansi Tujuan</th>
                  <th>Tanggal Surat</th>
                  <th width="81">Aksi</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $suratkeluars as $suratkeluar )
                    <tr>
                      <td>{{ $suratkeluar -> id  }}</td>
                      <td>{{ $suratkeluar -> nomor_surat }}</td>
                      <td>{{ $suratkeluar -> instansi }}</td>
                      <td>{{ $suratkeluar -> perihal }}</td>
                      <td>{{ $suratkeluar -> instansi_tujuan }}</td>
                      <td>{{ $suratkeluar -> tanggal_surat }}</td>
      
                      <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('suratkeluar.edit', $suratkeluar) }}"><i class="fa fa-edit"></i></a>
                        <a  class="btn btn-info btn-sm" href="{{ route('suratkeluar.detail', $suratkeluar) }}"><i class="fa fa-info-circle"></i></a>
                        <div class="pull-right">
                          <form action="{{ route('suratkeluar.destroy', $suratkeluar) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                        </div>
                                              
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

@section('script')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection