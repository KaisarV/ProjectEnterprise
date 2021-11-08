@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->


@section('container')

    <div class="mt-5">
        <div class="content-wrapper ">
            <section class="content ">
                <div class="container-fluid ">
                    <!-- DIRECT CHAT -->
                    <div class="card direct-chat direct-chat-primary ">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ $person }}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="myDiv">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="myDiv">
                                <!-- Message. Default to the left -->
                                @foreach ($chat as $c)
                                    @if ($c->id_pengirim == Auth::user()->id)
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">You</span>
                                                <span class="direct-chat-timestamp float-left">{{ $c->date }}
                                                    {{ $c->time }}</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="{{ asset('dist/img/user3-128x128.jpg') }}"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $c->chat }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                    @else
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">{{ $person }}</span>
                                                <span class="direct-chat-timestamp float-right">{{ $c->date }}
                                                    {{ $c->time }}</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg') }}"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $c->chat }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>

                                    @endif
                                @endforeach
                                <!-- Message to the right -->

                                <!-- /.direct-chat-msg -->
                            </div>
                            <!--/.direct-chat-messages-->
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="/chat/send" method="post" role="form">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <input type="hidden" name="id" value="{{ $id }}">
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
