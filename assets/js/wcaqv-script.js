jQuery(document).ready(function($) {
    $(document).on('click', '.themefarmer-wcaqv-button', function(event) {
        var product_id = $(this).data('product_id');
        var progress_img = '<div class="wcaqv-progress"></div>';
        event.preventDefault();
        $('#themefarmer-wcaqv-body').html(progress_img);
        $('.wcaqv-overlay').show('fast', function() {
            $.ajax({
                url: themefarmer_aqv.ajaxurl,
                type: 'POST',
                // dataType: 'html',
                data: { action: 'ThemeFarmer_WCAQW_show_product', product_id: product_id },
                success: function(data) {
                	$('#themefarmer-wcaqv-body').html(data);
                },
                error: function() {
                    $('#themefarmer-wcaqv-body').html('some problem please try again');
                },
                complete: function() {
                    
                }
            });
        });
    });

    $(document).on('click', '.wcaqv-overlay', function(event) {
        if ($(event.target).hasClass('wcaqv-overlay')) {
            $('.wcaqv-overlay').hide();
            $('#themefarmer-wcaqv-body').html('');
        }
    });

    $(document).on('click', '.wcaqv-overlay .wcaqv-close', function(event) {
        $('.wcaqv-overlay').hide();
        $('#themefarmer-wcaqv-body').html('');
    });

});
