<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/images/avatar/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nama }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li><a href="{{ route('beranda') }}"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
        </li>
       
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope-open"></i> <span>Surat Masuk</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('suratmasuk.index') }}"><i class="fa fa-circle-o"></i> Data Surat Masuk</a></li>
            <li><a href="{{ route('suratmasuk.create') }}"><i class="fa fa-circle-o"></i> Tambah Data Surat Masuk</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Surat Keluar</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('suratkeluar.index') }}"><i class="fa fa-circle-o"></i> Data Surat Keluar</a></li>
            <li><a href="{{ route('suratkeluar.create') }}"><i class="fa fa-circle-o"></i> Tambah Data Surat Keluar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Instansi</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('instansi.index') }}"><i class="fa fa-circle-o"></i> Data Instansi</a></li>
            <li><a href="{{ route('instansi.create') }}"><i class="fa fa-circle-o"></i> Tambah Data Instansi</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="fa fa-sticky-note"></i> <span>Disposisi</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('disposisi.index') }}"><i class="fa fa-circle-o"></i> Data Disposisi</a></li>
            <li><a href="{{ route('disposisi.create') }}"><i class="fa fa-circle-o"></i> Tambah Data Disposisi</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
