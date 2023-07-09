@extends('layouts.default')
@section('title', __( 'Home' ))
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid" style="text-align: -webkit-center;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <h5>Lembaga BAN PT</h5>
                        <a href="{{ asset('assets/file/Kertas Kerja Lembaga BAN-PT.xlsx') }}" style="color:black;" target="_blank"><h2><i class="fa fa-download" aria-hidden="true"></i></h2></a>
                        
                    </div>
                    <a href="{{ asset('assets/file/Kertas Kerja Lembaga BAN-PT.xlsx') }}" class="small-box-footer" style="background:#c0a143;" target="_blank">Unduh Dokumen </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <h5>Lembaga LAMTEKNIK</h5>
                        <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMTEKNIK.xlsx') }}" style="color:black;" target="_blank"><h2><i class="fa fa-download" aria-hidden="true"></i></h2></a>
                    </div>
                    <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMTEKNIK.xlsx') }}" class="small-box-footer" style="background:#c0a143;" target="_blank">Unduh Dokumen </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <h5>Lembaga LAMINFOKOM</h5>
                        <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMINFOKOM.pdf') }}" style="color:black;" target="_blank"><h2><i class="fa fa-download" aria-hidden="true"></i></h2></a>
                    </div>
                    <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMINFOKOM.pdf') }}" class="small-box-footer" style="background:#c0a143;" target="_blank">Unduh Dokumen </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <h5>Lembaga LAMSAMA</h5>
                        <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMSAMA.xlsx') }}" style="color:black;" target="_blank"><h2><i class="fa fa-download" aria-hidden="true"></i></h2></a>
                    </div>
                    <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMSAMA.xlsx') }}" class="small-box-footer" style="background:#c0a143;" target="_blank">Unduh Dokumen </a>
                </div>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <h5>Lembaga LAMPTKES</h5>
                        <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMPTKES.pdf') }}" style="color:black;" target="_blank"><h2><i class="fa fa-download" aria-hidden="true"></i></h2></a>
                    </div>
                    <a href="{{ asset('assets/file/Kertas Kerja Lembaga LAMPTKES.pdf') }}" class="small-box-footer" style="background:#c0a143;" target="_blank">Unduh Dokumen </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3"></div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
    
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection