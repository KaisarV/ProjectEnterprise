@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if (Session::has('success'))
            <?php
            echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Send Feedback",showConfirmButton: false, timer: 1800}) });</script>';
            ?>

        @endif

        <div class="ml-4 mr-4">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr>


                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <section class="section shadow">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Send your feedback !</h4>
                            </div>
                            <div class="card-body">
                                <!-- Form untuk posting -->
                                <form method="post" enctype="multipart/form-data" action="/feedback/send">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="custom-file">
                                                <p>Select image to upload : </p>

                                                <input type="file" id="validatedCustomFile" name="file">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose
                                                    file...</label>
                                            </div>
                                            <br>
                                            <br>
                                            <textarea class="form-control" name="keterangan" placeholder="Type something"
                                                required></textarea>

                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="radio" name="type" id="type1"
                                                    value="Bug">
                                                <label class="form-check-label" for="type1">
                                                    Bug
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" id="type2"
                                                    value="Other" checked>
                                                <label class="form-check-label" for="type2">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" name="upload" type="submit">Send</button>
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
