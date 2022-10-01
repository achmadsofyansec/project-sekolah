<div class="modal fade" id="modal-input-prestasi">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Input Prestasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('input_prestasi.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label>Siswa</label>
                  <select name="kode_siswa" id="kode_siswa" class="form-control" style="width:100%;" required>
                    <option value=""> -- Pilih Siswa -- </option>
                    @forelse ($siswa as $item)
                    <option value="{{$item->id_siswa}}">{{$item->nama }} { {{$item->kode_kelas}} {{$item->kode_jurusan}} Tahun Ajaran {{$item->tahun_ajaran}} }</option>
                    @empty
                    @endforelse
                </select>
                </div>
                <div class="form-group">
                  <label>Nama Lomba</label>
                  <input type="text" name="nama_lomba" id="nama_lomba" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Nama Penyelenggara</label>
                  <input type="text" name="nama_penyelenggara" id="nama_penyelenggara" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="Text" name="tahun_lomba" id="tahun_lomba" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Tingkat</label>
                  <input type="text" name="tingkat_lomba" id="tingkat_lomba" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Peringkat Yang Diraih</label>
                    <input type="number" name="peringkat" id="peringkat" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                    <textarea name="ket_lomba" id="ket_lomba" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>         
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>