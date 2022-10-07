<div class="modal fade" id="modal-bayar-nonbulanan<?= $item->id_nonbulanan ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Biaya Non Bulanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="#" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
              <input type="hidden" name="kode_siswa" id="kode_siswa" value="{{$data->id_siswa}}" required>
              <input type="hidden" name="kode_kelas" id="kode_kelas" value="{{$data->id_kelas}}" required>
              <div class="form-group">
                <label>Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" id="tgl_bayar" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Biaya Siswa</label>
                        <input type="text" name="nama_biaya" id="nama_biaya" value="{{$item->nama_biaya}}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Tagihan Rp.</label>
                        <input type="text" name="tagihan_biaya" id="tagihan_biaya" value="Rp.{{number_format($item->tagihan_pembayaran - $item->nominal_pembayaran)}},-" class="form-control" readonly>
                      </div>
                  </div>
              </div>
                <div class="form-group">
                    <label>Tipe Pembayaran</label>
                    <select name="kode_jenis_pembayaran" id="kode_jenis_pembayaran" class="form-control" style="width: 100%;" required>
                        <option value="">-- Pilih Jenis Pembayaran --</option>
                        @forelse ($jenis_bayar as $item)
                            <option value="{{$item->id}}">{{$item->nama_methode}}</option>
                        @empty
                        @endforelse
                    </select>
                  </div>
                <div class="form-group">
                    <label>Bayar</label>
                    <input type="number" name="nominal_bayar" id="nominal_bayar" class="form-control" required>
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