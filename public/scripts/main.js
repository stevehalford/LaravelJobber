$(document).ready(function() {
    $('#apply-online').hide();

    $('#apply_online_now').click(function() {
        $('#apply-online').show();
    });

    $('#cancel-apply').click(function() {
        $('#apply-online').hide();
    })
});
