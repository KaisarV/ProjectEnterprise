@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="card card-warning">
            <section class="content">
                <div class="card-body">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><b>Insert TodoList</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/todo/store" method="post" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Enter ..."
                                                name="todo"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>

                            </form>
                        </div>

                    </div>
                    @foreach ($todo as $t)
                        <div class="card card-info card-outline" style="background-color: #333333">
                            <div class="card-header" style="background-color: #e6b905">
                                <h5 class="card-title text-white">Create Labels</h5>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-link" style="color: white">#3</a>
                                    <a href="#" class="btn btn-tool">
                                        <i class="fas fa-pen white" style="color: white"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-white">

                                {!! $t->text !!}


                            </div>
                        </div>
                    @endforeach


                </div>
            </section>
        </div>
    </div>

@endsection
