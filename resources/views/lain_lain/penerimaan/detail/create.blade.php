<div class="modal fade" id="modal-tambah-penerimaan-detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Penerimaan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('detail_terima_lain.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <input type="hidden" name="kode_penerimaan" id="kode_penerimaan" value="{{$data->id_terima}}" readonly>
                <div class="form-group">
                  <label>Pos Terima</label>
                  <select name="pos_terima" id="pos_terima" class="form-control" style="width: 100%;" required>
                        <option value=""> -- Pilih Pos Penerimaan -- </option>
                        @forelse ($pos_terima as $item)
                            <option value="{{$item->kode_pos}}">{{$item->nama_pos}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Penerimaan</label>
                    <input type="number" class="form-control" id="detail_jumlah" name="detail_jumlah" required>
                  </div>
                <div class="form-group">
                  <label>Deskripsi Penerimaan</label>
                  <textarea name="desc_penerimaan" id="desc_penerimaan" cols="30" rows="8" class="form-control" required></textarea>
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