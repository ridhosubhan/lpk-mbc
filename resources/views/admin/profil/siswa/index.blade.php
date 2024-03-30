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

                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="card-title">Data Siswa</div>
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
                                    <table class="table" id="table-siswa">
                                        <thead>
                                            <tr>
                                                <th><button class="table-sort">No.</button></th>
                                                <th><button class="table-sort">Nama</button></th>
                                                <th><button class="table-sort">Tempat Tanggal Lahir</button></th>
                                                <th><button class="table-sort">Jenis Kelamin</button></th>
                                                <th><button class="table-sort">Email</button></th>
                                                <th><button class="table-sort">Aksi</button></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data_siswa as $row)
                                                <tr>
                                                    <td>{{ $no++ }}. </td>
                                                    <td>
                                                        <strong>
                                                            {{ $row['nama'] }}
                                                        </strong>
                                                    </td>
                                                    <td>{{ $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] }}</td>
                                                    <td>
                                                        {{ $row['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan' }}
                                                    </td>
                                                    <td>{{ $row['email_user'] }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/profil-siswa/edit') . '/' . $row['id'] }}"
                                                            class="btn btn-blue" role="button">Edit</a>
                                                        <a href="javascript:void(0)"
                                                            onClick="hapusSiswa('{{ $row['id'] }}', '{{ $row['nama'] }}')"
                                                            class="btn btn-danger">Hapus</a>
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

    @include('template.footer-script')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function hapusSiswa(siswa, nama) {
            var result = confirm(`Hapus semua yang berkaitan dengan data siswa ${nama}`);
            if (result == true) {
                $.ajax({
                    data: {
                        siswa_id: siswa,
                    },
                    url: "{{ route('profil-siswa-destroy') }}",
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
            $('#table-siswa').DataTable({
                "dom": "<'row'<'col-sm-10'l><'col-sm-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-10'i><'col-sm-2'p>>",
            });
        });
    </script>
</body>

</html>
