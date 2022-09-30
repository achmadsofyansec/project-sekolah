<div class="modal fade" id="modal-export-siswa">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Export Data Siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="#" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kode_export_kelas" id="kode_export_kelas" class="form-control" style="width: 100%;">
                        <option value="">-- Semua Kelas --</option>
                        @forelse ($kelas as $item)
                    <option value="{{$item->kode_kelas}}">{{$item->nama_kelas}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select name="kode_export_jurusan" id="kode_export_jurusan" class="form-control" style="width: 100%;">
                        <option value="">-- Semua Jurusan --</option>
                        @forelse ($jurusan as $item)
                    <option value="{{$item->kode_jurusan}}">{{$item->nama_jurusan}}</option>
                        @empty
                        @endforelse
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
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>