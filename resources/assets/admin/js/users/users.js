(function ($) {
    $('.user_destroy').on('click', function() {
        var elm = $(this);
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
        $.ajax({
            url: elm.data('url'),
            type : 'DELETE',
            success : function(data) {
                if(Number(data))
                {
                    noty.update({
                        hide: true,
                        title: 'User deleted successfully',
                        type: 'success',
                        icon: 'fa fa-check fa-2x'
                    });
                }
                else
                {
                    noty.update({
                        hide: true,
                        title: 'Sorry someting wrong',
                        type: 'danger',
                        icon: 'fa fa-time fa-2x'
                    });
                }
                var row = elm.parents('tr');
                
                elm.tooltip('destroy')
                row.animate({
                    opacity: 0
                },1000,function() {
                    $(this).remove();
                });
            }
        })
    });
})(jQuery);