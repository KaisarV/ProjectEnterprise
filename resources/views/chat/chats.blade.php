@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')

    <style>
        .hover2:hover {
            background-color: #007bff;
            color: white;
        }

    </style>

    <div class="content-wrapper">
        <section class="content ">
            <div class="container-fluid ">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">{{ $title }}</h1>
                            </div><!-- /.col -->

                        </div><!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->
                </div>
                <hr>
                @php
                    $id = [];
                @endphp
                @foreach ($chat as $c)
                    @php
                        if ($c->id_pengirim != $myId) {
                            $idChatFriend = $c->id_pengirim;
                            $nameChatFriend = $c->nama_pengirim;
                        } else {
                            $idChatFriend = $c->id_penerima;
                            $nameChatFriend = $c->nama_penerima;
                        }
                        $cek = 0;
                        
                        for ($i = 0; $i < count($id); $i++) {
                            if ($idChatFriend == $id[$i]) {
                                //Bila nama ada di dalam array $nama maka cek berubah menjadi 1
                                $cek = 1;
                            }
                        }
                    @endphp

                    @if ($cek == 0)
                        <a href="/chat/room/{{ $idChatFriend }}"
                            class="card card-light card-outline mt-3 hover2 ml-4 mr-4 mt-4 bg-dark">
                            <div class="card-header">
                                @php
                                    array_push($id, $idChatFriend);
                                    if ($c->id_penerima == $idChatFriend) {
                                        $sender = 'You';
                                    } else {
                                        $sender = $c->nama_pengirim;
                                    }
                                    
                                @endphp
                                <h5 class="card-title"><b>{{ $nameChatFriend }}</b></h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $sender }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{!! $c->chat !!}

                                    @if ($c->dir != null)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="nav-icon fa fa-file-image"></i>
                                    @endif
                                </p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </section>
    </div>


@endsection
