@extends('layouts.master2')

@section('title')
Beranda
@endsection

@section('content')
	    <section class="content-header">
      <h1>
        Beranda
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Beranda</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Total Surat Masuk</p>
              <h3>{{ $suratmasukCount }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-log-in"></i>
            </div>
            <a href="{{ route('suratmasuk.index') }}" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p>Surat Keluar</p>
              <h3>{{ $suratkeluarCount }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-log-out"></i>
            </div>
            <a href="{{ route('suratkeluar.index') }}" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
      <!--./row -->
      
        <!-- ./col -->

      
        <!-- ./col -->
      </div>
        
@endsection