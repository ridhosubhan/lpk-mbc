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
                                            <div class="card-title">Data Referensi Pembayaran</div>
                                            {{-- <div class="card-subtitle">Research Nurse</div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-actions">
                                    <a href="{{ url('admin/referensi-pembayaran/create') }}"
                                        class="btn btn-primary">Tambah</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table-ref-pembayaran">
                                        <thead>
                                            <tr>
                                                <th><button class="table-sort">No.</button></th>
                                                <th><button class="table-sort">Nama</button></th>
                                                <th><button class="table-sort">Keterangan</button></th>
                                                <th><button class="table-sort">Nominal</button></th>
                                                <th><button class="table-sort">Aksi</button></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data_ref_pembayaran as $row)
                                                <tr>
                                                    <td>{{ $no++ }}. </td>
                                                    <td>
                                                        <strong>
                                                            {{ $row['nama'] }}
                                                        </strong>
                                                    </td>
                                                    <td>{{ $row['keterangan'] }}</td>
                                                    <td>{{ $row['nominal'] }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/referensi-pembayaran/edit') . '/' . $row['id'] }}"
                                                            class="btn btn-blue" role="button">Edit</a>
                                                        <a href="javascript:void(0)"
                                                            onClick="hapusData('{{ $row['id'] }}')"
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

        function hapusData(id_ref) {
            var result = confirm(`Hapus Data?`);
            if (result == true) {
                $.ajax({
                    data: {
                        id_ref: id_ref,
                    },
                    url: "{{ route('referensi-pembayaran-destroy') }}",
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
            $('#table-ref-pembayaran').DataTable({
                "dom": "<'row'<'col-sm-10'l><'col-sm-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-10'i><'col-sm-2'p>>",
            });
        });
    </script>
</body>

</html>
