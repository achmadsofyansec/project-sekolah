<div class="modal fade" id="modal-tambah-peminjaman">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Peminjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('peminjaman_buku.store')}}" method="POST">
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
                    <label>Status Pinjaman</label>
                    <select name="status_pinjam" id="status_pinjam" class="form-control" style="width: 100%;" required>
                        <option value="0">Dikembalikan</option>
                        <option value="1">Dipinjam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi Peminjaman</label>
                    <textarea name="desc_pinjam" id="desc_pinjam" class="form-control" cols="30" rows="10"></textarea>
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