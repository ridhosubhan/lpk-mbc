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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Biodata User</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-4 col-form-label">Nama Lengkap</label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{ $data_siswa->name }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-4 col-form-label">Tempat Tanggal Lahir</label>
                                        <div class="col">
                                            <input type="text" class="form-control"
                                                value="{{ $data_siswa->tempat_lahir . ', ' . $data_siswa->tanggal_lahir }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col">
                                            <input type="text" class="form-control"
                                                value="{{ $data_siswa->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ganti Password User</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('users-update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col">
                                                <input type="text"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    name="email" value="{{ $data_siswa->user_email }}" readonly>
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

    </script>
</body>

</html>
