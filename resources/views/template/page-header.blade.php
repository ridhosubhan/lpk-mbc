<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    LKP Mulya Bhakti Computer
                </div>
                <h2 class="page-title">
                    {{ $title }}
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        @php
                            $foto = '';
                            $foto = Auth::user()->role == 'admin' ? $profil_admin->foto : $profil_siswa->foto;
                        @endphp
                        <span class="avatar avatar-sm"
                            style="background-image: url({{ asset('storage/' . $foto) }})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="mt-1 small text-muted">{{ Auth::user()->role }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="./profile.html" class="dropdown-item">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="./settings.html" class="dropdown-item">Settings</a>
                        <a href="./sign-in.html" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
