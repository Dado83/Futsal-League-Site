$(document).ready(function () {
    var window_width = $(window).width();
    if (window_width > 700) {
        var fixture_width = $('#fixture').width();
        var left_margin = (window_width - fixture_width) / 2;
        $('#fixture').css('margin-left', left_margin + 'px');
    }
});