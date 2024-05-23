@extends('Dashboard.layouts.main')
@include('Dashboard.pegawai.modalTambah')

@section('title', 'Pegawai')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .modal-content .select2-container--default .select2-selection--single {
            height: auto;
            line-height: 1.5;
            padding: 4px 0px;
            border: #ced4da 1px solid;
        }

        .modal-content .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
        }

        @media (max-width: 1368px) {
            .btn-show-modal {
                display: none !important;
            }
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdataModal">Tambah Data
            Pegawai</button>
    </div>


    <div class="table-responsive">
        <table id="pegawaiTable" class="table table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->nomorhp }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->jenis_kelamin }}</td>
                        <td>{{ $pegawai->tanggal_lahir }}</td>
                        <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                        <td>{{ $pegawai->gaji }}</td>
                        <td>{{ $pegawai->status->nama_status }}</td>
                        <td>
                            <button class="btn btn-info btn-show-modal d-none d-sm-inline-block" data-toggle="modal"
                                data-target="#detailPegawai{{ $pegawai->id }}">
                                <i class="fas fa-exclamation"></i>
                            </button>


                            <!-- Modal Detail Pegawai -->
                            <div class="modal fade" id="detailPegawai{{ $pegawai->id }}" tabindex="999" backdrop="false"
                                role="dialog">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-light" style="background-color: #f8b739">
                                            <h5 class="modal-title text-white" id="detailPegawaiModalLabel">Detail Pegawai
                                            </h5>
                                            <button type="button" class="close text-light" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="{{ 'storage/foto/' . $pegawai->foto }}" alt="Foto Pegawai"
                                                        style="max-width: 100%; max-height: 350px"
                                                        class="img-fluid rounded">
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>Nama:</strong> {{ $pegawai->nama }}</p>
                                                    <p><strong>Nomor HP:</strong> {{ $pegawai->nomorhp }}</p>
                                                    <p><strong>Alamat:</strong> {{ $pegawai->alamat }}</p>
                                                    <p><strong>Jenis Kelamin:</strong> {{ $pegawai->jenis_kelamin }}</p>
                                                    <p><strong>Tanggal Lahir:</strong> {{ $pegawai->tanggal_lahir }}</p>
                                                    <p><strong>Jabatan:</strong> {{ $pegawai->jabatan->nama_jabatan }}</p>
                                                    <p><strong>Gaji:</strong> {{ $pegawai->gaji }}</p>
                                                    <p><strong>Status:</strong> {{ $pegawai->status->nama_status }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <!-- Tambahkan tombol Edit atau operasi lain sesuai kebutuhan -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-danger btn-delete" data-id="{{ $pegawai->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#pegawaiTable').DataTable({
                responsive: true
            });

            $("#foto").fileinput({
                showUpload: false,
                showCaption: true,
                browseClass: "btn btn-primary",
                fileType: "any"
            });

            $('.select2').select2({
                width: '100%',
            });

            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.btn-delete', function() {
                var pegawaiId = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data Pegawai akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('pegawai.delete') }}",
                            type: "DELETE",
                            data: {
                                id: pegawaiId
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Data Pegawai telah dihapus.',
                                    'success'
                                ).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
