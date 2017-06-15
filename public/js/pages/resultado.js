$(document).ready(function () {
    $('#icon_hr').click(function () {
        $('#busq_productos').hide()
        $('#busq_productos_horz').show();
    });
    $('#icon_cuadros').click(function () {
        $('#busq_productos').show()
        $('#busq_productos_horz').hide();
    });
    $('button[name=palabras]').click(function () {
        $(this).hide();
    });
});