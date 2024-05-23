@extends('Dashboard.layouts.main')
@include('Dashboard.pegawai.modalTambah')

@section('title', 'Pegawai')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic/build/ckeditor.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
    <script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                        'blockQuote'
                    ],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    },
                })
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('height', '200px', editor.editing.view.document.getRoot());
                    });
                })
                .catch(error => {
                    console.error(error);
                });

        });
    </script>
@endpush
