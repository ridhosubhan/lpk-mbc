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
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="card-title">Data Pendaftar</div>
                                            {{-- <div class="card-subtitle">Research Nurse</div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-actions">
                                    <div class="dropdown">
                                        <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
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
                                <div class="table-responsive">
                                    <table class="table" id="table-pendaftar">
                                        <thead>
                                            <tr>
                                                <th><button class="table-sort">No.</button></th>
                                                <th><button class="table-sort">Nama</button></th>
                                                <th><button class="table-sort">Tempat Tanggal Lahir</button></th>
                                                <th><button class="table-sort">Jenis Kelamin</button></th>
                                                <th><button class="table-sort">Email</button></th>
                                                <th><button class="table-sort">Status Pendaftaran</button></th>
                                                <th><button class="table-sort">Bukti Pembayaran</button></th>
                                                <th><button class="table-sort">Aksi</button></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data_pendaftar as $row)
                                                <tr>
                                                    <td>{{ $no++ }}. </td>
                                                    <td><a href="javascript::void(0)" style="text-decoration:none;"
                                                            onClick="detailPendaftar('{{ $row['siswa_id'] }}')"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetailSiswa">
                                                            <strong>
                                                                {{ $row['nama_siswa'] }}
                                                            </strong>
                                                        </a>
                                                    </td>
                                                    <td>{{ $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] }}</td>
                                                    <td>
                                                        {{ $row['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan' }}
                                                    </td>
                                                    <td>{{ $row['email_user'] }}</td>
                                                    <td>
                                                        @if ($row['status_daftar'] == 'belum_verifikasi')
                                                            <span class="badge bg-yellow">Belum Verifikasi</span>
                                                        @elseif($row['status_daftar'] == 'diterima')
                                                            <span class="badge bg-green">Diterima</span>
                                                        @elseif($row['status_daftar'] == 'ditolak')
                                                            <span class="badge bg-red">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($row['bukti_transfer']))
                                                            <a href="{{ asset('storage/' . $row['bukti_transfer']) }}"
                                                                class="btn btn-sm btn-info" target="_blank">Lihat Bukti
                                                                Pembayaran</a>
                                                        @else
                                                            <span class="badge bg-red">Belum Unggah</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group " role="group"
                                                            aria-label="Basic outlined example">
                                                            <button
                                                                onClick="terimaPendaftar('{{ $row['siswa_id'] }}', '{{ $row['nama_siswa'] }}', '{{ $row['pembayaran_spp_id'] }}', '{{ $row['spp_id'] }}')"
                                                                type="button" class="btn btn-outline-info"
                                                                {{ $row['status_daftar'] == 'diterima' || $row['status_daftar'] == 'ditolak' ? 'disabled' : '' }}>Terima</button>
                                                            <button type="button"
                                                                onClick="tolakPendaftar('{{ $row['siswa_id'] }}', '{{ $row['nama_siswa'] }}', '{{ $row['pembayaran_spp_id'] }}', '{{ $row['spp_id'] }}')"
                                                                class="btn btn-outline-orange"
                                                                {{ $row['status_daftar'] == 'diterima' || $row['status_daftar'] == 'ditolak' ? 'disabled' : '' }}>Tolak</button>
                                                            <a href="{{ url('/admin/cetak-pdf') . '/' . $row['siswa_id'] }}"
                                                                target="_blank" class="btn btn-outline-teal">Cetak
                                                                Kartu</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        @include('template.footer')
    </div>

    <!-- Modal Detail Siswa -->
    <div class="modal fade" id="modalDetailSiswa" tabindex="-1" aria-labelledby="modalDetailSiswaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <img src="{{ asset('assets/static/avatars/003m.jpg') }}" name="foto" id="foto"
                                    class="rounded mx-auto d-block" alt="...">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">Nama Lengkap</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">Tempat Tanggal Lahir</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="ttl" id="ttl"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">Jenis Kelamin</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="jenis_kelamin"
                                        id="jenis_kelamin" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">Alamat</label>
                                <div class="col">
                                    <textarea class="form-control" name="alamat" id="alamat" readonly> </textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">Status Pendaftaran</label>
                                <div class="col">
                                    <div id="div_status_pendaftaran">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label">Detail Pembayaran</label>
                        <div class="col">
                            <div class="table-responsive table-hover table-bordered table-striped">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Keterangan</th>
                                            <th>Nominal</th>
                                            <th>Bukti Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tagihanPembayaran">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @include('template.footer-script')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const format_rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }


        function detailPendaftar(siswa_id) {
            $.ajax({
                data: {
                    siswa_id: siswa_id
                },
                url: "{{ route('/detail-pendaftar') }}",
                type: "POST",
                success: function(response) {
                    console.log(response);
                    if (response.status === 1) {
                        var storage_path = "{{ asset('storage') }}";
                        $("#foto").attr("src", `${storage_path +'/'+ response.data.foto}`);
                        $('#nama_lengkap').val(response.data.nama_siswa);
                        $('#ttl').val(response.data.tempat_lahir + ', ' + response.data.tanggal_lahir);
                        var jk = (response.data.jenis_kelamin == 'l') ? 'Laki - laki' : 'Perempuan';
                        $('#jenis_kelamin').val(jk);
                        $('#alamat').val(response.data.alamat);

                        $("#append_div_status_pendaftaran").remove();
                        const status_pendaftaran = response.data.status_daftar;
                        if (status_pendaftaran == 'belum_verifikasi') {
                            $("#div_status_pendaftaran").append(`
                                <div id="append_div_status_pendaftaran">
                                        <span class="badge bg-yellow">Belum Verifikasi</span>
                                </div>
                            `);
                        } else if (status_pendaftaran == 'diterima') {
                            $("#div_status_pendaftaran").append(`
                                <div id="append_div_status_pendaftaran">
                                    <span class="badge bg-green">Diterima</span>
                                </div>
                            `);
                        } else if (status_pendaftaran == 'ditolak') {
                            $("#div_status_pendaftaran").append(`
                                <div id="append_div_status_pendaftaran">
                                    <span class="badge bg-red">Ditolak</span>
                                </div>
                            `);
                        }

                        $(".appendPembayaran").remove();
                        var bukti_tf = "";
                        if (response.data.bukti_transfer == null) {
                            bukti_tf = `<span class="badge bg-red">Belum Mengunggah Bukti Pembayaran</span>`;
                        } else {
                            bukti_tf =
                                `<a href="${storage_path + '/'+ response.data.bukti_transfer}" class="btn btn-sm btn-primary" target="_blank">Bukti Pembayaran</a>`;
                        }
                        $("#tagihanPembayaran").append(
                            `
                                <tr class="appendPembayaran">
                                    <td>1. </td>
                                    <td>${response.data.keterangan}</td>
                                    <td>${format_rupiah(response.data.nominal)}</td>
                                    <td>
                                        ${bukti_tf}
                                    </td>
                                </tr>
                            `
                        );


                    }
                },
                error: function(response) {
                    alert(response.message);
                    console.log('Error:', data);
                }
            });
        }

        function terimaPendaftar(siswa_id, nama, pembayaran_spp_id, tagihan_pembayaran_id) {
            var result = confirm(`Terima Pendaftar dengan nama ${nama}`);
            if (result == true) {
                $.ajax({
                    data: {
                        siswa_id: siswa_id,
                        pembayaran_spp_id: pembayaran_spp_id,
                        tagihan_pembayaran_id: tagihan_pembayaran_id,
                    },
                    url: "{{ route('/terima-pendaftar') }}",
                    type: "POST",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            alert(response.data);
                            window.location.reload();
                        }
                    },
                    error: function(response) {
                        alert(response.message);
                        console.log('Error:', data);
                    }
                });
            }
        }

        function tolakPendaftar(siswa_id, nama, pembayaran_spp_id, tagihan_pembayaran_id) {
            var result = confirm(`Terima Pendaftar dengan nama ${nama}`);
            if (result == true) {
                $.ajax({
                    data: {
                        siswa_id: siswa_id,
                        pembayaran_spp_id: pembayaran_spp_id,
                        tagihan_pembayaran_id: tagihan_pembayaran_id,
                    },
                    url: "{{ route('/tolak-pendaftar') }}",
                    type: "POST",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            alert(response.data);
                            window.location.reload();
                        }
                    },
                    error: function(response) {
                        alert(response.message);
                        console.log('Error:', data);
                    }
                });
            }
        }

        $(document).ready(function() {
            $('#table-pendaftar').DataTable({
                "dom": "<'row'<'col-sm-10'l><'col-sm-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-10'i><'col-sm-2'p>>",
            });
        });
    </script>
</body>

</html>
