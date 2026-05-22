/* VaultEdge — Contact Form AJAX Handler */
(function ($) {
    'use strict';

    var $form = $('.ve-contact-form');
    if ( ! $form.length ) return;

    $form.on('submit', function (e) {
        e.preventDefault();

        var $btn = $form.find('[type="submit"]');
        var $msg = $('#ve-form-message');

        $btn.prop('disabled', true).html('Sending… <i class="fa fa-spinner fa-spin"></i>');
        $msg.hide().removeClass('ve-form-success ve-form-error');

        $.ajax({
            url:  veAjax.url,
            type: 'POST',
            data: {
                action:     've_contact_form',
                ve_nonce:   veAjax.nonce,
                ve_name:    $form.find('[name="ve_name"]').val(),
                ve_email:   $form.find('[name="ve_email"]').val(),
                ve_phone:   $form.find('[name="ve_phone"]').val(),
                ve_service: $form.find('[name="ve_service"]').val(),
                ve_message: $form.find('[name="ve_message"]').val(),
            },
            success: function (res) {
                if ( res.success ) {
                    $msg.addClass('ve-form-success').text(res.data.message).fadeIn();
                    $form[0].reset();
                } else {
                    $msg.addClass('ve-form-error').text(res.data.message).fadeIn();
                }
            },
            error: function () {
                $msg.addClass('ve-form-error').text('Something went wrong. Please try again.').fadeIn();
            },
            complete: function () {
                $btn.prop('disabled', false).html('Send Message <i class="fa fa-paper-plane"></i>');
            }
        });
    });

})(jQuery);
