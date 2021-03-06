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
                <div class="widget-user-header bg-info"
                    style="background-image: url({{ asset('dist/img/city.jpg') }});background-size: cover"
                    class="jumbotron" id="landing-wrapper">
                    <h2 class="text-dark">{{ $profile->name }}</h2>

                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ url('/profile_file/' . $profile->foto) }}"
                        alt="User Avatar">
                </div>


                <div class="card-footer text-light" style="background-color: black">

                    @if ($profile->id == $myId)
                        <div class="text-center mt-1 mb-4">
                            <a href="/profile/editphoto/{{ $profile->id }}">Edit Photo</a><br>
                            <a type="button" class="btn btn-dark mt-4" href="/profile/edit/{{ $profile->id }}">Edit
                                Profile</a>
                        </div>
                    @endif
                    <div class="text-center">
                        <div class=" text-center">
                            <div class="text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <h5 class="widget-user-desc">{{ $profile->jabatan }}</h5>
                                    <p class="lead mb-5"> {{ $profile->alamat }}
                                        , {{ $profile->kota }}<br>
                                        Phone: {{ $profile->no_hp }} <br>
                                        Email: {{ $profile->email }}
                                    </p>
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
