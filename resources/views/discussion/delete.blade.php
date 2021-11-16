@extends('layouts/layout')

@section('container')

    <div class="content-wrapper">

        <section class="content ">

            <nav class="navbar navbar-light bg-light mb-4">
                <h1>Delete</h1>
                @if (Session::has('success'))
                    <?php
                    echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Deleted",showConfirmButton: false, timer: 1800}) });</script>';
                    ?>
                @endif

            </nav>
            <div class="row">
                @foreach ($listpeople as $l)
                    <div class="col-sm-5 ml-4 mr-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $l->name }}</b></h5>
                                <br><br>
                                </p>
                                <a href="/discussion/delete-member/{{ $id }}/{{ $l->id }}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
    </div>

@endsection
