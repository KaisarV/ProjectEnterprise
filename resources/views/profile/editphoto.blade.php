@extends('layouts/layout')


@section('container')
    @if (Session::has('success'))
        <?php
        echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Updated",showConfirmButton: false, timer: 1800}) });</script>';
        ?>

    @endif
    <div class="content-wrapper mt-3">
        <!-- /.col -->
        <section class="content ">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                    <h2>{{ $profile->name }}</h2>

                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ url('/profile_file/' . $profile->foto) }}"
                        alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <div class=" text-center">
                            <div class="text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <form action="/profile/editphoto/run" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Edit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.widget-user -->
        </section>
    </div>
@endsection
