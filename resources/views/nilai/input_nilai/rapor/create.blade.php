<div class="modal fade" id="modal-input-rapor">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Input Rapor</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{route('input_nilai.store')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="type_nilai" id="type_nilai" value="rapor">
            <div class="form-group">
              <label>Tanggal Input</label>
              <input type="text" name="tgl_input" id="tgl_input" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <select name="kode_kelas" id="kode_kelas" class="form-control" style="width: 100%;" required>
                  <option value=""> -- Pilih Kelas</option>
                  @forelse ($kelas as $item)
              <option value="{{$item->kode_kelas}}"> ({{$item->kode_kelas}}) {{$item->nama_kelas}} </option>
                  @empty
                      
                  @endforelse
              </select>
            </div>
            <div class="form-group">
              <label>Jurusan</label>
              <select name="jurusan" id="jurusan" class="form-control" style="width: 100%;" required>
                  <option value=""> -- Pilih Jurusan --</option>
                  @forelse ($jurusan as $item)
              <option value="{{$item->kode_jurusan}}"> ({{$item->kode_jurusan}}) {{$item->nama_jurusan}} </option>
                  @empty
                      
                  @endforelse
              </select>
            </div>
            <div class="form-group">
              <label>Tahun Ajaran</label>
              <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" style="width: 100%;" required>
                  <option value=""> -- Pilih Tahun Ajaran --</option>
                  @forelse ($tahun_ajaran as $item)
                  <option value="{{$item->kode_tahun_ajaran}}" @if ($item->status_tahun_ajaran == 'Aktif')
                      {{'selected'}}
                  @endif> ({{$item->status_tahun_ajaran}}) {{$item->tahun_ajaran}}</option>
                  @empty
                      
                  @endforelse
              </select>
            </div>
            <div class="form-group">
              <label>Mata Pelajaran</label>
              <select name="kode_mapel" id="kode_mapel" class="form-control" style="width: 100%;" required>
                <option value=""> -- Pilih Mata Pelajaran --</option>
                  @forelse ($mapel as $item)
              <option value="{{$item->kode_mapel}}">{{$item->nama_mapel}}</option>
                  @empty
                  @endforelse
              </select>
            </div>
            <div class="form-group">
              <label>Kategori Nilai</label>
              <select name="kode_kategori" id="kode_kategori" class="form-control" style="width: 100%;" required>
                <option value=""> -- Pilih Kategori Nilai --</option>
                  @forelse ($kategori as $item)
              <option value="{{$item->id}}">{{$item->kategori_nilai}}</option>
                  @empty
                  @endforelse
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan Input</label>
              <textarea name="desc_input" id="desc_input" cols="30" rows="10" class="form-control"></textarea>
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