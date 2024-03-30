<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    @include('template.head')
</head>

<body>
    <script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('template.sidebar')
        <div class="page-wrapper">
            @include('template.page-header')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        @if ($message = Session::get('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="alert-title">Sukses!</h4>
                                        <div class="text-muted">{{ $message }}</div>
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                        @endif

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ganti Password</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/' . Auth::user()->role . '/akun-update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col">
                                                <input type="text"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    name="email" value="{{ $data_user->email }}" readonly>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Password</label>
                                            <div class="col">
                                                <input type="password"
                                                    class="form-control @error('password_new') is-invalid @enderror"
                                                    name="password_new">
                                                @error('password_new')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <button class="btn btn-indigo" type="submit">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('template.footer')
    </div>

    @include('template.footer-script')

    <script></script>
</body>

</html>
