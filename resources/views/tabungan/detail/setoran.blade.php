<div class="modal fade" id="modal-tambah-setoran">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Setoran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('tabungan_detail.store')}}" method="POST">
        @csrf
        <div class="modal-body">
                <div class="card-body">
                  <input type="hidden" name="kode_tabungan" id="kode_tabungan" value="{{$data->id_tabungan}}" class="form-control">
                  <input type="hidden" name="type" id="type" value="0" class="form-control">
                    <div class="form-group">
                      <label>Saldo</label>
                    <input type="text" name="saldo_awal_setor" id="saldo_awal_setor" class="form-control" value="{{$data->saldo_tabungan}}" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nominal</label>
                      <input type="number" name="nominal_setor" id="nominal_setor" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="keterangan_setor" id="keterangan_setor" cols="30" rows="10" class="form-control" required></textarea>
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