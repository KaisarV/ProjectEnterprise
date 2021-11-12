@extends('layouts/layout')


@section('container')
    <div class="content-wrapper">

        <section class="content ">

            <nav class="navbar navbar-light bg-light mb-3">
                <h1>Search to delete</h1>

                <form class="mx-2 my-auto d-inline w-100" action="/deleteemployee/search" method="post" role="form">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Someone" name="people">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </nav>
            <div class="row">
                @foreach ($listpeople as $l)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $l->name }}</b></h5>
                                <br><br>
                                <p class="card-text">{{ $l->jabatan }}
                                </p>
                                <a href="/deleteemployee/delete/{{ $l->id }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
    </div>

@endsection
