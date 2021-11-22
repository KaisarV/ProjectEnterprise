@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')
    @if (Session::has('success'))
        <?php
        echo '<script type="text/javascript"> $(document).ready(function(){swal({icon: "success", title: "Success Registered",showConfirmButton: false, timer: 1800}) });</script>';
        ?>

    @endif

    <body onload="startTime()">

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="ml-4 mr-4">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">{{ $title }}</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                            </ol> --}}
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <hr>


                        <style>
                            .jumbotron-image {
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: cover;
                            }

                        </style>
                        @php
                            if ($data2['name'] == 'Bogor') {
                                $image = 'Bogor.jpg';
                            } elseif ($data2['name'] == 'Tanggerang') {
                                $image = 'Tanggerang.jpg';
                            } elseif ($data2['name'] == 'Bekasi') {
                                $image = 'Bekasi.jpg';
                            } else {
                                $image = 'Jakarta.jpg';
                            }
                        @endphp

                        <div class="jumbotron text-white jumbotron-image shadow"
                            style="background-image: url({{ asset('dist/img/' . $image) }});">
                            <div class="text-center">
                                <h1 class="display-4 h1 " id="txt"></h1>
                                <h1>{{ date('l, jS F Y ') }}</h1>
                            </div>

                            <br>
                            <br>
                            <h1 class="display-4">{!! $greeting !!}</h1>

                            <h4 class="mt-1">
                                <p><i>{{ $quote }}</i></p>

                                <script>
                                    function startTime() {
                                        const today = new Date();
                                        let h = today.getHours();
                                        let m = today.getMinutes();
                                        let s = today.getSeconds();
                                        m = checkTime(m);
                                        s = checkTime(s);
                                        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
                                        setTimeout(startTime, 1000);
                                    }

                                    function checkTime(i) {
                                        if (i < 10) {
                                            i = "0" + i
                                        }; // add zero in front of numbers < 10
                                        return i;
                                    }
                                </script>
                            </h4>
                            <br><br>
                            <div>
                                <h4 class="mb-0">{{ $data2['name'] }}, Indonesia</h4>
                                <p class="display-4 my-3">

                                    {{ (int) ($data2['main']['temp'] - 273.15) }} °C
                                </p>
                                <h5>{{ $data2['weather'][0]['main'] }}</h5>
                                <h6>{{ $data2['weather'][0]['description'] }}</h6>
                            </div>
                            <br><br>
                            <h1 class="text-center">Covid Data in Indonesia</h1><br>
                            <div class="row ml-3 justify-content-center">

                                <div class="col-lg-3 col-6">
                                    <!-- small box -->

                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $data[0]['positif'] }}</h3>
                                            <p>Total Cases</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $data[0]['sembuh'] }}</h3>

                                            <p>Healed</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>

                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $data[0]['meninggal'] }}</h3>

                                            <p>Deaths</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <hr>
                <section class="content ml-2">
                    <div class="container-fluid">

                        @if (count($mynote) != 0)
                            <div style="background-image: url({{ asset('dist/img/note.jpg') }});background-size: cover"
                                class="jumbotron" id="landing-wrapper">
                                <b>
                                    <h1 class="display-4 text-white">Your Note</h1>
                                </b>
                                <br>
                                <br>
                        @endif
                        <div class="row">
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($mynote as $t)
                                <div class="col-sm-5 mr-5">
                                    <div class="card card-info card-outline ml-3" style="background-color: #333333">
                                        <div class="card-header" style="background-color: #e6b905">
                                            <h5 class="card-title text-white">{{ $t->title }}</h5>
                                            <div class="card-tools">
                                                <a href="" class="btn btn-tool btn-link"
                                                    style="color: white">#{{ $index }}</a>
                                                <a href="todo/edit/{{ $t->id }}" class="btn btn-tool">
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
                                @php
                                    $index++;
                                @endphp

                            @endforeach
                        </div>
                    </div>

                    @if (Auth::user()->id_jabatan == 1)
                        <hr>
                        <div style="background-image: url({{ asset('dist/img/data.jpg') }});background-size: cover"
                            class="jumbotron" id="landing-wrapper">

                            <h3 class="display-4 text-white">Website Data</h3>
                            <br><br>
                            <div class="row ml-3">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $jumlahGrup }}</h3>
                                            <p>Discussions Created</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </div>
                                        <a href="/discussion" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ $jumlahUser }}</h3>

                                            <p>User Registrations</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="/find" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{ $jumlahFeedback }}</h3>

                                            <p>Total Feedback/Report</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        <a href="#feedback" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <hr>
                        <div style="background-image: url({{ asset('dist/img/feedback.jpg') }});background-size: cover"
                            class="jumbotron" id="landing-wrapper">
                            <h3 class="display-4 text-white" id="feedback">Report/Feedback </h3>
                            <br>
                            <div class="card-columns">

                                @foreach ($feedback as $f)

                                    @if ($f->photo != null)

                                        <div class="card {{ $f->tipe === 'Bug' ? 'bg-warning' : 'bg-success' }} ">
                                            <img class="card-img-top" src="{{ asset('/chat_file/' . $f->photo) }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3"><b>{{ $f->name }}</b></h5>
                                                <p class="card-text">{{ $f->text }}</p>
                                                <p class="card-text "><small
                                                        class="text-dark">{{ $f->date }}</small></p>
                                            </div>
                                        </div>

                                    @else
                                        <div class="card">
                                            <div
                                                class="card-body {{ $f->tipe === 'Bug' ? 'bg-warning' : 'bg-success' }}">
                                                <h5 class="card-title mb-3"><b>{{ $f->name }}</b></h5>
                                                <p class="card-text">{{ $f->text }}</p>
                                                <p class="card-text"><small
                                                        class="text-dark ">{{ $f->date }}</small></p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    @endif
            </div>
            </section>
        </div>

        </div>

    @endsection
