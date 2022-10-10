<div class="modal fade" id="edit-pinjaman">
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
                          @forelse ($pinjam as $item)
                              <option value="{{$item->kode_buku}}">{{$item->kode_buku}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    @php
                        $tanggalnow = date('Y-m-d');
                    @endphp
                    <input type="hidden" id="id_siswa" name="id_siswa" value="{{$data->id_peminjaman}}">
                    <input type="hidden" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo $tanggalnow ?>">
                    <input type="hidden" id="keperluan" name="keperluan" value="Pinjam Buku">
                    <input type="hidden" id="status" name="status" value="1">
                    <div class="form-group">
                      <label>Jumlah Buku</label>
                      <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Durasi (Hari)</label>
                      <input type="number" name="durasi" id="durasi" value="1" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="desc_pinjam" id="desc_pinjam" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kondisi Buku</label>
                      <select name="kondisi" id="kondisi" class="form-control" style="width: 100%;" required>
                      <option value="Baik">Baik</option>
                      <option value="Rusak">Rusak</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Status Buku</label>
                      <select name="status" id="statu" class="form-control" style="width: 100%;" required>
                      <option value="1">Pinjam</option>
                      <option value="0">Dikembalikan</option>
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