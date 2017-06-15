var id = 0,
    bloquear = false;
$(document).ready(function(){
    console.log("Categorias blog");
        $(".container-fluid").on("click", ".nodo_cateroria", function() {

            var $this = $(this);
            id = $this.val();
            nivel = $this.data('nivel');
            padre = $this.parent().parent().parent();
            is_categoria = padre.is('#box-padre');
            is_subcategoria = padre.is('#box-padre2');



        if (!is_categoria && !is_subcategoria) {
            return true;
        }

        $.ajax({
            url: 'categorias/categoriasPadres/' + id,
            success: function($categorias) {
                var ele = is_categoria ? $('#box-padre2') : $('#box-padre3');
                console.log($categorias);
                $('#box-padre3').html('');

                ele.html('').parent().parent().css('display', 'block');
                for(var i in $categorias) {
                    console.log($categorias);
                    if (is_subcategoria){
                        ele.append("<li><label>" + $categorias[i].descripcion + "</label></li>");
                    }else{
                        ele.append("<li><label><input class='nodo_cateroria' type='radio' name='categoria' value='" + $categorias[i].id + "'>" 
                            + $categorias[i].descripcion + 
                        "</label></li>");
                    }
                }
            }
        });
    });

    function save(categ, contenedor){
        if (bloquear){
            return false;
        }

        bloquear = true;
        console.log("Funcion Save . . .");
        $.ajax({
            url : 'categorias/save',
            type: "POST",
            data : {
                descripcion : categ,
                estado : "a",
                id_categoria_padre : id,
            }

            ,
            success:function(data, textStatus, jqXHR)
            {

                console.log(data);
                bloquear = false;
                var $html = "<li><label><input class='nodo_cateroria' type='radio' name='categoria' value='"+data.categoria.id+"'>"+data.categoria.descripcion+"</label></li>";
                if (contenedor == '#box-padre3'){
                    $html = "<li><label>"+data.categoria.descripcion+"</label></li>"
                }

                $(contenedor).append($html);
                //data: return data from server
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                console.log(textStatus);
                bloquear = false;
                //if fails
            }
        });
        //e.preventDefault(); //STOP default action
    }

    $('#categoria1').on("keypress",function (key) {
        window.console.log(key.charCode)
        if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode != 45) //retroceso
            && (key.charCode != 241) //ñ
            && (key.charCode != 209) //Ñ
            && (key.charCode != 32) //espacio
            && (key.charCode != 225) //á
            && (key.charCode != 233) //é
            && (key.charCode != 237) //í
            && (key.charCode != 243) //ó
            && (key.charCode != 250) //ú
            && (key.charCode != 193) //Á
            && (key.charCode != 201) //É
            && (key.charCode != 205) //Í
            && (key.charCode != 211) //Ó
            && (key.charCode != 218) //Ú

        )return false;
       console.log($(this));
    });
    $('#categoria2').on("keypress",function (key) {
        window.console.log(key.charCode)
        if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode != 45) //retroceso
            && (key.charCode != 241) //ñ
            && (key.charCode != 209) //Ñ
            && (key.charCode != 32) //espacio
            && (key.charCode != 225) //á
            && (key.charCode != 233) //é
            && (key.charCode != 237) //í
            && (key.charCode != 243) //ó
            && (key.charCode != 250) //ú
            && (key.charCode != 193) //Á
            && (key.charCode != 201) //É
            && (key.charCode != 205) //Í
            && (key.charCode != 211) //Ó
            && (key.charCode != 218) //Ú

        )return false;
       console.log($(this));
    });
    $('#categoria3').on("keypress",function (key) {
        window.console.log(key.charCode)
        if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode != 45) //retroceso
            && (key.charCode != 241) //ñ
            && (key.charCode != 209) //Ñ
            && (key.charCode != 32) //espacio
            && (key.charCode != 225) //á
            && (key.charCode != 233) //é
            && (key.charCode != 237) //í
            && (key.charCode != 243) //ó
            && (key.charCode != 250) //ú
            && (key.charCode != 193) //Á
            && (key.charCode != 201) //É
            && (key.charCode != 205) //Í
            && (key.charCode != 211) //Ó
            && (key.charCode != 218) //Ú

        )return false;
       console.log($(this));
    });

    $('#btn-guardar').click(function () {
        save($('#categoria1').val(), '#box-padre');
    });

    $('#btn-guardar2').click(function () {
        save($('#categoria2').val(), '#box-padre2');
    });

    $('#btn-guardar3').click(function () {
        save($('#categoria3').val(), '#box-padre3');
    });
});