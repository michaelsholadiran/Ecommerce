@extends('frontend.layout.master')

@php
$title="Confirm Order";
$description="";
@endphp
@section('content')



<style media="screen">
  .page-title p{
    font-size: 1.2em;
  }
  .border-top p:first-child{
    font-weight: bolder;
    font-size: 1.2em;
  }
</style>
    <!--Body Content-->
    <div id="page-content">


            <div class="container">
            	<div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mx-auto main-col">
                      <div class="page p-4 text-center">
                      <div class="page-title">
                        <div class="wrapper"><h1 class="page-width title h2">Thank you for your order! 🎉</h1></div>
                            <div class="wrapper"><p>Order confirmation and updates has been sent to <b>{{$order->email}}</b></p></div>
                          </div>
                    </div>


                  <div class="border-top p-3">
                    <div class="d-flex justify-content-between">
                      <p>Order #{{$order->id}}</p>
                        <p><button id="printST" >Print Order <i class="fa fa-print" aria-hidden="true"></i></button></p>
                    </div>

                    <p>{{$order->created_at->format('M d, Y h:i a')}}</p>
                  </div>
                  <div class="border-top p-3">
                    <p>Payment Status : @if ($order->paid)
                      Paid
                      @else
                        Unpaid
                    @endif</p>
                   <p>Powered By Paypal</p>
                    <p>Total ${{$order->total_price}}</p>

                  </div>

                  <div class="border-top p-3">
                      <p>Your Order</p>

@foreach ($order->orders as $o)
  <div class="d-flex border-bottom mb-3">

    <div class="mr-4 ">
<img src="{{$o->image}}" alt="" style="width:100px;height:90px;">
    </div>
    <div class="">
      <div>{{$o->product->title}}</div>
      <div>Color: {{$o->color}}</div>
     
      <div>x {{$o->quantity}}</div>
    </div>
  </div>
@endforeach


                  </div>
<div class="text-center">
  <a href="{{route('frontend.index')}}" class="btn-outline btn-lg btn" name="button"><i class="icon icon-arrow-left"></i> Continue Shopping</a>
</div>
<p class="pt-3">Join our telegram group to get updates on free gifts,free shipping and more from  jiour </p>
<div class="text-center">
  @php
  try {
    $telegram=App\Models\SiteSetting::first()->telegram;
      } catch (\Exception $e) {
    $telegram="";

  }

  @endphp
  <a href="{{$telegram}}" class="btn-outline btn btn-lg bg-primary " name="button"><i class="icon icon-tumblr-alt"></i> Telegram</a>
</div>
                   	</div>
                </div>
            </div>

        </div>
    <!--End Body Content-->

    <!--Footer-->
@include('frontend.layout.footer')
    <!--End Footer-->
    <script type="text/javascript">



    $('#printST').click(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $.ajax({
            type: 'GET',
            url: '{{route('frontend.order_confirmation.print')}}',
            // data: formData,
            dataType: 'html',
            success: function (html) {

                w = window.open(window.location.href,"_blank",);
                w.document.open();
                w.document.write(html);
                w.document.close();
                w.focus();
                w.focus();
                w.window.print();

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    </script>





@endsection
