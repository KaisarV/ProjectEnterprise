@extends('layouts/layout')
<!-- Content Wrapper. Contains page content -->

@section('container')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#target").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue > 3) {
                        $(".someform").show();

                    } else {
                        $(".someform").hide();
                    }
                });
            }).change();
        });

        function ValidateEmail(mail) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value)) {
                return (true)
            }
            alert("You have entered an invalid email address!")
            return (false)
        }
    </script>

    <div class="content-wrapper mt-3">
        <!-- /.col -->
        <section class="content ">
            <!-- general form elements disabled -->
            <div class="card card-info ml-5 mr-5 mt-4 mb-4">
                <div class="card-header">
                    <h3 class="card-title">Form Registration</h3>
                </div>

                <div class="card-body">
                    <form action="/register/insert" method="post" role="form" name="form1">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess">Name</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Input Employee Name"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputWarning">
                                Email</label>
                            <input type="text" class="form-control" id="inputWarning" placeholder="Input Employee Email"
                                name="email" @error('email') is-invalid @enderror value="{{ old('email') }}" required
                                autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputError">Password</label>
                            <input type="password" class="form-control " id="inputError" placeholder="Input Password"
                                name="password" required>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess">NIK</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Input Employee NIK"
                                name="nik" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess">City</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Input Employee City"
                                name="city" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess">Address</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Input Employee Address"
                                name="address" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess">Phone Number</label>
                            <input type="text" class="form-control" id="inputSuccess"
                                placeholder="Input Employee Phone Number" name="phone" required>
                        </div>


                        <div class="form-group">
                            <label>Position</label>
                            <select class="form-control" id="target" name="position">
                                @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}">{{ $j->jabatan }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group someform" style="display: none">
                            <label>Store</label>
                            <select class="form-control" name="store">
                                @foreach ($store as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_toko }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" onclick="ValidateEmail(document.form1.email)">Submit
                            Data</button>
                    </form>
                </div>
            </div>
        </section>
    </div>


@endsection
