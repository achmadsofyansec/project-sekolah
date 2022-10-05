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
                <div class="form-group">
                    <label>Biaya Siswa</label>
                    <select name="kode_biaya_siswa" id="kode_biaya_siswa" class="form-control" style="width: 100%;">
                        <option value="">-- Pilih Biaya Siswa --</option>
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