@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->


@section('container')

    <div class="mt-5">
        <div class="content-wrapper ">
            @if (Session::has('success'))
                <?php
                echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Registered",showConfirmButton: false, timer: 1800}) });</script>';
                ?>

            @endif


            <div class="content">
                <div class="page-heading">
                    <h3>Discussion</h3>
                    <blockquote class="blockquote text-right">

                        <div class="blockquote-footer">The aim of argument, or of discussion, should not be victory, but
                            progress. <cite title="Source Title">Joseph Joubert</cite></div>
                    </blockquote>
                    <div class="ml-4">
                        @if (Auth::user()->id_jabatan == 1)
                            <a href="discussion/create" class="btn btn-primary">Create Discussion +</a>
                        @endif
                    </div>

                </div>

                <br>
                <div class="row">

                    <div class="col-12" id="accordion">
                        @foreach ($discussion as $d)
                            <div class="card card-primary card-outline text-center ml-4 mr-4">
                                <a class="d-block w-100" data-toggle="collapse" href="#">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            {{ $d->discussion_name }}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $d->description }}
                                    </div>
                                    <a href="discussion/chat/{{ $d->id }}" class="btn btn-primary">Join</a>
                                    @if (Auth::user()->id_jabatan == 1)
                                        <a href="discussion/delete/{{ $d->id }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this discussion?');">Delete</a>
                                    @endif

                                </div>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @endsection
