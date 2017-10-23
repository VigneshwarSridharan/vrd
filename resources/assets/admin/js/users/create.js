(function ($) {
    $('.select2').select2();

    $('#email').on('focusout', function () {
        $.ajax({
            url: "http://localhost/laravel/admin/public/api/checkuser",
            type: "POST",
            cache: false,
            dataType: "json",
            data: {
                _token: $('meta[name= "csrf-token"]').attr('content'),
                email: function () {
                    return $("#email").val();
                }
            },
            success : function (data) {
                var form = $('form');
                debugger;
                if (Number(data.valid) > 0) {

                    form.find('[type="submit"]').prop('disabled', 'disabled');
                    if ($("#email").parent().find('.error-ex').length == 0) {
                        console.log($("#email").parent());
                        $("#email").parent().append('<label class="error-ex error">This email address already exists</label>');
                    }
                    $("#email").parent().find('.error-ex').html('This email address already exists');
                } else {

                    form.find('[type="submit"]').removeAttr('disabled');
                    $("#email").parent().find('.error-ex').html('');
                }
                return true;
            }
        })
    });
    
    $('form[jquery-validation]').validate({
        rules: {
            email : {
                email: true,
                checkemail : false,
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                equalTo: "#password"
            }
        },
        submitHandler: function (form) {
            var noty = new PNotify({
                title: 'Please wait',
                hide: false,
                icon: 'fa fa-spinner fa-pulse fa-2x fa-fw',
                animate: {
                    animate: true,
                    in_class: 'zoomInRight',
                    out_class: 'zoomOutRight'
                }
            });
            var data = $(form).serializeArray();
            console.log(data);
            $.ajax({
                method: "POST",
                url: 'http://localhost/laravel/admin/public/admin/users/create',
                data: data,
                success: function (data) {
                     form.reset();
                     noty.update({
                        hide: true,
                        title: 'User created successfully',
                        type: 'success',
                        icon: 'fa fa-check fa-2x'
                    });
                }
            });
        }
    });
})(jQuery);