@extends('layouts/layout')


@section('container')
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
                    <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>


                <div class="card-footer">

                    @if ($profile->id == $myId)
                        <div class="text-center mt-4 mb-4">
                            <a type="button" class="btn btn-dark" href="/profile/edit/{{ $profile->id }}">Edit
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
                    {{-- <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>

                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div> --}}
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </section>
    </div>
@endsection
