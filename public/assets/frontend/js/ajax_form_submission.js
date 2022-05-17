function ajaxSubmit(e, form, callBackFunction) {
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
                // console.log('hes');
                if (error.status == 422) {

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

                // if (response.page == "checkout" ) {
                //   // console.log(response[0]);
                //   var redirect_location =response.link
                // window.location.href=redirect_location;
                // }
                if (form.hasClass('subscribe')) {
                  form.html('<div style="color:green;"><b>Thanks for signing up! Check your email to confirm your subscription.</b></div>')
                  return ;
                }


            },
            complete: function(data) {

                form.find("button[type='submit']").attr('disabled', false)
                // form.trigger('reset')
            }
        });
    } else {


    }
}
