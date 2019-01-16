@extends('layouts.master2')

@section('title')
profil
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
        <li class="active">Profil admin</li>
      </ol>
    </section>

    <div class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="/images/avatar/{{ Auth::user()->avatar }}" alt="User profile picture">

                      <h3 class="profile-username text-center">{{ Auth::user()->nama }}</h3>


                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Email</b> <a class="pull-right">{{ Auth::user()->nama }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Username</b> <a class="pull-right">{{ Auth::user()->username }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Phone</b> <a class="pull-right">0888888888</a>
                        </li>
                      </ul>

                      <a href="{{ route('beranda') }}" class="btn btn-primary btn-block"><b>Kembali</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                  <!-- /.box -->
            </div>
        </div>
    </div>
@endsection