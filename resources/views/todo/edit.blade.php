@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="card card-warning">
            <section class="content">
                @foreach ($todo as $t)
                    <div class="card-body">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><b>Edit Note</b> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/todo/edit/run" method="post" role="form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" value="{{ $t->title }}" name="title">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                            <label>Text</label>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3"
                                                    name="todo">{{ $t->text }}</textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{ $t->id }}" name="id">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button>

                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </section>
        </div>
    </div>

@endsection
