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
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#tabs-home-ex1" class="nav-link active"
                                            data-bs-toggle="tab">Pegawai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">Siswa</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- USER PEGAWAI --}}
                                    <div class="tab-pane active show" id="tabs-home-ex1">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <div class="card-title">Data User Pegawai</div>
                                                            {{-- <div class="card-subtitle">Research Nurse</div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-actions">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn-action dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
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
                                                    <table class="table" id="table-pegawai">
                                                        <thead>
                                                            <tr>
                                                                <th><button class="table-sort">No.</button></th>
                                                                <th><button class="table-sort">Nama</button></th>
                                                                <th><button class="table-sort">Email</button></th>
                                                                <th><button class="table-sort">Role</button></th>
                                                                <th><button class="table-sort">Aksi</button></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-tbody">
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($data_pegawai as $row)
                                                                <tr>
                                                                    <td>{{ $no++ }}. </td>
                                                                    <td>
                                                                        <strong>
                                                                            {{ $row['name'] }}
                                                                        </strong>
                                                                    </td>
                                                                    <td>{{ $row['user_email'] }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge bg-indigo">{{ $row['role'] }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ url('admin/users/edit') . '/' . $row['user_id'] }}"
                                                                            class="btn btn-blue" role="button">Edit</a>
                                                                        {{-- <a href="#"
                                                                            class="btn btn-danger">Hapus</a> --}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- USER PEGAWAI --}}

                                    {{-- USER SISWA --}}
                                    <div class="tab-pane" id="tabs-profile-ex1">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <div class="card-title">Data User Siswa</div>
                                                            {{-- <div class="card-subtitle">Research Nurse</div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-actions">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn-action dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
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
                                                                <th><button class="table-sort">Email</button></th>
                                                                <th><button class="table-sort">Role</button></th>
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
                                                                            {{ $row['name'] }}
                                                                        </strong>
                                                                    </td>
                                                                    <td>{{ $row['user_email'] }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge bg-lime">{{ $row['role'] }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ url('admin/users/edit-siswa') . '/' . $row['user_id'] }}"
                                                                            class="btn btn-blue"
                                                                            role="button">Edit</a>
                                                                        {{-- <a href="#"
                                                                            class="btn btn-danger">Hapus</a> --}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- USER SISWA --}}
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



        $(document).ready(function() {
            $('#table-pegawai').DataTable({
                "dom": "<'row'<'col-sm-10'l><'col-sm-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-10'i><'col-sm-2'p>>",
            });
            $('#table-siswa').DataTable({
                "dom": "<'row'<'col-sm-10'l><'col-sm-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-10'i><'col-sm-2'p>>",
            });
        });
    </script>
</body>

</html>
