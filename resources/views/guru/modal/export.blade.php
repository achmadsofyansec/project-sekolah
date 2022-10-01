<div class="modal fade" id="modal-export-guru">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Export Data Guru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="#" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="kode_export_jabatan" id="kode_export_jabatan" class="form-control" style="width: 100%;">
                        <option value="">-- Semua Jabatan --</option>
                        <option value="Guru Mapel">Guru Mapel</option>
                        <option value="Guru Bk">Guru Bk</option>
                  
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Export</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>         
        </form>
      </div>
    </div>
  </div>