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
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <section class="section shadow">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Let's post something about our job !</h4>
                            </div>
                            <div class="card-body">
                                <!-- Form untuk posting -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="custom-file">
                                                <p>Select image to upload : </p>

                                                <input type="file" id="validatedCustomFile" required name="myfile">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose
                                                    file...</label>
                                            </div>
                                            <br>
                                            <br>
                                            <textarea class="form-control" name="keterangan" placeholder="Type something"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" name="upload">Post</button>
                                </form>
                                <!-- End Form  -->
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            </section>
        </div>

    </div>

@endsection
