<!DOCTYPE html>
<html lang="en">

<head>
    @include('landing-page-template.head')

    <style>
        .bd-callout {
            padding: 1.25rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border: 4px solid #e9ecef;
            border-left-width: .25rem;
            border-radius: .25rem
        }

        .bd-callout h4 {
            margin-bottom: .25rem
        }

        .bd-callout p:last-child {
            margin-bottom: 0
        }

        .bd-callout code {
            border-radius: .25rem
        }

        .bd-callout+.bd-callout {
            margin-top: -.25rem
        }

        .bd-callout-info {
            border-left-color: #5bc0de
        }

        .bd-callout-warning {
            border-left-color: #f0ad4e
        }

        .bd-callout-danger {
            border-left-color: #d9534f
        }
    </style>
</head>

<body>

    @include('landing-page-template.header')

    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Siswa Baru</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">

                <!-- ======= Frequently Asked Questions Section ======= -->
                <section id="faq" class="faq section-bg">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2>Informasi</h2>
                            <h3>Tahapan <span>Pendaftaran</span></h3>
                            <p>Berikut tahapan pendaftaran siswa baru LPK Mulya Bhakti Computer</p>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <ul class="faq-list">

                                    <li>
                                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq100">
                                            Mengakses menu pendaftaran<i class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                        <div id="faq100" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                Menu pendaftaran dapat diakses melalui tautan <a
                                                    href="{{ url('daftar') }}">berikut</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Mengisi
                                            formulir pendaftaran melalui website <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                Setelah mengisi formulir pendaftaran, anda akan mendapatkan akun yang
                                                kemudian dapat digunakan untuk login.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Login
                                            akun <i class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                Login akun melalui tautan <a href="{{ url('login') }}">berikut</a>
                                                untuk akses dashboard dan melanjutkan ke tahapan selanjutnya
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
                                            Membayar biaya Pendaftaran dan biaya kursus. <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                Biaya pendaftaran dan biaya kursus dikirim ke rekening XXX No. XXXXXXXX
                                                atas nama XXXXXXXX
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
                                            Mengunggah bukti transfer atau pembayaran. <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                Bukti pembayaran dapat diunggah di menu dashboard setelah <a
                                                    href="{{ url('login') }}">login</a>.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">
                                            Menunggu verifikasi <i class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                Tim kami akan memverifikasi pendaftaran kamu. Mohon tunggu, segala
                                                informasi dapat diakses di menu <a
                                                    href="{{ url('login') }}">dashboard</a>.
                                            </p>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </section><!-- End Frequently Asked Questions Section -->

                {{-- PAGE DAFTAR --}}
                <div class="row">
                    <div class="bd-callout bd-callout-warning">
                        <h3 id="associating-form-text-with-form-controls">Daftar Siswa</h3> <br>
                        @if ($message = Session::get('sukses'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    <strong>{{ $message }}</strong> Silakan <a href="{{ route('login') }}"
                                        class="alert-link">Login</a>.
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('daftar-siswa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label"><strong>Nama Lengkap</strong></label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">
                                            <strong>Tempat Lahir</strong></label>
                                        <input type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">
                                            <strong>Tanggal Lahir</strong></label>
                                        <input type="date"
                                            class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" id="tanggal_lahir"
                                            value="{{ old('tanggal_lahir') }}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label"><strong>Jenis Kelamin</strong></label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" id="jenis_kelamin">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="l" {{ old('jenis_kelamin') == 'l' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="p" {{ old('jenis_kelamin') == 'p' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                                <textarea class="form-control @error('alamat') is-invalid" @enderror" name="alamat" id="alamat" cols="30"
                                    rows="2">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label"><strong>Foto</strong></label>
                                <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                    name="foto" id="foto">
                                <small class="form-text text-muted">
                                    <strong>
                                        Mohon unggah foto dengan ekstensi jpg, jpeg, atau png.
                                    </strong>
                                </small>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Daftar</button>
                        </form>
                    </div>
                </div>
                {{-- PAGE DAFTAR --}}
        </section>

    </main><!-- End #main -->

    @include('landing-page-template.footer')


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    @include('landing-page-template.footer-script')

</body>

</html>
