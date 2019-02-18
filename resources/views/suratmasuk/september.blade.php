@extends('layouts.master2')

@section('title')
Data surat masuk september
@endsection
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data surat masuk september
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href=""><i class="fa fa-envelope-open"></i> surat masuk</a></li>
      </ol>
    </section>

    @include('layouts.partials._alert')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Surat Masuk September</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratmasuk.pdfsep') }}"><i class="fa fa-print"></i></a>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratmasuk.index') }}">Kembali</a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Surat</th>
                  <th>Unit Kerja</th>
                  <th>Perihal</th>
                  <th>Tanggal Surat</th>
                  <th>Tanggal Dikirim</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $data as $row )
                    <tr>
                      <td>{{ $row -> id  }}</td>
                      <td>{{ $row -> nomor_surat }}</td>
                      <td>{{ $row -> instansi -> nama_instansi }}</td>
                      <td>{{ $row -> perihal }}</td>
                      <td>{{ $row -> tanggal_surat }}</td>
                      <td>{{ $row -> tanggal_diterima }}</td>
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