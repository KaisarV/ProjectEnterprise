@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')

    <div class="content-wrapper">
        <blockquote class="blockquote text-center">
            <p class="mb-0">If everyone is moving forward together, then success takes care of itself
            </p>
            <footer class="blockquote-footer">Henry Ford </footer>
        </blockquote>


        <section class="content mb-5">
            <div class="container-fluid">
                <h2 class="text-center display-4">Search</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="/find/search/" method="post" role="form">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Someone" name="people"
                                    placeholder="Type your keywords here">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .forhover:hover {
                background-color: #17a2b8;
                color: white;
            }

        </style>
        <div class="row">
            @foreach ($listpeople as $l)
                <div class="col-12 col-sm-6 col-md-5 d-flex align-items-stretch flex-column ml-5 mr-4">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            {{ $l->jabatan }}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead mb-3"><b>{{ $l->name }}</b></h2>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span> Address: {{ $l->alamat }},
                                            {{ $l->kota }}</li>

                                        <li class="small"><span class="fa-li "><i
                                                    class="fas fa-lg fa-phone"></i></span>
                                            <div class="mt-3"> Phone #: {{ $l->no_hp }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ asset('/profile_file/' . $l->foto) }}" alt="user-avatar"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">

                                <a href="/chat/room/{{ $l->id }}" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="profile/{{ $l->id }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                                @if (Auth::user()->id_jabatan == 1)
                                    <a href="/deleteemployee/delete/{{ $l->id }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to remove this employee?');">
                                        <i class="fas fa-minus-square"></i> Delete
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
