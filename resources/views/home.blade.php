@extends('layouts.app')

@section('content')
    <section class="content-header">
    <h1>
        Home
        <small>Version 1.0</small>
    </h1>
    </section>
    <section class="content">
        <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Artigos</span>
                                <span class="info-box-number">{{$totalPosts}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-comment"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Comentários</span>
                                <span class="info-box-number">{{$totalComments}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-folder"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Categorias</span>
                                <span class="info-box-number">{{$totalCat}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Membros</span>
                                <span class="info-box-number">{{$totalUsers}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
    </section>

@endsection
