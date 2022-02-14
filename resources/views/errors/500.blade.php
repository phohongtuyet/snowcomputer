@extends('layouts.admin')
@section('title', '500')
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>500</h1>
            <div class="page-description">
              Whoopps, something went wrong.
            </div>
            <div class="page-search">        
              <div class="mt-3">
                <a href="{{route('admin.home')}}">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection