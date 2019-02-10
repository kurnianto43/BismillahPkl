@extends('layouts.master2')

@section('title')
Data surat keluar
@endsection
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data surat keluar
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href=""><i class="fa fa-envelope-open"></i> surat keluar</a></li>
      </ol>
    </section>

    @include('layouts.partials._alert')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Surat Keluar {{ $dt->format('l') }}</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratkeluar.index') }}">Kembali</a>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratkeluar.pdfday') }}"><i class="fa fa-print"></i></a>
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
                <?php $no = 0;?>
                    @foreach($data as $row)
                <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $row -> nomor_surat }}</td>
                      <td>{{ $row -> instansi -> nama_instansi }}</td>
                      <td>{{ $row -> perihal }}</td>
                      <td>{{ $row -> tanggal_surat }}</td>
                      <td>{{ $row -> tanggal_kirim }}</td>
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