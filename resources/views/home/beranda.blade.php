@extends('layouts.master2')


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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Total Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-log-in"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>

              <p>Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-log-out"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Total Saya Bolos</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-walk"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>$ 65.000</h3>

              <p>Total Belanja</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
@endsection