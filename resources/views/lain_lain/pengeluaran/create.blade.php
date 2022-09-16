<div class="modal fade" id="modal-tambah-pengeluaran">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pengeluaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('keluar_lain.store')}}" method="POST">
      @csrf
      <div class="modal-body">
          <div class="card-body">
              <div class="form-group">
                <label>Tanggal Pengeluaran</label>
                <input type="date" name="tgl_penerimaan" value="<?= date('Y-m-d') ?>" id="tgl_penerimaan" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Methode Pembayaran</label>
                <select name="methode_bayar" id="methode_bayar" class="form-control" required>
                  <option value=""> -- Pilih Methode Pembayaran --</option>
                  @forelse ($metode_bayar as $item)
                <option value="{{$item->kode_methode}}">{{$item->nama_methode}}</option>
                  @empty 
                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label>Penerimaan Dari</label>
                <input type="text" name="penerimaan_dari" id="penerimaan_dari" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Deskripsi Penerimaan</label>
                <textarea name="desc_penerimaan" id="desc_penerimaan" cols="30" rows="8" class="form-control" required></textarea>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Continue</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>         
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>