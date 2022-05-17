@extends('backend.layout.master')
@section('content')
@php $page='orders'; $title="Orders";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section col-12">
        <div>
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                  <div class="">
                    <h4 class="d-inline">#{{$id}}</h4> <span>{{$order->created_at->format('d M,Y \a\t h:i a') }}</span>
                  </div>
                  <a href="#" class="btn btn-primary mr-2" id="add_order_id">Add Order Id</a>
                    {{-- <p>July 28,2020 at 9:28</p> --}}
                </div>
            </div>
        </div>

        <div class="row ">
            <div class=" col-md-8">


                <div class="card">
                    <div class="card-header card-body card-type-3">
                      @if (!$order->fulfilled)
                        <div class="card-circle l-bg-orange text-white mr-2">
                            <i class="
fas fa-bullseye"></i>
                        </div>
                        @else
                          <div class="card-circle l-bg-cyan text-white mr-2">
                              <i class="
  fas fa-bullseye"></i>
                          </div>
                      @endif


                        @if (!$order->fulfilled)
                            <h4>Unfulfilled ({{$order->orders->count()}})</h4>
                          @else
                              <h4>fulfilled</h4>
                        @endif

                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                            @php
                            try {
                            $orderz=App\Models\Order::where('order_id',$id)->get();
                            // dd($order);
                            } catch (\Exception $e) {

                            }

                            @endphp


                            @foreach ($orderz as $ord)
                            <li class="media border-bottom pb-2 align-items-center">
                                <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-md-0">
                                    <div class="avatar-item">
                                        <img alt="image" src="{{$ord->image}}" class="img-fluid rounded-0" data-toggle="tooltip" title="{{$ord->product->title}}" data-original-title="{{$ord->product->title}}">
                                        <div class="avatar-badge" title="" data-toggle="tooltip" data-original-title="{{$ord->product->title}}"> {{$ord->quantity}}
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="media-title">{{$ord->product->title}}</div>
                                    {{-- <div class="text-job text-muted">Web Developer</div> --}}
                                </div>
                                <div class="media-items">
                                    <div class=" mr-5">
                                        <div>${{$ord->product->price}} &nbsp; x &nbsp; {{$ord->quantity}}</div>

                                    </div>
                                    <div class="media-item">

                                    </div>

                                    <div>
                                        <div class="media-value1">${{$ord->price}}</div>

                                    </div>
                                </div>
                            </li>

                            @endforeach
                            <form class="" action="{{route('backend.orders.toggle_fulfilled',['order_id'=>$order->id])}}" method="post">
                              @csrf
                              <input type="hidden" name="status" value="1">
                                  <button type="submit" class="btn btn-outline-primary float-right">Mark as fulfilled</button>
                            </form>

                        </ul>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header card-body card-type-3">
                      @if (!$order->paid)
                        <div class="card-circle l-bg-orange text-white mr-2">
                            <i class="
                            fas fa-check-double"></i>
                        </div>
                        @else
                          <div class="card-circle l-bg-cyan text-white mr-2">
                              <i class="
                              fas fa-check-double"></i>
                          </div>
                      @endif
                      @if (!$order->paid)
                      <h4>UnPaid</h4>
                        @else
                        <h4>Paid</h4>
                      @endif

                    </div>
                    <div class="card-body">
                        <div class="row border-bottom">
                            <div class="col-6">
                                @php
                                try {
                                $count=App\Models\Order::where(['order_id'=>$id])->count();

                                } catch (\Exception $e) {

                                }

                                @endphp
                                <p class="font-weight-bold d-inline">Subtotal </p><span>{{$count}} items</span>
                                <p class="font-weight-bold">Tax</p>
                                <p class="font-weight-bold">Total</p>
                            </div>
                            <div class="col-6 text-right">
                                <p>${{$order->total_price}}</p>
                                <p>$0.00</p>
                                <p>${{$order->total_price}}</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">

                                <p class="font-weight-bold">Paid by custmer</p>
                            </div>

                            <div class="col-6 text-right">
                                <p>${{$order->total_price}}</p>

                            </div>
                        </div>
                        <form class="" action="{{route('backend.orders.toggle_paid',['order_id'=>$order->id])}}" method="post">
                          @csrf
                          <input type="hidden" name="status" value="1">
                              <button type="submit" class="btn btn-outline-primary float-right">Mark as paid</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">


              <div class="card">

                  <div class="card-body">
                        <h4 id="order_id_container">#{{$order->order_id}}</h4>
                  </div>
              </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Notes</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$order->note}}</p>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4>Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$order->first." ".$order->last}}</p>
                        <a href="#">{{$order->email}}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Address</h4>
                    </div>
                    <div class="card-body">
                      <p><b>Address : </b>{{$order->address}}</p>
                      <p><b>Country : </b>{{$order->country}}</p>
                      <p><b>State : </b>{{$order->state}}</p>
                      <p><b>City : </b>{{$order->city}}</p>
                    </div>
                </div>

            </div>

        </div>

    </section>
    @include('backend.layout.settings_sidebar',['page'=>'orders'])
</div>
<script type="text/javascript">
  $(function(){
    $("#add_order_id").click(function (e) {
      e.preventDefault();


        swal({
          title: 'Enter Order Id',
          content: {
            element: 'input',
            attributes: {
              placeholder: 'Enter Order Id',
              type: 'text',
            },
          },

        }).then((data) => {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });


          $.ajax({
              type: "PUT",
              url:'{{route('backend.orders.update_orderid',['id'=>$order->id])}}',
              processData: false,
              data:JSON.stringify({order_id:data}),
              contentType: 'application/json',
              dataType: 'json',
              error: function(error) {
                console.log(error.responseText);
                iziToast.error({
                    title: 'Error!',
                    message: 'Invalid Order Id',
                    position: 'topRight'
                });
              },
              success: function(response) {
                  console.log(response);
                      if (response.status) {
$('#order_id_container').html('#'+data)
                      iziToast.success({
                          title: 'Success!',
                          message: 'Successful',
                          position: 'topRight'
                      });

                  }
              }
          });
        });


    });
  })
</script>
@endsection
