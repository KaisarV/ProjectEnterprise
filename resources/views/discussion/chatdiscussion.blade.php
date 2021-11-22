@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->


@section('container')

    <div class="mt-5">
        <div class="content-wrapper ">
            @if (Session::has('success'))
                <?php
                echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Registered",showConfirmButton: false, timer: 1800}) });</script>';
                ?>

            @endif
            <section class="content ">
                <div class="container-fluid ">
                    <!-- DIRECT CHAT -->

                    <div class="card direct-chat direct-chat-primary ml-4 mr-4">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ $name }}</b></h3>
                            @if (Auth::user()->id_jabatan == 1)
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" data-toggle="dropdown" href="#">
                                            <span class="badge navbar-badge"><i class="fa fa-bars fa-lg"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <a href="/discussion/delete-member/{{ $idDiscussion }}"
                                                class="dropdown-item">
                                                <!-- Message Start -->
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h3 class="dropdown-item-title">
                                                            Delete Member
                                                        </h3>
                                                    </div>
                                                </div>
                                                <!-- Message End -->
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="/discusssion/add-member/{{ $idDiscussion }}" class="dropdown-item">
                                                <!-- Message Start -->
                                                <div class="media">

                                                    <div class="media-body">
                                                        <h3 class="dropdown-item-title">
                                                            Add Member
                                                        </h3>
                                                    </div>
                                                </div>
                                                <!-- Message End -->
                                            </a>
                                        </div>

                                    </li>

                                </ul>
                            @endif

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="myDiv">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="myDiv">
                                <!-- Message. Default to the left -->
                                @foreach ($discussion as $d)
                                    @if ($d->id_user == $myId)
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">You</span>
                                                <span class="direct-chat-timestamp float-left">{{ $d->date }}
                                                    {{ $d->time }}</span>
                                                @if ($d->dir != null)
                                                    <br>
                                                    <img src="{{ asset('/discussion_file/' . $d->dir) }}" alt=""
                                                        class="img-thumbnail w-25 float-right  mt-1 mb-1">

                                                @endif
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="{{ asset('/profile_file/' . $d->foto) }}"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $d->chat }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                    @else
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">{{ $d->name }}</span>
                                                <span class="direct-chat-timestamp float-right">{{ $d->date }}
                                                    {{ $d->time }}</span>

                                                @if ($d->dir != null)
                                                    <br>
                                                    <img src="{{ asset('/discussion_file/' . $d->dir) }}" alt=""
                                                        class="img-thumbnail w-25 float-left mt-1 mb-1">

                                                @endif
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="{{ asset('/profile_file/' . $d->foto) }}"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $d->chat }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <!--/.direct-chat-messages-->
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="/discussion/send" method="post" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class=" custom-file">
                                    <input type="file" id="validatedCustomFile" name="file">
                                </div>
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control"
                                        required>
                                    <input type="hidden" name="id" value="{{ $idDiscussion }}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script type="text/javascript">
        var myDiv = document.getElementById("myDiv");
        myDiv.scrollTop = myDiv.scrollHeight;
    </script>
@endsection
