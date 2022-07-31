@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> Judul</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">Judul</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <section class="content">
      <!-- Main row -->
      <div class="row">
      <div class="col-md-8">
        <div class="card card-navy">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-lock "></i> Rubah Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo url('/'); ?>app/password_save" method="post">
                <div class="alert alert-danger" >
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
                  </button>
                </div>
                          
                                  <div class="alert alert-success">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <i class="fa fa-remove"></i>
                                      </button>
                                  </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password_lama" id="inputPassword3" placeholder="Password Lama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password_lama" id="inputPassword3" placeholder="Password Baru">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <div class="btn-group btn-group-sm">
                  <a class="btn btn-danger" href="<?php echo url('/'); ?>home"><i class="fa fa-arrow-left"> </i> Kembali</a>
                  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>
@endsection