<div class="modal fade" id="modal-tambah-nilai">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Nilai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('nilai.store')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label>Data Siswa</label>
                    <select name="kode_siswa" id="kode_siswa" class="form-control" style="width: 100%;" required>
                        <option value="">--- Pilih Siswa ---</option>
                        @forelse ($siswa as $item)
                    <option value="{{$item->id_siswa}}">{{$item->nama}} - {{$item->kode_kelas}} {{$item->kode_jurusan}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Nomor Ujian</label>
                    <input type="text" name="kode_ujian" id="kode_ujian" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nilai Bahasa Indonesia</label>
                  <input type="number" name="bind" id="bind" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nilai Bahasa Inggris</label>
                  <input type="number" name="bing" id="bing" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nilai Matematika</label>
                  <input type="number" name="mat" id="mat" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nilai Kejurusan</label>
                  <input type="number" name="kejurusan" id="kejurusan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Status Kelulusan</label>
                  <select name="status" id="status" class="form-control">
                    <option value="">--- Pilih Status Kelulusan ---</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Tidak Lulus">Tidak Lulus</option>
                    <option value="Drop Out">Drop Out</option>
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