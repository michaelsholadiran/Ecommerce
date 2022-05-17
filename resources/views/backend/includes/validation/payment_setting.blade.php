{{-- @include('backend.includes.validation.helper_functions') --}}

<script>
    var validator = $(".currency-form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            store_currency: {
                'required': true
            },
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else if (element.hasClass("summernote")) {
                error.insertAfter(element.siblings(".note-editor"));
            } else if (element.hasClass("select2")) {
                error.insertAfter(element.closest(".form-group").find('.select2-container'));
            } else {
                error.insertAfter(element);
            }
        }
    })
    var validator = $(".paypal-form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            paypal_active: {
                'required': true
            },
            paypal_currency: {
                'required': true
            },

            paypal_mode: {
                'required': true
            },
            client_id_sandbox: {
                'required': true
            },
            client_id_production: {
                'required': true
            },
            secret_id_sandbox: {
                'required': true
            },
            secret_id_production: {
                'required': true
            }

        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else if (element.hasClass("summernote")) {
                error.insertAfter(element.siblings(".note-editor"));
            } else if (element.hasClass("select2")) {
                error.insertAfter(element.closest(".form-group").find('.select2-container'));
            } else {
                error.insertAfter(element);
            }
        }
    })
    var validator = $(".stripe-form-validate").validate({
        ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

        rules: {
            stripe_active: {
                'required': true
            },
            stripe_currency: {
                'required': true
            },

            test_mode: {
                'required': true
            },
            test_secret_key: {
                'required': true
            },
            test_public_key: {
                'required': true
            },
            live_secret_key: {
                'required': true
            },
            live_public_key: {
                'required': true
            },


        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else if (element.hasClass("summernote")) {
                error.insertAfter(element.siblings(".note-editor"));
            }else if (element.hasClass("select2")) {
                error.insertAfter(element.closest(".form-group").find('.select2-container'));
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
