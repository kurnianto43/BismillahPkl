@extends('layouts.master')

@section('content')
<div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-8 offset-2">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tambah Surat Masuk</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form action="{{ route('suratmasuk.store') }}" method="post" novalidate="novalidate">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="nomor_surat" class="control-label mb-1">Nomor Surat</label>
                                                <input id="nomor_surat" name="nomor_surat" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="tanggal_masuk" class="control-label mb-1">Tanggal Surat</label>
                                                <input id="tanggal_masuk" name="tanggal_masuk" type="date" class="form-control" data-val="true" data-val-required="Please enter the name on card" aria-required="true" aria-invalid="false">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="perihal" class="control-label mb-1">Perihal</label>
                                                <input id="perihal" name="perihal" type="tel" class="form-control" value="" data-val="true" data-val-required="">
                                                <span class="help-block" data-valmsg-for="" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tujuan" class="control-label mb-1">Tujuan</label>
                                                        <input id="tujuan" name="tujuan" type="tel" class="form-control">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

                    

            </div>


        </div><!-- .animated -->
@endsection