<div class="modal fade" id="modal-tambah-denda">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Denda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('denda.store')}}" method="POST">
      @csrf
      <div class="modal-body">
          <div class="card-body">
              <div class="form-group">
                  <label>Data Siswa</label>
                  <select name="kode_siswa" id="kode_siswa" class="form-control" style="width: 100%;" required>
                      <option value="">--- Pilih Siswa ---</option>
                      @forelse ($siswa as $item)
                  <option value="{{$item->id_siswa}}">{{$item->nama}} - {{$item->kode_kelas}} {{$item->kode_jurusan}}</option>
                      @empty
                      @endforelse
                  </select>
              </div>
              <div class="form-group">
                  <label>Unit</label>
                  <select name="unit" id="unit" class="form-control" style="width: 100%;" required>
                    <option value="">--- Pilih Unit ---</option>
                    @forelse ($kategori as $item)
                <option value="{{$item->unit}}">{{$item->unit}}</option>
                    @empty
                    @endforelse
                </select>
              </div>
              <div class="form-group">
                <label>Deskripsi Pelanggaran</label>
                <textarea name="pelanggaran" id="pelanggaran" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label>Total Denda</label>
              <input type="number" name="total_denda" id="total_denda" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" id="stautus" class="form-control">
              <option value="">--- Status ---</option>
              <option value="Lunas">Lunas</option>
              <option value="Belum Lunas">Belum Lunas</option>
            </select>
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