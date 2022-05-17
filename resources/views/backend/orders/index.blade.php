@extends('backend.layout.master')
@section('content')
@php $page='orders'; $title="Order";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="shopping-cart"></i> Orders</h4>
                    <a href="{{route('backend.order.unfulfilled.download')}}" class="btn btn-primary"><i class="
fas fa-download"></i> Export</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab3" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="fulfilled-tab3" data-toggle="tab" href="#fulfilled" role="tab" aria-controls="fulfilled" aria-selected="false">Fulfilled</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="unfulfilled-tab3" data-toggle="tab" href="#unfulfilled" role="tab" aria-controls="unfulfilled" aria-selected="false">Unfulfilled</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="paid-tab3" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="false">Paid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="unpaid-tab3" data-toggle="tab" href="#unpaid" role="tab" aria-controls="unpaid" aria-selected="false">UnPaid</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab3">
                            <div class="tadble-responsive">
                                <table class="table table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th> --}}
                                            <th>Order</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Payment</th>
                                            <th>Fulfilment</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($all_list as $l)
                                        {{-- {{dd($l->order)}} --}}
                                        <tr>
                                            {{-- <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td> --}}
                                            <td><a href="{{route('backend.orders.show',['id'=>$l->id])}}">#{{$l->id}}</a></td>
                                            <td class="align-middle">
                                                {{$l->email}}
                                            </td>
                                            <td>{{$l->created_at->format('d M,Y \a\t h:i a') }}</td>
                                            <td>
                                                {{-- @php
                                             try {
                                $orders=App\Models\Order::where('order_id',$l->id)->count();
                                $paid_orders=App\Models\Order::where(['order_id'=>$l->id,"paid"=>1])->count();
                                $unpaid_orders=App\Models\Order::where(['order_id'=>$l->id,"paid"=>0])->count();

                            } catch (\Exception $e) {
                                $orders=[];
                                $paid_orders=[];
                                $unpaid_orders=[];
                            }

                                if ($paid_orders == $orders) {
                                      $paid_status=["Paid","success"];

                                }elseif($unpaid_orders == $orders){
                                   $paid_status=["Unpaid","danger"];
                                }else{
                                        $paid_status=["Partially Paid","secondary"];
                                }

                                        @endphp --}}

                                                {{-- <div class="badge badge-{{$paid_status[1]}} badge-shadow">{{$paid_status[0]}}
                            </div> --}}
                            @if ($l->paid)
                            <div class="badge badge-secondary badge-shadow">Paid</div>
                            @else
                            <div class="badge badge-danger badge-shadow">Unpaid</div>
                            @endif

                            </td>
                            <td>
                                {{-- @php
                                             try {
                                $orders=App\Models\Order::where('order_id',$l->id)->count();
                                $fulfilled_orders=App\Models\Order::where(['order_id'=>$l->id,"fulfilled"=>1])->count();
                                $unfulfilled_orders=App\Models\Order::where(['order_id'=>$l->id,"fulfilled"=>0])->count();

                            } catch (\Exception $e) {
                                $orders=[];
                                $fulfilled_orders=[];
                                $unfulfilled_orders=[];
                            }

                                if ($fulfilled_orders == $orders) {
                                      $fulfilled_status=["Fulfilled","success"];

                                }elseif($unfulfilled_orders == $orders){
                                   $fulfilled_status=["Unfulfilled","danger"];
                                }else{
                                        $fulfilled_status=["Partially Fulfilled","secondary"];
                                }

                                        @endphp --}}

                                {{-- <div class="badge badge-{{$fulfilled_status[1]}} badge-shadow">{{$fulfilled_status[0]}}
                        </div> --}}
                        @if ($l->fulfilled)
                        <div class="badge badge-success badge-shadow">Fufilled</div>
                        @else
                        <div class="badge badge-danger badge-shadow">Unfufilled</div>
                        @endif
                        </td>
                        <td>${{$l->total_price}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="fulfilled" role="tabpanel" aria-labelledby="fulfilled-tab3">
                  <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                {{-- <th class="text-center">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th> --}}
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Payment</th>
                                <th>Fulfilment</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fulfilled_list as $l)
                            <tr>
                                {{-- <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </td> --}}
                                <td><a href="{{route('backend.orders.show',['id'=>$l->id])}}">#{{$l->id}}</a></td>
                                <td class="align-middle">
                                    {{$l->email}}
                                </td>
                                <td>{{$l->created_at->format('d M,Y \a\t h:i a') }}</td>
                                <td>
                                @if ($l->paid)
                                    <div class="badge badge-secondary badge-shadow">Paid</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unpaid</div>
                                    @endif

                                </td>
                                <td>
                                    @if ($l->fulfilled)
                                    <div class="badge badge-success badge-shadow">Fufilled</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unfufilled</div>
                                    @endif
                                </td>
                                <td>${{$l->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="tab-pane fade" id="unfulfilled" role="tabpanel" aria-labelledby="unfulfilled-tab3">
                  <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                {{-- <th class="text-center">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th> --}}
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Payment</th>
                                <th>Fulfilment</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unfulfilled_list as $l)
                            <tr>
                                {{-- <td class="p-0 text-center"> --}}
                                    {{-- <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                    </div> --}}
                                {{-- </td> --}}
                                <td><a href="{{route('backend.orders.show',['id'=>$l->id])}}">#{{$l->id}}</a></td>
                                <td class="align-middle">
                                    {{$l->email}}
                                </td>
                                <td>{{$l->created_at->format('d M,Y \a\t h:i a') }}</td>
                                <td>
                                @if ($l->paid)
                                    <div class="badge badge-secondary badge-shadow">Paid</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unpaid</div>
                                    @endif

                                </td>
                                <td>
                                    @if ($l->fulfilled)
                                    <div class="badge badge-success badge-shadow">Fufilled</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unfufilled</div>
                                    @endif
                                </td>
                                <td>${{$l->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab3">
                  <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                {{-- <th class="text-center">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th> --}}
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Payment</th>
                                <th>Fulfilment</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paid_list as $l)
                            <tr>
                                {{-- <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </td> --}}
                                <td><a href="{{route('backend.orders.show',['id'=>$l->id])}}">#{{$l->id}}</a></td>
                                <td class="align-middle">
                                    {{$l->email}}
                                </td>
                                <td>{{$l->created_at->format('d M,Y \a\t h:i a') }}</td>
                                <td>
                                @if ($l->paid)
                                    <div class="badge badge-secondary badge-shadow">Paid</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unpaid</div>
                                    @endif

                                </td>
                                <td>
                                    @if ($l->fulfilled)
                                    <div class="badge badge-success badge-shadow">Fufilled</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unfufilled</div>
                                    @endif
                                </td>
                                <td>${{$l->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="tab-pane fade" id="unpaid" role="tabpanel" aria-labelledby="unpaid-tab3">
                  <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                {{-- <th class="text-center">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th> --}}
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Payment</th>
                                <th>Fulfilment</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unpaid_list as $l)
                            <tr>
                                {{-- <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </td> --}}
                                <td><a href="{{route('backend.orders.show',['id'=>$l->id])}}">#{{$l->id}}</a></td>
                                <td class="align-middle">
                                    {{$l->email}}
                                </td>
                                <td>{{$l->created_at->format('d M,Y \a\t h:i a') }}</td>
                                <td>
                                @if ($l->paid)
                                    <div class="badge badge-secondary badge-shadow">Paid</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unpaid</div>
                                    @endif

                                </td>
                                <td>
                                    @if ($l->fulfilled)
                                    <div class="badge badge-success badge-shadow">Fufilled</div>
                                    @else
                                    <div class="badge badge-danger badge-shadow">Unfufilled</div>
                                    @endif
                                </td>
                                <td>${{$l->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

</div>
</div>
<script type="text/javascript">
  $(function(){
    $(".table").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [2, 3] }
      ]
    });
  })
</script>
</section>
@include('backend.layout.settings_sidebar',['page'=>'orders'])
    </div>

    @endsection
