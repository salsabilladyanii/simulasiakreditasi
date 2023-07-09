<?php $dataLembaga = getLembaga();?>
<!-- Brand Logo -->

<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">MENU UTAMA</li>
            <li class="nav-item">
                <a href="{{ URL::to('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            
            </li>
            @if(session('auth_user')['role'] == 'admin')
            <li class="nav-item">
                <a href="{{ URL::to('user') }}" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Data Pengguna</p>
                </a>
            </li>
            
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Indikator Penilaian
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                
                <ul class="nav nav-treeview" style="display: none;">
                    @foreach($dataLembaga as $value)
                    <li class="nav-item">
                        <a href="{{ URL::to('add-indikator-penilaian/'.$value->id) }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ $value->lembaga }}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>

            @endif
            @if(session('auth_user')['role'] == 'program studi')
            <li class="nav-item">
                <a href="{{ URL::to('penilaian') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Penilaian</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to('informasi') }}" class="nav-link">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Informasi</p>
                </a>
            </li>
            @endif
            @if(session('auth_user')['role'] == 'reviewer')
            <li class="nav-item">
                <a href="{{ URL::to('akreditasi') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Akreditasi</p>
                </a>
            </li>
            @endif
            @if(session('auth_user')['role'] == 'lp3m')
            <li class="nav-item">
                <a href="{{ URL::to('penugasan') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Penugasan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to('laporan') }}" class="nav-link">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Laporan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to('user') }}" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Data Pengguna</p>
                </a>
            </li>
            @endif
        </ul>
        {{-- 
        <li class="nav-item">
            <a href="{{ URL::to('nilai-rendah') }}" class="nav-link">
                <i class="nav-icon fa fa-chart-line"></i>
                <p>Nilai Rendah</p>
            </a>
        </li>
        --}}
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->