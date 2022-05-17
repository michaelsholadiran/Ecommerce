<script>
    $(function() {

        $.validator.addMethod("customemail",
            function(value, element) {
                return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
            },
            "Please enter a valid email address."
        );
        var validator = $(".form-validate-checkout").validate({
            ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

            rules: {
                email: {
                    required: true,
                    customemail: true,
                },
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },

                address: {
                    required: true
                },
                apartment: {
                    required: true
                },
                city: {
                    required: true
                },
                payment: {
                    required: true
                },
                postcode: {
                    required: true
                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
                phone: {
                    required: true
                },
                notes: {
                    required: true
                },
            },
            errorElement: "span",
            unhighlight: function(element, errorClass, validClass) {
                if ($(element).attr('type') === "radio") {
                    $(element).closest('.card').removeClass('border-danger');
                }

            },
            highlight: function(element) {
                if ($(element).attr('type') === "radio") {
                    $(element).closest('.card').addClass('border-danger');
                }
            },
            errorPlacement: function(error, element) {
                if (element.prop("type") === "radio") {
                    return
                }
                error.insertAfter(element);
            }
        })


        // var callBackFunction = function() {
        //     return true;
        // }
        // $(".form-validate-checkout").submit(function(e) {
        //   e.preventDefault()
        //     // var form = $(this)
        //     // ajaxSubmit(e, form, callBackFunction);
        // })
    })
</script>