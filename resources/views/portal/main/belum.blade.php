@extends('layouts.auth_layout')
@section('page', 'Portal Kelulusan')
@section('class-body', 'login-page')
@section('content-auth')
<style>
  .limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  background: #f2f2f2;
}

.wrap-login100 {
  width: 100%;
  background: #fff;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  flex-direction: row-reverse;

}

.login100-form {
  width: 560px;
  min-height: 100vh;
  display: block;
  background-color: #f7f7f7;
  padding: 173px 55px 55px 55px;
}

.login100-form-title {
  width: 100%;
  display: block;
  font-family: Poppins-Regular;
  font-size: 30px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
}

.p-b-43 {padding-bottom: 43px;}

.wrap-input100 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  width: 100%;
  height: 80px;
  position: relative;
  border: 1px solid #e6e6e6;
  border-radius: 10px;
  margin-bottom: 10px;
}

.validate-input {
  position: relative;
}

.input100 {
  display: block;
  width: 100%;
  background: transparent;
  font-family: Montserrat-Regular;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
  padding: 0 26px;
}

.focus-input100 {
  position: absolute;
  display: block;
  width: calc(100% + 2px);
  height: calc(100% + 2px);
  top: -1px;
  left: -1px;
  pointer-events: none;
  border: 1px solid #6675df;
  border-radius: 10px;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  -webkit-transform: scaleX(1.1) scaleY(1.3);
  -moz-transform: scaleX(1.1) scaleY(1.3);
  -ms-transform: scaleX(1.1) scaleY(1.3);
  -o-transform: scaleX(1.1) scaleY(1.3);
  transform: scaleX(1.1) scaleY(1.3);
}

.label-input100 {
  font-family: Montserrat-Regular;
  font-size: 18px;
  color: #999999;
  line-height: 1.2;

  display: block;
  position: absolute;
  pointer-events: none;
  width: 100%;
  padding-left: 24px;
  left: 0;
  top: 30px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  background: #6675df;

  font-family: Montserrat-Bold;
  font-size: 12px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 1px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover {
  background: #333333;
}

.login100-more {
  width: calc(100% - 560px);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
}

.login100-more::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0,0,0,0.1);
}
</style>
<div class="limiter">
  <div class="container-login100">
      <div class="wrap-login100">
      <form class="login100-form validate-form">
      <span class="login100-form-title">
        PORTAL KELULUSAN
      </span>
      <span class="login100-form-title p-b-43">
        @foreach ($sekolah as $item)
        {{ $item->nama_sekolah }}  
        @endforeach
        TAHUN AJARAN  
        @foreach ($tahun_ajaran as $item)
        {{ $item->tahun_ajaran }}
        @endforeach
        BELUM BISA DIAKSES
        PORTAL BISA DIAKSES PADA 
        @foreach ($waktu as $item)
        {{ $item->batas_akhir }}
        @endforeach
      </span>

      <div class="login100-more" style="background-image: url('images/bg-01.jpeg');">
        <div class="row">
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection