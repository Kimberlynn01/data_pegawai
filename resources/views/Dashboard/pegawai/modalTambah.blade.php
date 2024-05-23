<div class="modal fade" id="tambahdataModal" tabindex="-1" aria-labelledby="tambahdataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="statusId" value="1">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataModalLabel">Tambah Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="nomorhp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2" required>
                                    <option value="NULL">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select name="jabatanId" id="jabatan" class="form-control select2" required>
                                    <option value="NULL">Pilih Jabatan</option>
                                    @foreach ($jabatan as $jabat)
                                        <option value="{{ $jabat->id }}">{{ $jabat->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="text" name="tanggal_lahir" id="datepicker" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Gaji</label>
                                <input type="number" name="gaji" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="foto" class="form-label">Foto Pegawai</label>
                                <input type="file" name="foto" id="foto" class="file-input"
                                    data-show-upload="false" data-show-caption="true" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="10" required></textarea>
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
