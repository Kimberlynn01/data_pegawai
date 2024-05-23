<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.css" rel="stylesheet">

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                @if (Auth::user()->picture)
                    <a href="#" class="img logo rounded-circle mb-5"
                        style="background-image: url({{ 'storage/' . Auth::user()->picture }});"></a>
                @else
                    <a href="#" id="addPictureBtn" class="img logo rounded-circle mb-5"
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
        <!-- Modal for selecting profile picture -->
        <div class="modal fade" id="selectPictureModal" tabindex="-1" aria-labelledby="selectPictureModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selectPictureModalLabel">Select Profile Picture</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="selectPictureForm" class="dropzone">
                            <input type="hidden" id="userIdInput" name="userId" value="{{ Auth::id() }}">
                            <div class="fallback">
                                <input name="file" type="file" accept="image/*" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="savePictureBtn">Save</button>
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
                            <li class="nav-item {{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script>


    <script>
        // Inisialisasi Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#selectPictureForm", {
            url: "/save-profile-picture", // Ganti dengan URL endpoint penyimpanan gambar di backend Anda
            paramName: "file", // Nama parameter untuk gambar yang diupload
            maxFiles: 1, // Batas maksimal jumlah file yang dapat diupload
            acceptedFiles: "image/*", // Jenis file yang diterima (hanya gambar)
            addRemoveLinks: true, // Menambahkan tautan untuk menghapus gambar
            dictRemoveFile: "Remove", // Teks untuk tautan hapus gambar
            init: function() {
                this.on("success", function(file, response) {
                    // Handle success response
                    console.log("Profile picture saved successfully:", response);
                    $('#selectPictureModal').modal('hide');
                });
                this.on("error", function(file, errorMessage) {
                    // Handle error response
                    console.error("Error saving profile picture:", errorMessage);
                });
            }
        });

        // Function to show modal for selecting picture
        document.getElementById('addPictureBtn').addEventListener('click', function() {
            $('#selectPictureModal').modal('show');
        });
    </script>

</body>

</html>
