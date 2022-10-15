<div class="modal fade" id="modal-bulanan-<?= $item->id_bulanan ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Biaya Bulanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form action="{{route('bulanan.update',$item->id_bulanan)}}" method="POST">
                @csrf
                @method('PUT')
              <div class="card-body">
                <input type="hidden" name="kode_biaya" id="kode_biaya" value="{{$data_bulanan->id_biayas}}">
                <input type="hidden" name="kode_siswa" id="kode_siswa" value="{{$data->id_siswa}}">
                <div class="form-group">
                  <label>Tanggal Bayar</label>
                  <input type="date" name="tgl_input_detail" id="tgl_input_detail" value="<?= date('Y-m-d') ?>" class="form-control" required>
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
                  <label>Bulan</label>
                  <input type="text" name="bulan_pembayaran" id="bulan_pembayaran" value="{{$item->bulan_pembayaran}}" class="form-control" readonly>
                </div>
                  <div class="form-group">
                      <label>Tipe Pembayaran</label>
                      <select name="jenis_pembayaran_detail" id="jenis_pembayaran_detail" class="form-control" style="width: 100%;" required>
                          <option value="">-- Pilih Jenis Pembayaran --</option>
                          @forelse ($jenis_bayar as $item)
                              <option value="{{$item->id}}">{{$item->nama_methode}}</option>
                          @empty
                          @endforelse
                      </select>
                    </div>
                  <div class="form-group">
                      <label>Bayar</label>
                      <input type="number" name="nominal_detail" id="nominal_detail" class="form-control" required>
                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
            
        </div>         
       
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>