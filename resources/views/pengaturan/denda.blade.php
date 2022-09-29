@extends('layouts.app')
@section('page', 'Tarif Denda')
@section('content-app')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active"> @yield('page')</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <!-- Main row -->
      <div class="row">
			<div class="col-md-12">
                <div class="card">
                  @foreach ($denda as $item)
                    <form role="form" action="{{route('denda.update',$item->id)}}" method="post">
                  @endforeach
					      <div class="alert alert-success" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"></span>
					      </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-append">
                                        <button type="button" class="btn bg-info btn-flat"><i class="fas fa-dollar-sign"> </i> Tarif Denda Telat Per Hari</button>
                                      </span>
                                      <input type="number" class="form-control" name="denda" value="@foreach ($denda as $item) {{$item->tarif_denda}} @endforeach" required>
                                      <span class="input-group-append">
                                        <button type="submit" class="btn bg-navy btn-flat"><i class="fa fa-save"> </i> Simpan Tarif Denda</button>
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>
@endsection