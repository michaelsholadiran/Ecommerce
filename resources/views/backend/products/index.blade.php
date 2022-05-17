@extends('backend.layout.master')
@section('content')
@php $page='products'; $title="Product";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="tag"></i> Products</h4>
                    <a href="{{route('backend.products.create')}}" class="btn btn-primary">Add Product</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responssive list">
                        @include('backend.products.list')
                    </div>
                </div>
            </div>

        </div>

    </section>
    @include('backend.layout.settings_sidebar')
</div>

@endsection
