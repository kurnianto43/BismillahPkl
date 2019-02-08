@extends('layouts.master2')

@section('title')
Data instansi
@endsection
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data instansi
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href=""><i class="fa fa-envelope-open"></i> instansi</a></li>
      </ol>
    </section>

    @include('layouts.partials._alert')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel data instansi</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href=""><i class="fa fa-print"></i></a>
              <a class="btn btn-primary pull-right" href="{{ route('instansi.create') }}"><i class="fa fa-plus"></i></a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Instansi</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th width="81">Aksi</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $instansis as $instansi )
                    <tr>
                      <td>{{ $instansi -> id  }}</td>
                      <td>{{ $instansi -> nama_instansi }}</td>
                      <td>{{ $instansi -> alamat }}</td>
                      <td>{{ $instansi -> no_telp }}</td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('instansi.edit', $instansi) }}"><i class="fa fa-edit"></i></a>
                        <div class="pull-right">
                          <form action="{{ route('instansi.destroy', $instansi) }}" method="POST">
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