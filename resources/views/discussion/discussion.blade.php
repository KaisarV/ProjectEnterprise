@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->


@section('container')

    <div class="mt-5">
        <div class="content-wrapper ">

            <div class="content">
                <div class="page-heading">
                    <h3>Forum Diskusi</h3>
                    <blockquote class="blockquote text-right">

                        <div class="blockquote-footer">The aim of argument, or of discussion, should not be victory, but
                            progress. <cite title="Source Title">Joseph Joubert</cite></div>
                    </blockquote>
                    <div class="input-group">
                        <!-- Memanggil ajax untuk search -->
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" onkeydown="findDiscussion(this.value)">
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

                                </div>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @endsection
