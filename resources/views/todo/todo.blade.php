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
                            <h3 class="card-title"><b>Insert Note</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/todo/store" method="post" role="form">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="Input Title" name="title">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <label>Text</label>
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
                    <br>
                    <hr>
                    <br>
                    <h1>Your Note</h1>
                    <br>
                    <?php
                    $index = 1;
                    ?>
                    <div class="row">
                        @foreach ($todo as $t)
                            <div class="col-sm-5 ml-4 mr-4">
                                <div class="card card-info card-outline " style="background-color: #333333">
                                    <div class="card-header" style="background-color: #e6b905">
                                        <h5 class="card-title text-white">{{ $t->title }}</h5>
                                        <div class="card-tools">
                                            <a href="#" class="btn btn-tool btn-link"
                                                style="color: white">#{{ $index }}</a>
                                            <a href="#" class="btn btn-tool">
                                                <i class="fas fa-pen white" style="color: white"></i>
                                                <a href="/todo/{{ $t->id }}/delete" class="ml-2">
                                                    <i class="fas fa-trash white" style="color: white"></i>
                                                </a>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body text-white">
                                        <p style="color: white">
                                            {!! $t->text !!}
                                        </p>
                                    </div>
                                </div>
                                <?php
                                $index++;
                                ?>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>
    </div>

@endsection
