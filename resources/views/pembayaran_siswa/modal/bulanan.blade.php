<div class="modal fade" id="modal-tambah-bulanan">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Biaya Bulanan</h4>
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
                    <label>Biaya Siswa</label>
                    <select name="kode_biaya_siswa" id="kode_biaya_siswa_bulanan" class="form-control" style="width: 100%;" required>
                      <option value="">-- Pilih Biaya Siswa --</option>
                      @forelse ($bulanan as $item)
                  <option value="{{$item->id_biaya}}">{{$item->nama_biaya}} ({{$item->tahun_ajaran}})</option>
                      @empty
                      @endforelse
                  </select>
                </div>
                <div class="form-group">
                  <label>Terapkan Ke Semua Bulan</label>
                <div class="row">
                  <div class="col-md-10">
                      <input type="number" name="tarif_semua_bulan" id="tarif_semua_bulan" class="form-control" value="0">
                  </div>
                  <div class="col-md-2">
                      <input type="button" class="btn btn-success" name="terapkan_tarif_semua_bulan" id="terapkan_tarif_semua_bulan" value="Terapkan">
                  </div>
                </div>
              </div>
                
                <div class="form-group">
                  <label>Terapkan Ke Setiap Bulan</label>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Juli</label>
                        <input type="number" name="tarif_bulan_juli" id="tarif_bulan_juli" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Agustus</label>
                        <input type="number" name="tarif_bulan_agustus" id="tarif_bulan_agustus" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>September</label>
                        <input type="number" name="tarif_bulan_september" id="tarif_bulan_september" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Oktober</label>
                        <input type="number" name="tarif_bulan_oktober" id="tarif_bulan_oktober" value="0" class="form-control">
                      </div>
                      
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>November</label>
                        <input type="number" name="tarif_bulan_november" id="tarif_bulan_november" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Desember</label>
                        <input type="number" name="tarif_bulan_desember" id="tarif_bulan_desember" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Januari</label>
                        <input type="number" name="tarif_bulan_januari" id="tarif_bulan_januari" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Februari</label>
                        <input type="number" name="tarif_bulan_februari" id="tarif_bulan_februari" value="0" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Maret</label>
                        <input type="number" name="tarif_bulan_maret" id="tarif_bulan_maret" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>April</label>
                        <input type="number" name="tarif_bulan_april" id="tarif_bulan_april" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Mei</label>
                        <input type="number" name="tarif_bulan_mei" id="tarif_bulan_mei" value="0" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Juni</label>
                        <input type="number" name="tarif_bulan_juni" id="tarif_bulan_juni" value="0" class="form-control">
                      </div>
                    </div>
                  </div>
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