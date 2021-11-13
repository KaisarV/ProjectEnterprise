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
                    <img class="img-circle elevation-2" src="{{ asset('../dist/img/user1-128x128.jpg') }}"
                        alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="text-center">

                        <div class=" text-center">
                            <div class="text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <form action="/p/editprofile" method="post" role="form">
                                        @csrf
                                        Address : <input type="text" class="form-control" value="{{ $profile->alamat }}"
                                            name="address">
                                        City : <input type="text" class="form-control" value="{{ $profile->kota }}"
                                            name="city">

                                        Phone: <input type="number" class="form-control" value="{{ $profile->no_hp }}"
                                            name="phone">

                                        Email: <input type="text" class="form-control" value="{{ $profile->email }}"
                                            name="email">
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
