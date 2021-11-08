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
                    $name = [];
                @endphp
                @foreach ($chat as $c)
                    @php
                        $cek = 0;
                        $tmp2 = DB::table('users')
                            ->where('id', '=', $c->id_penerima)
                            ->get();
                        
                        $name2 = $tmp2[0]->name;
                        
                        for ($i = 0; $i < count($name); $i++) {
                            if ($name2 == $name[$i]) {
                                //Bila nama ada di dalam array $nama maka cek berubah menjadi 1
                                $cek = 1;
                            }
                        }
                    @endphp

                    @if ($cek == 0)


                        <div class="card card-light card-outline mt-3 hover2">
                            <div class="card-header">
                                @php
                                    array_push($name, $name2);
                                    if ($c->id != Auth::user()->id) {
                                        $tmp = DB::table('users')
                                            ->where('id', '!=', $c->id)
                                            ->get();
                                    
                                        $sender = $tmp[0]->name;
                                    } else {
                                        $sender = 'You';
                                    }
                                @endphp
                                <h5 class="card-title"><b>{{ $name2 }}</b></h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $sender }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{!! $c->chat !!}
                                </p>
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
        </section>
    </div>


@endsection
