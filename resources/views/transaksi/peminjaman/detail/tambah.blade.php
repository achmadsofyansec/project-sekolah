<div class="modal fade" id="tambah-pinjaman">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pinjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('data_peminjaman.store')}}" method="POST">
        @csrf
        <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                    <label>Pilih Buku</label>
                        <select name="kode_buku" id="kode_buku" class="form-control" style="width: 100%;" required>
                          <option value="#">--Pilih Buku--</option>
                          @forelse ($buku as $item)
                              <option value="{{$item->kode_buku}}">{{$item->judul_buku}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    @php
                        $tanggalnow = date('Y-m-d');
                    @endphp
                    <input type="hidden" id="id_siswa" name="id_siswa" value="{{$data->id_siswa}}">
                    <input type="hidden" id="keperluan" name="keperluan" value="Pinjam Buku">
                    <input type="hidden" id="status" name="status" value="Dipinjam">
                    <div class="form-group">
                      <label>Jumlah Buku</label>
                      <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Pinjam</label>
                      <input class="form-control" type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo $tanggalnow ?>" required>
                    </div><div class="form-group">
                      <label>Tanggal Kembali</label>
                      <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="desc_pinjam" id="desc_pinjam" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                      <input type="hidden" name="kondisi" id="kondisi" value="1" required>
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