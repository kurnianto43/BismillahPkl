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
              <h3 class="box-title">Tabel data surat keluar</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratkeluar.pdf') }}"><i class="fa fa-print"></i></a>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratkeluar.day') }}"> Harian</a>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratkeluar.month') }}"> Bulanan</a>
              <div class="dropdown pull-right" style="margin-left: 5px">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pilih Laporan
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('suratkeluar.jan') }}">Januari</a></li>
                  <li><a href="{{ route('suratkeluar.feb') }}">Februari</a></li>
                  <li><a href="{{ route('suratkeluar.mar') }}">Maret</a></li>
                  <li><a href="{{ route('suratkeluar.apr') }}">April</a></li>
                  <li><a href="{{ route('suratkeluar.mei') }}">Mei</a></li>
                  <li><a href="{{ route('suratkeluar.jun') }}">Juni</a></li>
                  <li><a href="{{ route('suratkeluar.jul') }}">Juli</a></li>
                  <li><a href="{{ route('suratkeluar.ags') }}">Agustus</a></li>
                  <li><a href="{{ route('suratkeluar.sep') }}">September</a></li>
                  <li><a href="{{ route('suratkeluar.okt') }}">Oktober</a></li>
                  <li><a href="{{ route('suratkeluar.nov') }}">November</a></li>
                  <li><a href="{{ route('suratkeluar.des') }}">Desember</a></li>
                </ul>
              </div>
              <a class="btn btn-primary pull-right" href="{{ route('suratkeluar.create') }}"><i class="fa fa-plus"></i></a>
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
                  <th width="81">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php $no = 0;?>
                    @foreach($suratkeluars as $suratkeluar)
                <?php $no++ ;?>
                    <tr>
                      <td>{{ $no  }}</td>
                      <td>{{ $suratkeluar -> nomor_surat }}</td>
                      <td>{{ $suratkeluar -> instansi -> nama_instansi }}</td>
                      <td>{{ $suratkeluar -> perihal }}</td>
                      <td>{{ \Carbon\Carbon::parse($suratkeluar -> tanggal_surat)->format('d/m/Y')}}</td>
                      <td>{{ \Carbon\Carbon::parse($suratkeluar -> tanggal_kirim)->format('d/m/Y')}}</td>
      
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