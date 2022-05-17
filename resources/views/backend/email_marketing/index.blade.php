@extends('backend.layout.master')
@section('content')
@php $page='email_marketing'; $title="Email Marketing";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h4><i data-feather="mail"></i> Email Marketing</h4>
            </div>
        </div>
        <form class="ajaxForm form-validate" action="{{route('backend.email_marketing.store')}}" method="post">
            @csrf
        <div class="row">

            <div class="col-12">

                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="from_name">From (Name)</label>
                                <input type="text" class="form-control" id="from_name" name="from_name">
                            </div>
                            <div class="form-group">
                                <label for="from_email">From (Email)</label>
                                <input type="text" class="form-control" id="from_email" name="from_email">
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject">
                            </div>
                            <div class="form-group mb-0">
                                <label>Body</label>
                                <textarea class="form-control summernote" id="body" name="body"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button type="submit" name="status" value="0" class="btn btn-outline-primary mr-2">Draft</button>
                                    <button type="submit" name="status" value="1" class="btn btn-primary">Send <i class="
fas fa-paper-plane"></i></button>
                                    <input type="hidden" name="status">
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h4>Prospects Emails </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-rejhsponsive">
                          @if (count($customers) >0)
                            <table class="table table-striped dt-responsive" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Customer Emails</th>
                                        <th>Status</th>
                                        <th>Country</th>
                                        <th>Ip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php
                                    $x=1;
                                  @endphp
                                  @foreach ($customers as $customer)
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" value="{{$customer->id}}"  name="customers[]" class="custom-control-input" id="checkbox-{{$x}}">
                                                <label for="checkbox-{{$x}}"  class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td>{{$customer->email}}</td>
                                        <td>
                                            @if ($customer->subscribed)
                                            <div class="badge badge-success badge-shadow"> {{'Subscribed'}}</div>
                                            @else
                                            <div class="badge badge-danger badge-shadow"> {{'Unsubscribed'}}</div>
                                            @endif
                                        </td>
                                        <td>
                                            {{$customer->country}}
                                        </td>
                                        <td>
                                            {{$customer->ip_address}}
                                        </td>
                                    </tr>
                                    @php
                                      $x++;
                                    @endphp
                                  @endforeach

                                </tbody>
                            </table>
                          @else
                            <div class="text-center">
                              <img src="{{asset('assets/backend/img/nodata-found.png')}}" alt="" style="height:200px;width:200px">
                            </div>

                          @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Drafts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-resjponsive list">
                        @include('backend.email_marketing.draft_list')
                        </div>
                    </div>
                </div>
            </div>

        </div>
          </form>

    </section>
    @include('backend.layout.settings_sidebar')
</div>
@endsection

@section('bottom')
<script type="text/javascript">
//submit button
$("button[type='submit']").click(function() {

    $("input[name='status']").val($(this).attr('value'))
})

</script>
@include('backend.includes.validation.email_marketing')
@endsection
