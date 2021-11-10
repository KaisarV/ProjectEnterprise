@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')

    <div class="content-wrapper">
        <blockquote class="blockquote text-center">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
            </p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
        </blockquote>
        <!-- Content Header (Page header) -->
        <!-- SidebarSearch Form -->
        <nav class="navbar navbar-light bg-light mb-3">
            <form class="mx-2 my-auto d-inline w-100" action="/find/search/" method="post" role="form">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Someone" name="people">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </span>
                </div>
            </form>
        </nav>
        <style>
            .forhover:hover {
                background-color: #17a2b8;
                color: white
            }

        </style>
        @foreach ($listpeople as $l)

            <section class="content text-center">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12 ">
                            <!-- Default box -->
                            <div class="card  forhover">
                                <div class="card-body">
                                    <h5><a href="profile/{{ $l->id }}">{{ $l->name }}</a></h5>
                                    <a type="submit" class="btn btn-primary mt-4"
                                        href="/chat/room/{{ $l->id }}">Chat</a>
                                </div>

                            </div>

                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        @endforeach




    </div>

@endsection
