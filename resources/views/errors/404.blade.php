@extends('errors.layout.master')
@section('content')
@php
  $title="404";
@endphp

      <section class="section">
        <div class="container mt-5">
          <div class="page-error">
            <div class="page-inner">
              <h1>404</h1>
              <div class="page-description">
                The page you were looking for could not be found.
              </div>
              <div class="page-search">
                {{-- <form>
                  <div class="form-group floacontentaddon-not-append">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-search"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-lg">
                          Search
                        </button>
                      </div>
                    </div>
                  </div>
                </form> --}}
                <div class="mt-3">
                  <a href="javascript:history.back()">Take Me Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
