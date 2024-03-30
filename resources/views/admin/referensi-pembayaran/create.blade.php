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
                    <form action="{{ route('referensi-pembayaran-create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-deck row-cards">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Referensi Pembayaran</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Nama</label>
                                            <div class="col">
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" id="nama">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Nominal</label>
                                            <div class="col">
                                                <input type="text"
                                                    class="form-control @error('nominal') is-invalid @enderror"
                                                    name="nominal" id="nominal">
                                                @error('nominal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-4 col-form-label">Keterangan</label>
                                            <div class="col">
                                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"></textarea>
                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <button class="btn btn-indigo" type="submit">Simpan</button>
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
