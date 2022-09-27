<div class="modal fade" id="modal-tambah-pengeluaran-detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Penerimaan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('detail_keluar_lain.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
            <input type="hidden" name="kode_pengeluaran" id="kode_pengeluaran" class="form-control" value="{{$data->id_keluar}}">
                <div class="form-group">
                  <label>Pos Sumber Dana</label>
                  <select name="pos_sumber" id="pos_sumber" class="form-control" style="width: 100%;" required>
                        <option value=""> -- Pilih Pos Sumber -- </option>
                        @forelse ($pos_sumber as $item)
                            <option value="{{$item->kode_pos}}">{{$item->nama_pos}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Pos Pengeluaran</label>
                    <select name="pos_keluar" id="pos_keluar" class="form-control" style="width: 100%;" required>
                          <option value=""> -- Pilih Pos Pengeluaran -- </option>
                          @forelse ($pos_keluar as $item)
                              <option value="{{$item->kode_pos}}">{{$item->nama_pos}}</option>
                          @empty
                          @endforelse
                      </select>
                  </div>
                <div class="form-group">
                    <label>Jumlah Pengeluaran</label>
                    <input type="number" class="form-control" id="detail_jumlah" name="detail_jumlah" required>
                  </div>
                <div class="form-group">
                  <label>Deskripsi Pengeluaran</label>
                  <textarea name="detail_keterangan" id="detail_keterangan" cols="30" rows="8" class="form-control" required></textarea>
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