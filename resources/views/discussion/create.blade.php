@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->
@section('container')
    <div class="mt-2">
        <div class="content-wrapper ">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr>
                </div>
                <!-- /.container-fluid -->
            </div>

            <div class=" ml-4 mr-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Discussion Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/discussion/create/run">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Discussion name</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter name" name="name">
                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."
                                    name="description"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">+ Create</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    @endsection
