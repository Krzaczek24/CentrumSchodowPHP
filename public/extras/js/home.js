$(document).ready(function() {
    $('#kill_session_btn').click(function() {
        $.post('home/killSession/', function() {
            alert('Sesja została wyczyszczona!');
        });
    });

    runGallery({
        interval: 10000,
        bottomArrow: true
    });
});