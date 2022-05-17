
<script>

$(function(){


$.validator.addMethod("customemail",
    function(value, element) {
        return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    },
    "Please enter a valid email address."
);

    var validator = $(".form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            first: {
                'required': true
            },
            email: {
                  required: true,
                  customemail: true,
              },
            last: {
                'required': true
            },
            phone: {
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


$(".form-validate2").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            old_password: {
                'required': true
            },
            password: {
                  required: true,
                  // customemail: true,
              },
            password_confirmation: {
                'required': true
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

    var callBackFunction = function() {
        return true;
    }

    $(".ajaxForm").submit(function(e) {
        var form = $(this)
        ajaxSubmit(e, form, callBackFunction);
    })

    })
</script>
