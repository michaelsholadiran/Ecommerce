{{-- @include('backend.includes.validation.helper_functions') --}}

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

            email: {
                required: true,
                customemail: true,
            },


        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "email") {
                error.insertAfter(element.closest(".input-group"));
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
