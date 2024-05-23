<div class="modal fade" id="editPegawai{{ $pegawai->id }}" tabindex="-1" aria-labelledby="tambahdataModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header" style="background-color: #f8b739">
                    <h5 class="modal-title text-white" id="tambahdataModalLabel">Edit Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control"
                                    value="{{ $pegawai->nama }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="nomorhp" class="form-control"
                                    value="{{ $pegawai->nomorhp }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <br>
                                <select name="jenis_kelamin" id="jenis_kelamin{{ $pegawai->id }}"
                                    class="form-control select2 select2{{ $pegawai->id }}" required>
                                    <option value="NULL">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <br>
                                <select name="jabatanId" id="jabatan{{ $pegawai->id }}"
                                    class="form-control select2 select2{{ $pegawai->id }}" required>
                                    <option value="NULL">Pilih Jabatan</option>
                                    @foreach ($jabatan as $jabat)
                                        <option value="{{ $jabat->id }}"
                                            {{ $pegawai->jabatanId == $jabat->id ? 'selected' : '' }}>
                                            {{ $jabat->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="text" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}"
                                    id="datepicker{{ $pegawai->id }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Gaji</label>
                                <input type="number" name="gaji" value="{{ $pegawai->gaji }}" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            @if ($pegawai->foto)
                                <img src="{{ asset('storage/foto/' . $pegawai->foto) }}" alt="Foto Pegawai"
                                    width="200" class="p-3 border-dotted border-rounded">
                            @endif
                            <div class="form-group">
                                <label for="foto" class="form-label">Foto Pegawai</label>
                                <input type="file" name="foto" id="foto{{ $pegawai->id }}" class="file-input"
                                    data-show-upload="false" data-show-caption="true" accept="image/*">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="10" required>{{ $pegawai->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <br>
                                <select name="statusId" id=""
                                    class="form-control select2 select2{{ $pegawai->id }}" required>
                                    <option value="NULL">Status</option>
                                    <option value="1" {{ $pegawai->statusId == '1' ? 'selected' : '' }}>
                                        Aktif
                                    </option>
                                    <option value="2" {{ $pegawai->statusId == '2' ? 'selected' : '' }}>
                                        Tidak Aktif
                                    </option>
                                    <option value="3" {{ $pegawai->statusId == '3' ? 'selected' : '' }}>
                                        Pensiun
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        $("#foto{{ $pegawai->id }}").fileinput({
            showUpload: false,
            showCaption: true,
            browseClass: "btn btn-primary",
            fileType: "any"
        });

        @if ($pegawai->foto)
            $("#foto{{ $pegawai->id }}").closest('.form-group').find('img').show();
        @endif

        $('#jenis_kelamin{{ $pegawai->id }}').select2({
            width: '100%',
        });

        $('#jabatan{{ $pegawai->id }}').select2({
            width: '100%',
        });

        $('#datepicker{{ $pegawai->id }}').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
        });
    });
</script>
