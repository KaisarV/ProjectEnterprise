@extends('layouts/layout')

@section('container')

    <div class="content-wrapper">

        <section class="content ">

            <nav class="navbar navbar-light bg-light mb-4">
                @if ($operation == 'delete')
                    <h1>Delete</h1>

                @else
                    <h1>Add</h1>
                @endif

                @if (Session::has('success1'))
                    <?php
                    echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Deleted",showConfirmButton: false, timer: 1800}) });</script>';
                    ?>
                @endif
                @if (Session::has('success2'))
                    <?php
                    echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Added",showConfirmButton: false, timer: 1800}) });</script>';
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
                                @if ($operation == 'delete')
                                    <a href="/discussion/delete-member/{{ $id }}/{{ $l->id }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>

                                @else
                                    <a href="/discussion/add-member/{{ $id }}/{{ $l->id }}"
                                        class="btn btn-primary"
                                        onclick="return confirm('Are you sure you want to add this user to discussion?');">Add</a>
                                @endif

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
    </div>

@endsection
