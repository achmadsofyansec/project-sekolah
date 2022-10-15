<div class="modal fade" id="modal-tambah-peminjaman-detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Peminjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('peminjaman-detail.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-grup">
                    <input type="text" name="kode_peminjaman" id="kode_peminjaman" value="{{ $data->kode_peminjaman }}">
                </div>
                <div class="form-grup">
                  <input type="text" name="kode_siswa" id="kode_siswa" value="{{ $data->kode_siswa }}">
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
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
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