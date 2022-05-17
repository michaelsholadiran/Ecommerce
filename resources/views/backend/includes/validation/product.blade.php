{{-- @include('backend.includes.validation.helper_functions') --}}

<script>
    var validator = $(".form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            title: {
                'required': true
            },
            description: {
                'required': true
            },
            'files[]': {
                'required': true,
                extension: "jpg|jpeg|png",
            },
            price: {
                'required': true
            },
            compare_price: {
                'required': true
            },
            quantity: {
                'required': true
            },
            weight: {
                'required': true
            },

            seo_title: {
                'required': true,
                maxlength: 60
            },
            seo_description: {
                'required': true,
                maxlength: 160
            }
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else if (element.hasClass("summernote")) {
                error.insertAfter(element.siblings(".note-editor"));
            } else {
                error.insertAfter(element);
            }
        }
    })

    $('.summernote').summernote({
        dialogsInBody: true,
        height: 300,
        callbacks: {
            onChange: function(contents, $editable) {
                $('.summernote').val($('.summernote').summernote('isEmpty') ? "" : contents);
                validator.element($('.summernote'));
            },
            onImageUpload: function(files) {
                for (let i = 0; i < files.length; i++) {
                    $.upload(files[i]);
                }
            },

        }
    });

    $.upload = function(file) {
        // console.log(file);
        let form_data = new FormData();
        form_data.append('file', file, file.name);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '{{route('backend.product.summernoteImageUpload')}}',
            contentType: false,
            cache: false,
            processData: false,
            data: form_data,
            success: function(img) {
                // console.log(img);
                // return
                $('.summernote').summernote('insertImage', img);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // console.error(textStatus + " " + errorThrown);
            }
        });
    };


    var callBackFunction = function() {
        return true;
    }
    $(".ajaxForm").submit(function(e) {
        var form = $(this)
        ajaxSubmit(e, form, callBackFunction);
    })
</script>
