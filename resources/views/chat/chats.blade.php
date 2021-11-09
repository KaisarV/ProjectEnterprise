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
                @php
                    $id = [];
                @endphp
                @foreach ($chat as $c)
                    @php
                        if ($c->id_pengirim != $myId) {
                            $idChatFriend = $c->id_pengirim;
                        } else {
                            $idChatFriend = $c->id_penerima;
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
                        <a href="/chat/room/{{ $idChatFriend }}" class="card card-light card-outline mt-3 hover2">
                            <div class="card-header">
                                @php
                                    array_push($id, $idChatFriend);
                                    if ($c->id_penerima == $idChatFriend) {
                                        $sender = 'You';
                                    } else {
                                        $tmp = DB::table('users')
                                            ->where('id', '!=', $c->id)
                                            ->get();
                                    
                                        $sender = $tmp[0]->name;
                                    }
                                    
                                    $nameChatFriend = DB::table('users')
                                        ->where('id', '=', $idChatFriend)
                                        ->get();
                                @endphp
                                <h5 class="card-title"><b>{{ $nameChatFriend[0]->name }}</b></h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $sender }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{!! $c->chat !!}
                                </p>
                            </div>
                        </a>
                    @endif

                @endforeach
            </div>
        </section>
    </div>


@endsection
