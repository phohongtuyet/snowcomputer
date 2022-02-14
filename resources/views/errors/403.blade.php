@extends('layouts.admin')
@section('title', '403')
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>403</h1>
            <div class="page-description">
            @if (session('error_message'))  
              <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  {{ session('error_message') }}
                </div>
              </div>
            @endif
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="{{route('admin.home')}}">Trở lại trang chủ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection