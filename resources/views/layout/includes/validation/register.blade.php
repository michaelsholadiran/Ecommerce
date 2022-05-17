
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
              email: {
                    required: true,
                    customemail: true,
                },
              first: {
                  'required': true
              },
              last: {
                  'required': true
              },
              password: {
                  'required': true
              },
              password2: {
                  'required': true,
                  equalTo : "#password"

              },
              access_code: {
                  'required': true,
                

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
