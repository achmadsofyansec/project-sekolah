<div class="modal fade" id="modal-tambah-nonbulanan">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Biaya Non Bulanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('non_bulanan.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
              <input type="hidden" name="kode_siswa" id="kode_siswa" value="{{$data->id_siswa}}" required>
              <input type="hidden" name="kode_kelas" id="kode_kelas" value="{{$data->id_kelas}}" required>
                <div class="form-group">
                    <label>Biaya Siswa</label>
                    <select name="kode_biaya_siswa" id="kode_biaya_siswa" class="form-control" style="width: 100%;" required>
                        <option value="">-- Pilih Biaya Siswa --</option>
                        @forelse ($nonbulanan as $item)
                    <option value="{{$item->id_biaya}}">{{$item->nama_biaya}} ({{$item->tahun_ajaran}})</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                  <label>Tarif</label>
                  <input type="number" name="tarif_biaya" id="tarif_biaya" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket_biaya" id="ket_biaya" cols="30" rows="5" class="form-control"></textarea>
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