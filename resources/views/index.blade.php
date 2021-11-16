@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')
    @if (Session::has('success'))
        <?php
        echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Registered",showConfirmButton: false, timer: 1800}) });</script>';
        ?>

    @endif

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="ml-4 mr-4">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr>

                    <h1>{!! $greeting !!}</h1>
                    <p><i>{{ $quote }}</i></p>
                </div>
                <!-- /.container-fluid -->
            </div>
            <hr>

            <section class="content">
                <div class="container-fluid">
                    @if (Auth::user()->id_jabatan == 1)
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $jumlahGrup }}</h3>
                                        <p>Discussions Created</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <a href="/discussion" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $jumlahUser }}</h3>

                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="/find" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <h3>Report/Feedback From User</h3>
                        <br>
                        <div class="card-columns">

                            @foreach ($feedback as $f)

                                @if ($f->photo != null)

                                    <div class="card {{ $f->tipe === 'Bug' ? 'bg-warning' : 'bg-success' }} ">
                                        <img class="card-img-top" src="{{ asset('/chat_file/' . $f->photo) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">{{ $f->text }}</p>
                                            <p class="card-text"><small
                                                    class="text-dark">{{ $f->date }}</small></p>
                                        </div>
                                    </div>

                                @else
                                    <div class="card">
                                        <div class="card-body {{ $f->tipe === 'Bug' ? 'bg-warning' : 'bg-success' }}">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">{{ $f->text }}</p>
                                            <p class="card-text"><small
                                                    class="text-dark ">{{ $f->date }}</small></p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    @endif
                </div>
            </section>
        </div>

    </div>

@endsection
