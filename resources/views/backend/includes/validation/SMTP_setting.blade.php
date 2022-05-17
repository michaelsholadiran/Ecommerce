{{-- @include('backend.includes.validation.helper_functions') --}}

<script>
    var validator = $(".form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            name: {
                'required': true
            },
            host: {
                'required': true
            },

            port: {
                'required': true
            },
            secure: {
                'required': true
            },
            username: {
                'required': true
            },
            email: {
                'required': true
            },


        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else if (element.hasClass("summernote")) {
                error.insertAfter(element.siblings(".note-editor"));
            } else if (element.hasClass("image-upload")) {
                error.insertAfter(element.closest(".box"));
            } else {
                error.insertAfter(element);
            }
        }
    })


    var callBackFunction = function() {
        return true;
    }
    $(".ajaxForm").submit(function(e) {
        var form = $(this)
        ajaxSubmit(e, form, callBackFunction);
    })
</script>
