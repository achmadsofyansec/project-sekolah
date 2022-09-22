<div class="modal fade" id="modal-tambah-tabungan">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Tabungan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('tabungan.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label>Data Siswa</label>
                    <select name="kode_siswa" id="kode_siswa" class="form-control" style="width: 100%;" required>
                        <option value="">--- Pilih Siswa ---</option>
                        @forelse ($siswa as $item)
                    <option value="{{$item->id_siswa}}">{{$item->nama}} - {{$item->kode_kelas}} {{$item->kode_jurusan}} - {{$item->tahun_ajaran}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Tabungan</label>
                    <select name="status_tabungan" id="status_tabungan" class="form-control" style="width: 100%;" required>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi Tabungan</label>
                    <textarea name="desc_tabungan" id="desc_tabungan" class="form-control" cols="30" rows="10"></textarea>
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