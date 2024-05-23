<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css" rel="stylesheet">

    @stack('style')
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                @if (Auth::user()->picture)
                    <a href="#" class="img logo rounded-circle mb-5"
                        style="background-image: url({{ 'storage/' . Auth::user()->picture }});"></a>
                @else
                    <a href="#" id="addPictureBtn" class="img logo rounded-circle mb-5" data-toggle="modal"
                        data-target="#selectPictureModal"
                        style="display: flex; justify-content: center; align-items: center; background-color: #f8f9fa;">
                        <i class="fa fa-plus" style="font-size: 24px; color: #6c757d;"></i>
                    </a>
                @endif
                <ul class="list-unstyled components mb-5">
                    <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('pegawai.*') ? 'active' : '' }}">
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Pegawai</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li class="{{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                                <a href="{{ route('pegawai.index') }}">Pegawai</a>
                            </li>
                            <li>
                                <a href="#">Tambah Pegawai</a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>

                <div class="footer">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    </p>
                </div>
            </div>
        </nav>


        <div class="modal fade" id="selectPictureModal" tabindex="-1" aria-labelledby="selectPictureModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('upload.picture') }}" enctype="multipart/form-data" id="dropzoneForm"
                        class="dropzone" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="selectPictureModalLabel">Pilih Gambar Profil</h5>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"><i
                                    class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="userIdInput" name="userId" value="{{ Auth::id() }}">
                            <div class="fallback">
                                <input name="picture" type="file" accept="image/*" required>
                            </div>

                        </div>
                    </form>
                    <div class="modal-footer"> <!-- Tombol-tombol tutup/simpan berada di dalam modal-body -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('pegawai.index') ? 'active' : '' }}  ">
                                <a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
                            </li>
                            <li class="nav-item ms-2">
                                <a id="logoutBtn" class="nav-link " href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.8/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.8/themes/fas/theme.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;

        $(document).ready(function() {
            var myDropzone = new Dropzone("#dropzoneForm", {
                url: "{{ route('upload.picture') }}",
                paramName: 'picture',
                maxFiles: 1,
                maxFilesize: 2,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                dictDefaultMessage: 'Drop gambar di sini atau klik untuk memilih gambar',
                dictRemoveFile: 'Hapus',
                dictCancelUpload: 'Batal',
                init: function() {
                    this.on("addedfile", function(file) {
                        console.log('File ditambahkan:', file);
                    });

                    this.on("success", function(file, response) {
                        console.log('Upload berhasil:', file, response);
                        location.reload();
                    });

                    this.on("removedfile", function(file) {
                        console.log('File dihapus:', file);
                    });

                    this.on("error", function(file, errorMessage) {
                        console.log('Error:', file, errorMessage);
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('a#logoutBtn').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Logout',
                    text: "Apakah Anda yakin ingin logout?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f8b739',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $(this).attr('href');
                    }
                });
            });
        });
    </script>


    @stack('script')



</body>

</html>
