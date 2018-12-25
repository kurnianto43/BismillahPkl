@extends('layouts.master')

@section('link')
	<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection

@section('content')
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Surat Keluar</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Perihal</th>
                                            <th>Tujuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>$320,800</td>
                                            <td>
                                            <a class="btn btn-info btn-sm" href=""><i class="fa fa-edit"></i></a>
                                            <a  class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a>
                                            <a  class="btn btn-secondary btn-sm" href=""><i class="fa fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>$320,800</td>
                                            <td>
                                            <a class="btn btn-info btn-sm" href=""><i class="fa fa-edit"></i></a>
                                            <a  class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a>
                                            <a  class="btn btn-secondary btn-sm" href=""><i class="fa fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>$320,800</td>
                                            <td>
                                            <a class="btn btn-info btn-sm" href=""><i class="fa fa-edit"></i></a>
                                            <a  class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a>
                                            <a  class="btn btn-secondary btn-sm" href=""><i class="fa fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>$320,800</td>
                                            <td>
                                            <a class="btn btn-info btn-sm" href=""><i class="fa fa-edit"></i></a>
                                            <a  class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a>
                                            <a  class="btn btn-secondary btn-sm" href=""><i class="fa fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->

@endsection

@section('javascript')
<script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>

@endsection