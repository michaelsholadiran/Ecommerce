
<script>

$.validator.addMethod("customemail",
    function(value, element) {
        return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    },
    "Please enter a valid email address."
);

    var validator = $(".form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            from_name: {
                'required': true
            },
            from_email: {
                  required: true,
                  customemail: true,
              },
            subject: {
                'required': true
            },
            body: {
                'required': true,
            },

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
            url: '{{route('backend.email_marketing.editor_image_upload')}}',
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
              // console.log(jqXHR.responseText);
                // console.error(textStatus + " " + errorThrown);
            }
        });
    };



    $(".ajaxForm").submit(function(e) {
        var form = $(this)
        ajaxSubmit(e, form, callBackFunction);
    })
</script>
