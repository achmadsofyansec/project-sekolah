<tbody>
                      @forelse ($data as $item) 
                        <tr>
                          <td>{{$loop->index + 1}}</td>
                          <td>{{$item->id_buku}}</td>
                          <td>{{$item->judul_buku}}</td>
                          <td>{{$item->jumlah_pinjam}}</td>
                          <td>{{$item->tanggal_pinjam}}</td>
                          <td>
                          <?php $tujuh_hari = mktime(0,0,0, date('n'), date('j') + $item->durasi, date('Y'));
                          $kembali = date('Y-m-d', $tujuh_hari);
                          echo $kembali;
                           ?></td>
                          <td class="text-center">
                            <form action="{{route('peminjaman_buku.destroy',$item->id)}}" method="POST">
                              @method('DELETE')
                              @csrf
                            <button class="btn btn-danger btn-xs" type="submit" ><i class="fa fa-trash"> </i></button>
                          </form>
                          </td>
                        @empty
                        <tr>
                        <td colspan="7" class="text-center text-mute">Tidak Ada Data</td>
                        </tr>
                        </tr>
                        @endforelse
                  </tbody>