<script>
    $(function() {


        var validator = $(".form-validate").validate({
            ignore: ':hidden:not(.summernote),.note-editable.card-block,.ignore',

            rules: {

                password: {
                    required: true,
                },
                password_confirmation: {
                    required: true,
                    equalTo : "#password"
                },

            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
                } else {
                    error.insertAfter(element);
                }
            }
        })

        function callBackFunction()
        {}
        $(".ajaxForm").submit(function(e) {
            var form = $(this)
            ajaxSubmit(e, form, callBackFunction,'{{route('backend.index')}}');
        })
    })
</script>
