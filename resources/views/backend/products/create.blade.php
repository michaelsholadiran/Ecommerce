@extends('backend.layout.master')
@section('content')
@php $page='products'; $title="Add New Product";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="edit-2"></i> Add Product</h4>

                </div>
            </div>
        </div>
        <div class="col-12">
            {{-- <form action="/like" class="ajaxForm form-validate" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{route('backend.product.store')}}" class="ajaxForm form-validate" id="myform" name="myform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"  name="title" id="title">

                        </div>
                        <div class="form-group mb-0">
                            <label for="description">Description</label>
                            <textarea class="form-control summernote" name="description" id="description"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>


                    </div>

                </div>

                <section class="section">
           <div class="section-body">
             <div class="row">
               <div class="col-12">
                 <div class="card">
                   <div class="card-header">
                     <h4>Upload Images</h4>
                   </div>
                   <div class="card-body">

                         <input name="files[]" type="file" multiple class="form-control" />

                   </div>
                 </div>
               </div>
             </div>
           </div>
         </section>
                <div class="card">
                    <div class="card-header">
                        <h4>Pricing</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control"  placeholder="0.00" name="price" id="price">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="compare_price">Compare Price</label>
                                <input type="text" class="form-control" id="compare_price" placeholder="0.00" name="compare_price" >
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Inventory</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" placeholder="0.00" name="quantity">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="weight">Weight</label>
                                <input type="number" class="form-control" id="weight" placeholder="0.00" name="weight">
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <style media="screen">
                            /* h1, h2 {
text-align: center;
margin: 20px;
}

textarea {
max-width: 600px;
} */
                            .warning {
                                color: red;
                            }

                            /* Specific colors for the SERP preview */
                            #titlePreview, .title-preview {
                                color: #035AC6;
                                font-size: 1.2em;
                            }

                            #URL {
                                color: green;
                                font-size: 0.92em;
                            }

                            #descPreview {
                                color: #9B9DA1;
                            }

                            .preview {
                                display: block;
                                max-width: 32em;
                                margin: 30px 8px;
                            }

                            .bp {
                                margin-top: 80px;
                            }
                        </style>
                        <h4>SEO</h4>
                    </div>
                    <div class="card-body">

                        {{-- <div class="head">
 	<h1> Title & Description Tool </h1>
 </div> --}}


                                <div class="form-group">
                                    <!-- Mark up textareas properly with labels -->
                                    <label for="title">Title:</label>
                                    <textarea class="form-control" rows="1" placeholder="Type your title" id="seo_title"  name="seo_title"></textarea>
                                    <span id="titleChar">0</span> characters
                                </div>


                                <div class="form-group">
                                    <label for="seo_description">Description:</label>
                                    <textarea class="form-control" rows="4" placeholder="Input your description" id="seo_description"  name="seo_description"></textarea>
                                    <span id="descChar">0</span> characters
                                </div>



                            <div class="preview">
                              @php
                                try {
                                  $name=App\Models\SiteSetting::first()->name;
                                } catch (\Exception $e) {
                                $name="";
                                }

                              @endphp
                                <span id="titlePreview">SERP Preview Tool </span><span class="title-preview">| {{$name}}</span>
                                <br>
                                <span id="URL">{{request()->root()}}/<span id="urlPreview">serp-preview-tool</span></span>
                                <br>
                                <span id="descPreview">This is an example description that will get replaced when you start typing. Make sure to keep descriptions mobile-friendly and keyword-rich!</span>
                            </div>


                            <h4>Best Practices When Writing for SEO</h4>
                            <div>
                                <h4>Title</h4>
                                <ul>
                                    <li>Remember mobile-friendliness! Keep your character count around 60 characters, or else Google will cut it off with ellipses (...)</li>
                                    <li>Use important keywords that reflect the subject of the page</li>
                                    <li>Put important keywords first or as early as possible and your branding in at the end</li>
                                    <li>Write a unique title for each page that closely replicates (but doesn't duplicate) the H1 of the page</li>
                                </ul>
                                <h4>Description</h4>
                                <ul>
                                    <li>Always keep character count in mind - keep it around 155, but no more than 160</li>
                                    <li>Just like titles, keep each page's description unique to that page and put the most important keywords up front</li>
                                    <li>Consider it an ad - write compelling copy with both your branding and calls to action</li>
                                    <li>Heads up: Google won't always use your exact description as they may pull in content in the page that is most relevant to the searcher's query</li>
                                </ul>
                            </div>


                        <div class="row">
                            <div class="col-12 text-right">
                                <button  type="submit" name="status" value="0" class="btn btn-outline-primary mr-2">Draft</button>
                                <button  type="submit" name="status" value="1" class="btn btn-primary">Publish</button>
                                <input type="hidden" name="status" >
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <button type="submit" class="btn btn-primary">Publish</button> --}}
            </form>
        </div>
        <script type="text/javascript">
            document.forms[0].submit = function() {
                alert('hello')
            }
        </script>

    </section>
    @include('backend.layout.settings_sidebar')
</div>
{{-- <script src="{{asset('assets/backend/js/ajax_form_submission.js')}}"></script> --}}
{{-- <script src="{{asset('assets/backend/bundles/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/backend/bundles/jquery-validate/additional-methods.min.js')}}"></script> --}}


<script type="text/javascript">
//submit button
$("button[type='submit']").click(function(){

  $("input[name='status']").val($(this).attr('value'))
})

    /**
     * SEO Preview Script
     */
    // Title length warning text
    $('#seo_title').keyup(function() {
        var maxLength = 60;
        var length = $(this).val().length;
        $('#titleChar')
            .text(length)
            .toggleClass("warning", length > maxLength);
    });
    // Description length warning text
    $('#seo_description').keyup(function() {
        var maxLength = 155;
        var length = $(this).val().length;
        $('#descChar')
            .text(length)
            .toggleClass("warning", length > maxLength);
    });


    //Live Update Title
    var titlePrev = document.getElementById('seo_title');
    // both keyup and keypress so that it counts if you hold a key down
    titlePrev.onkeyup = titlePrev.onkeypress = function() {
        document.getElementById('titlePreview').innerHTML = this.value;

        // urlPreview
        document.getElementById('urlPreview').innerHTML = this.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        //This IF statement truncates the text if the max characters are reached, much like Google does!
        if ($('#titlePreview').text().length > 60) {
            $('#titlePreview').text($('#titlePreview').text().substr(0, 57) + "...");
        } else if ($('#titlePreview').text().length <= 0) {
            document.getElementById('titlePreview').innerHTML = 'SERP Preview Tool | Ben Thompson Online';
            document.getElementById('urlPreview').innerHTML = 'serp-preview-tool';
        };
    };



    // Live Update Description
    var descrPrev = document.getElementById('seo_description');
    descrPrev.onkeyup = descrPrev.onkeypress = function() {
        document.getElementById('descPreview').innerHTML = this.value;
        if ($('#descPreview').text().length > 213) {
            $('#descPreview').text($('#descPreview').text().substr(0, 210) + "...");
        } else if ($('#descPreview').text().length <= 0) {
            document.getElementById('descPreview').innerHTML = 'This is an example description that will get replaced when you start typing. Make sure to keep descriptions mobile-friendly and keyword-rich!'
        };
    };
</script>
@endsection
@section('bottom')
    @include('backend.includes.validation.product')
@endsection
