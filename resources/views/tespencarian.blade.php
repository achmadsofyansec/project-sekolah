@extends('layouts.auth_layout')
@section('page', 'Sign In')
@section('class-body', 'login-page')
@section('content-auth')
<div class="col-lg-4 offset-lg-1">
      <div class="register_form kontennya">
        <h3>Cek Disini</h3>
        <hr>
        <!--<p>It is high time for learning</p>-->
        <form class="form_area" id=""  action="{{ route('cari') }}" method="post">
        {!!csrf_field() !!}
          <div class="row">
            <div class="col-lg-12 form_group">
              <input name="no_peserta" placeholder="No. Peserta" required="" type="text"/>
            </div>
            <div class="col-lg-12 text-center">
              <button type="submit" class="primary-btn">Pencarian</button>
            </div>
          </div>
        </form>
      </div>
@endsection