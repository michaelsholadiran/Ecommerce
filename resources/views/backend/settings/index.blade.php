@extends('backend.layout.master')
@section('content')
@php $page='general_setting'; $title="Setting";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="settings" style="vertical-align:top;"></i> Settings</h4>

                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <button type="button" class="btn btn-secondary btn-icon icon-left bg-blue-grey">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                                <div>
                                    <h5><a href="{{route('backend.settings.site')}}">Site Setting</a></h5>
                                    <p>View and update store</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <button type="button" class="btn btn-secondary btn-icon icon-left bg-primary">
                                        <i class="far fa-credit-card"></i>
                                    </button>
                                </div>
                                <div>
                                    <h5><a href="{{route('backend.settings.payment')}}">Payment</a></h5>
                                    <p>View and update payment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <button type="button" class="btn btn-secondary btn-icon icon-left bg-cyan">
                                        <i class="fas fa-tv"></i>
                                    </button>
                                </div>
                                <div>
                                    <h5><a href="{{route('backend.settings.smtp')}}">SMTP Setting</a></h5>
                                    <p>View and update SMTP</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @include('backend.layout.settings_sidebar')
</div>

@endsection
