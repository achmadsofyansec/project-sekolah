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
                <div class="col-md-12 mt-1">
                    <div class="card card-outline card-success">
                       <div class="card-header">
                            <input type="button" value="+ Tambah" class="btn btn-success"/>
                       </div>
                       <div class="card-body">
                           <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                      @forelse ($data as $item)
                                          <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>*******</td>
                                            <td>{{$item->role}}</td>
                                          </tr>
                                      @empty

                                          <tr>
                                            <td colspan="5">Tidak Ada Data</td>
                                          </tr>

                                      @endforelse
                                    </tbody>
                                </table>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection