@extends('layouts.app')
@section('page', 'Users')
@section('content-app')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= url('/')?>">Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row-mb-2">
                <div class="row">
                    <div class="col-md-8 mt-1">
                        <div class="card card-success card-outline">
                          <div class="card-header">
                            <h1 class="card-title"><i class="nav-icon fas fa-plus text-success"></i> Tambah Data User</h1>
                          </div>
                        <form action="{{route('user.update',$data->id)}}" method="POST">
                          @csrf
                          @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control" placeholder="Masukkan Nama"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" value="{{$data->email}}" class="form-control" placeholder="Masukkan Email"/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password"/>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="id_role" id="id_role" class="form-control">
                                        <option value="">Pilih Jabatan</option>
                                        @forelse ($jabatan as $item)
                                            <option value="{{$item->id_roles}}" @if ($item->id_roles == $data->id_role)
                                                {{ 'selected' }}
                                            @endif>{{$item->roles_name}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('user.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                        </div>
                      </div>
                      <div class="col-md-4 mt-1">
                        <div class="card card-success card-outline">
                          <div class="card-header">
                            <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
                          </div>
                          <div class="card-body">
                            <p>1. Ubah <b>Identitas User</b> Dengan Baik dan Benar.</p>
                            <p>2. Simpan Data User Dengan Cara Menekan <b>Tombol Simpan</b>  Yang berada di bawah Form</p>
                          </div>
                          <div class="card-footer">
                            Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                          </div>
                        </div>
                      </div>
                </div>
                
                  
            </div>
        </div>
    </div>
</div>
@endsection