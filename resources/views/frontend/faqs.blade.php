@extends('frontend.layout.master')
@section('content')
@php
$title="FAQs";
$description="";
$page="faqs";
@endphp


{{-- Body Content --}}
<div id="page-content">
    {{-- Page Title --}}
    <div class="page p-4 text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width h2">FAQs</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                <div id="accordionExample">
                    {{-- Payment and returns--}}
                    <h2 class="title h2">Payment and Returns</h2>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">What forms of payment do you accept？</h4>
                        <div id="collapseOne" class="collapse panel-content" data-parent="#accordionExample">We accept all major debit and credit cards (VISA, Mastercard and American Express), Paypal.</div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Do you charge any sale taxes on the items?</h4>
                        <div id="collapseTwo" class="collapse panel-content">Sales tax depends on your shipping destination. If there are any taxes and duties applicable, you’ll be able to see it on your order summary page before payment.</div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">We've extended our return window to 30 days! Returns and exchanges are accepted if the products
                            are:</h4>
                        <div class="panel-content collapse" id="collapseThree">
                            <ul>
                                <li>Unworn</li>
                                <li>Unwashed</li>
                                <li>In the original packaging</li>
                            </ul>

                        </div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThreeb" aria-expanded="false" aria-controls="collapseThreeb">How do I return or exchange my order?</h4>
                        <div class="panel-content collapse" id="collapseThreeb">
                          The best way is to make a new order, reach out to us at support@Lote.store for a refund request.
                        </div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThreebb" aria-expanded="false" aria-controls="collapseThreebb">How long does a refund or exchange take to process?</h4>
                        <div class="panel-content collapse" id="collapseThreebb">
                        After your original pair of product has been accepted at our warehouse, your refund will be initiated immediately.
                        </div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThreebbb" aria-expanded="false" aria-controls="collapseThreebbb">How much will I be refunded?</h4>
                        <div class="panel-content collapse" id="collapseThreebbb">
                      You‘ll be refunded the original product value to your original payment method. Shipping fee and taxes and duties are not refundable.
                        </div>
                    </div>
                    {{-- Shipping --}}
                    <h2 class="title h2">Shipping</h2>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How much does shipping cost?</h4>
                        <div class="panel-content collapse" id="collapseFour">We offer FREE worldwide shipping.</div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How long does the shipment take?</h4>
                        <div class="panel-content collapse" id="collapseFive">We have 1-2 days of processing time and after that our shipment can take up-to 10-15 business days. Remember, because of ongoing pandemic (COVID) it can be delayed. But, if you don't get your order within time-frame please do not hesitate to contact us.</div>
                    </div>

                    {{-- Product and fit --}}
                    <h2 class="title h2">Product And Fit</h2>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How do I find my size?</h4>
                        <div class="panel-content collapse" id="collapseFour">We know how important it is to find your perfect fit. Here are a few helpful hints to size your Product just right.</div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">When will you release the next drop?</h4>
                        <div class="panel-content collapse" id="collapseFive">The only way you can know is by following us instagram</div>
                    </div>
                    <div class="faq-body">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">The Products I want are sold out!</h4>
                        <div class="panel-content collapse" id="collapseSix">Help us decide what to restock by contacting us on support@Lote.store. If there’s enough demand, we’ll make it happen!
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- End Body Content --}}

{{-- Footer --}}
@include('frontend.layout.footer')
{{-- End Footer --}}


@endsection
