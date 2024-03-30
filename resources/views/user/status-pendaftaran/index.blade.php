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
                                    <div>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="avatar avatar-lg rounded"
                                                    style="background-image: url({{ asset('storage/' . $profil_siswa->foto) }})"></span>
                                            </div>
                                            <div class="col">
                                                <div class="card-title">Biodata</div>
                                                <div class="card-subtitle">{{ $profil_siswa->nama }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-actions">
                                        <div class="dropdown">
                                            <a href="#" class="btn-action dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-vcenter table-hover card-table">
                                        <tbody>
                                            <tr>
                                                <td class="col-lg-6 col-md-3 col-xs-12">Nama Lengkap</td>
                                                <td>:</td>
                                                <td class="col-lg-6 col-md-3 col-xs-12">
                                                    {{ $profil_siswa->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-lg-6 col-md-3 col-xs-12">Email</td>
                                                <td>:</td>
                                                <td class="col-lg-6 col-md-3 col-xs-12">
                                                    {{ $profil_siswa->email_user }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-lg-6 col-md-3 col-xs-12">Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td class="col-lg-6 col-md-3 col-xs-12">
                                                    {{ $profil_siswa->tempat_lahir . ', ' . $profil_siswa->tanggal_lahir }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-lg-6 col-md-3 col-xs-12">Jenis Kelamin</td>
                                                <td>:</td>
                                                <td class="col-lg-6 col-md-3 col-xs-12">
                                                    {{ $profil_siswa->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-lg-6 col-md-3 col-xs-12">Alamat</td>
                                                <td>:</td>
                                                <td class="col-lg-6 col-md-3 col-xs-12">
                                                    {{ $profil_siswa->alamat }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="card-title">Status Pendaftaran</div>
                                                {{-- <div class="card-subtitle">Research Nurse</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-actions">
                                        <div class="dropdown">
                                            <a href="#" class="btn-action dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- Status Pendaftaran --}}
                                    <div class="row mt-2">
                                        @if (!empty($tagihan))
                                            {{-- Tagihan  --}}
                                            <div class="col-sm-12 md-12 m-2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div>
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <span class="avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-cash"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <path
                                                                                d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                                                            </path>
                                                                            <path
                                                                                d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0">
                                                                            </path>
                                                                            <path
                                                                                d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="card-title">Tagihan</div>
                                                                    <div class="card-subtitle">
                                                                        @if (!empty($tagihan))
                                                                            <span class="badge bg-danger">Terdapat
                                                                                Tagihan</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-actions">
                                                            <a href="#" class="btn" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-list-search"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none">
                                                                    </path>
                                                                    <path d="M15 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0">
                                                                    </path>
                                                                    <path d="M18.5 18.5l2.5 2.5"></path>
                                                                    <path d="M4 6h16"></path>
                                                                    <path d="M4 12h4"></path>
                                                                    <path d="M4 18h4"></path>
                                                                </svg>
                                                                Detail
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 md-12 m-2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div>
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <span class="avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-upload"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <path
                                                                                d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2">
                                                                            </path>
                                                                            <path d="M7 9l5 -5l5 5"></path>
                                                                            <path d="M12 4l0 12"></path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="card-title">Unggah Bukti Pembayaran
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-actions">
                                                            <a href="#" class="btn" data-bs-toggle="modal"
                                                                data-bs-target="#modalBuktiUpload">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-upload"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2">
                                                                    </path>
                                                                    <path d="M7 9l5 -5l5 5"></path>
                                                                    <path d="M12 4l0 12"></path>
                                                                </svg>
                                                                Unggah
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-sm-12 md-12 m-2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div>
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <span class="avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-clipboard-list"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <path
                                                                                d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                                                            </path>
                                                                            <path
                                                                                d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                                                            </path>
                                                                            <path d="M9 12l.01 0"></path>
                                                                            <path d="M13 12l2 0"></path>
                                                                            <path d="M9 16l.01 0"></path>
                                                                            <path d="M13 16l2 0"></path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="card-title">Status Pendaftaran</div>
                                                                    <div class="card-subtitle">
                                                                        @if ($profil_siswa->status_daftar == 'belum_verifikasi')
                                                                            <span class="badge bg-yellow">Menunggu
                                                                                Verifikasi Admin</span>
                                                                        @elseif($profil_siswa->status_daftar == 'diterima')
                                                                            <span
                                                                                class="badge bg-green">Diterima</span>
                                                                        @elseif($profil_siswa->status_daftar == 'ditolak')
                                                                            <span class="badge bg-red">Ditolak</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-actions">
                                                            @if ($profil_siswa->status_daftar == 'diterima')
                                                                <a href="{{ url('/user/cetak-pdf') }}" target="_blank"
                                                                    class="btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-printer"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none"></path>
                                                                        <path
                                                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                                                        </path>
                                                                        <path
                                                                            d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4">
                                                                        </path>
                                                                        <path
                                                                            d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                                                        </path>
                                                                    </svg>
                                                                    Cetak Kartu
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tagihan -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Tagihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped"">
                                <thead>
                                    <tr>
                                        <th>Nama Tagihan</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ !empty($tagihan->keterangan) ? $tagihan->keterangan : '' }} </td>
                                        <td>{{ !empty($tagihan->nominal) ? 'Rp ' . number_format($tagihan->nominal, 2, ',', '.') : '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Upload Bukti Bayar --}}
        <form id="formUnggahBuktiBayar">
            <div class="modal fade" id="modalBuktiUpload" tabindex="-1" aria-labelledby="modalBuktiUploadLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="spp_id"
                                value="{{ !empty($tagihan->spp_id) ? $tagihan->spp_id : '' }}">
                            <input class="form-control" type="hidden" name="tagihan_id"
                                value="{{ !empty($tagihan->tagihan_id) ? $tagihan->tagihan_id : '' }}">
                            <div class="mb-3">
                                <label for="file_bukti" class="form-label">Unggah Bukti Pembayaran</label>
                                <input class="form-control" type="file" name="file_bukti" id="file_bukti">
                                <div class="invalid-feedback error_file_bukti"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @include('template.footer')
    </div>

    @include('template.footer-script')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $('#formUnggahBuktiBayar').on('submit', function(e) {
            e.preventDefault();
            var form_data = new FormData($('#formUnggahBuktiBayar')[0]);

            $.ajax({
                data: form_data,
                url: "{{ route('/unggah-bukti-bayar') }}",
                type: "POST",
                enctype: 'multipart/form-data',
                processData: false,
                cache: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 0) {
                        if (response.error.file_bukti) {
                            $('#file_bukti').addClass('is-invalid');
                            $('.error_file_bukti').html(response.error.file_bukti);
                        } else {
                            $('#file_bukti').removeClass('is-invalid');
                            $('.error_file_bukti').html('');
                        }
                    }

                    if (response.status === 1) {
                        alert(response.success);
                        location.reload();
                    }
                },
                error: function(response) {
                    alert(response.message);
                    console.log('Error:', data);
                }
            });
        });
    </script>


</body>

</html>
