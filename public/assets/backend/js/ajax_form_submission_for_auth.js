function ajaxSubmit(e, form, callBackFunction,redirect_location) {
    e.preventDefault()
      if (form.valid()) {
        form.find("button[type='submit']").attr('disabled', true)
        var action = form.attr('action');
        var form2 = e.target;
        var data = new FormData(form2);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: 'json',
            data: data,
            error: function(error) {
              console.log(error.responseText);
                if (error.status == 422) {
                  iziToast.error({
                      title: 'Error!',
                      message: 'Fill in all inputs correctly',
                      position: 'topRight'
                  });
                                      var a = error.responseJSON.errors;
                    var validator = form.validate();
                    for (i in a) {
                        validator.showErrors({
                            [i]: a[i]
                        });
                    }
                }
            },
            success: function(response) {
              console.log(response);
              // console.log(window.loaction);
                // console.log(window.location.href.indexOf("register"));
                    if (response.status) {
                    callBackFunction();
                    iziToast.success({
                        title: 'Success!',
                        message: response.notification,
                        position: 'topRight'
                    });

if (window.location.href.indexOf("register") !== -1 || window.location.href.indexOf("login") !== -1 || window.location.href.indexOf("reset-password") !== -1) {

window.location.href=redirect_location;
}
                }else{
                  iziToast.error({
                      title: 'Error!',
                      message: response.notification,
                      position: 'topRight'
                  });
                }
            },
            complete: function(data) {
                form.find("button[type='submit']").attr('disabled', false)
                if (!$('.update')) {
                  form.trigger('reset')
                  $('.summernote').summernote('reset')
                }

            }
        });
    } else {

        iziToast.error({
            title: 'Error!',
            message: 'Fill in all inputs correctly',
            position: 'topRight'
        });
    }
}
