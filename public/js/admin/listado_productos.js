
$(function() {
    console.log('listado productos');
      $(".delete").on("submit", function(){
        return confirm("Desea borrar este producto?");
    });
    /*$('#borrar').on('click', function(){
        console.log('on');
        confirm("Desea Eliminar?");
    });*/

});

