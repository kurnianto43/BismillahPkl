@extends('layouts.master2')

@section('title')
Data surat masuk
@endsection
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat Masuk
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ route('suratmasuk.index') }}"><i class="fa fa-envelope-open"></i> Surat Masuk</a></li>
      </ol>
    </section>

    @include('layouts.partials._alert')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel data surat masuk</h3>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratmasuk.pdf') }}"><i class="fa fa-print"></i></a>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratmasuk.day') }}">Harian</a>
              <a style="margin-left: 5px;" class="btn btn-default pull-right" href="{{ route('suratmasuk.month') }}">Bulanan</a>
              <a class="btn btn-primary pull-right" href="{{ route('suratmasuk.create') }}"><i class="fa fa-plus"></i></a>
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
                  <th>Tanggal Surat</th>
                  <th>Tanggal Diterima</th>
                  <th width="81">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php $no = 0;?>
                @foreach( $suratmasuks as $suratmasuk )
                <?php $no++ ;?>
                    <tr>
                      <td>{{ $no  }}</td>
                      <td>{{ $suratmasuk -> nomor_surat }}</td>
                      <td>{{ $suratmasuk -> instansi -> nama_instansi }}</td>
                      <td>{{ $suratmasuk -> perihal }}</td>
                      <td>{{ \Carbon\Carbon::parse($suratmasuk -> tanggal_surat)->format('d/m/Y')}}</td>
                      <td>{{ \Carbon\Carbon::parse($suratmasuk -> tanggal_diterima)->format('d/m/Y')}}</td>
      
                      <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('suratmasuk.edit', $suratmasuk) }}"><i class="fa fa-edit"></i></a>
                        <a  class="btn btn-info btn-sm" href="{{ route('suratmasuk.detail', $suratmasuk) }}"><i class="fa fa-info-circle"></i></a>
                        <div class="pull-right">
                          <form action="{{ route('suratmasuk.destroy', $suratmasuk) }}" method="POST">
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