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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="text-secondary">
                                                Selamat Datang, {{ Auth::user()->name }}
                                            </h4>
                                        </div>
                                    </div>

                                    {{-- Status Pendaftaran --}}
                                    <div class="row mt-2">
                                        <div class="col-md-12 m-2">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div>
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <span class="avatar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-users"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none"></path>
                                                                        <path
                                                                            d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0">
                                                                        </path>
                                                                        <path
                                                                            d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2">
                                                                        </path>
                                                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="card-title">Status Pendaftaran</div>
                                                                <div class="card-subtitle">status</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-actions">
                                                        <a href="{{ url('/user/status-pendaftaran') }}" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-list-search"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        @include('template.footer')
    </div>
    </div>

    @include('template.footer-script')


</body>

</html>
