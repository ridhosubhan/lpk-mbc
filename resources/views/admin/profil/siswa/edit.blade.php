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
                    <form action="{{ route('profil-siswa-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-deck row-cards">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2 row">
                                            <div class="col">
                                                <img src="{{ asset('storage/' . $data_siswa->foto) }}"
                                                    class="img-thumbnail" alt="...">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col">
                                                <input class="form-control @error('foto') is-invalid @enderror"
                                                    type="file" name="foto" id="foto">
                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Profil Siswa</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" class="form-control" value="{{ $data_siswa->id }}"
                                            name="id_siswa" id="id_siswa" readonly>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Nama Lengkap</label>
                                            <div class="col">
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    value="{{ $data_siswa->nama }}" name="nama" id="nama">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Email</label>
                                            <div class="col">
                                                <input type="text" class="form-control"
                                                    value="{{ $data_siswa->email_user }}" name="email" id="email"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Jenis Kelamin</label>
                                            <div class="col">
                                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                    name="jenis_kelamin" id="jenis_kelamin">
                                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="l"
                                                        {{ $data_siswa->jenis_kelamin == 'l' ? 'selected' : '' }}>
                                                        Laki-laki
                                                    </option>
                                                    <option value="p"
                                                        {{ $data_siswa->jenis_kelamin == 'p' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Tempat Lahir</label>
                                            <div class="col">
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    value="{{ $data_siswa->tempat_lahir }}" name="tempat_lahir"
                                                    id="tempat_lahir">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Tanggal Lahir</label>
                                            <div class="col">
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    value="{{ $data_siswa->tanggal_lahir }}" name="tanggal_lahir"
                                                    id="tanggal_lahir">
                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Alamat</label>
                                            <div class="col">
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ $data_siswa->alamat }}</textarea>
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <button class="btn btn-indigo" type="submit">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('template.footer')
    </div>

    @include('template.footer-script')

    <script></script>
</body>

</html>
