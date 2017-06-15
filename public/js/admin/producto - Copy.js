var totalImagenes = 0;
Dropzone.options.myAwesomeDropzone = {
    maxFilesize: 5,
    addRemoveLinks: true,
    dictResponseError: 'Server not Configured',
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    init:function(){
        var self = this;
        // config
        var eliminar = 0;
        
        function elimin(event){
            event.preventDefault();

            console.log("funcion eliminar");
        }

        self.options.addRemoveLinks = true;
        self.options.dictRemoveFile = "Borrar";
        //New file added
        self.on("addedfile", function (file) {
            //console.log('new file added ', file);
        });
        // Send file starts
        self.on("sending", function (file) {
            //console.log('upload started', file);
            $('.meter').show();
        });

        // File upload Progress
        self.on("totaluploadprogress", function (progress) {
            //console.log("progress ", progress);
            $('.roller').width(progress + '%');
        });

        self.on("queuecomplete", function (progress) {
            $('.meter').delay(999).slideUp(999);
        });

       

        self.on('success', function(data, responseText){
            console.log(responseText.success);
            if(responseText.success = true){
                console.log(responseText.images);
                var id_imagen = responseText.images;
                $('#myform').append('<input type="hidden"  name="id_image['+id_imagen+']" value="'+id_imagen+'">');
                $('input[type="hidden"]').trigger('change')
                moises = id_imagen;
                
                console.log('este es el archivo ' + id_imagen);
                /*$(data.previewTemplate).append('<span class="server_file" id="'+responseText.images+'">'+responseText.images+'</span>');
                $(data.previewTemplate).append(' <a onclick="elimin()" href="#"  >borrar</a>');
                $(data.previewTemplate).append(' <button onclick="elimin()">Click me</button>');*/

                $(data.previewElement).find('.dz-remove').attr('id_imagen', responseText.images);
                $(data.previewElement).addClass('.dz-success');
                //enviamos el id a esta variable global para asi saber 
                eliminar = id_imagen;
                totalImagenes = totalImagenes+1;
                console.log(totalImagenes);

            };


        });       

        // On removing file
        self.on("removedfile", function (file) {
            /*console.log(JSON.parse(JSON.stringify(file)));
            console.log('este es el file ' + file);*/
            var value = $("[name='id_image']");
            x = confirm('Deseas borrar?' + file );

            eliminar_var = $('input[type="hidden"][value='+id+']').val();

            var id = $(file.previewTemplate).find('.dz-remove').attr('id_imagen');
            console.log(eliminar_var);
            
            //aki esta la magia, bueno faltaba escribir bien el selector

            //eliminar la magen de la base de datos
            $.ajax({
                type: 'GET',
                url:  "deleteImg/" + id,
                /*data: {'name': id }*/
            });

            $('input[type="hidden"][value='+id+']').remove();
            totalImagenes = totalImagenes-1;
           
            
        });
    }
    
};

$(function() {
    
    $('#validar').attr('disabled', true);
    

    if (totalImagenes >0) {
        $('#validar').attr('disabled', false);
        
    }
    x = {
      aInternal: 10,
      aListener: function(val) {},
      set a(val) {
        this.aInternal = val;
        this.aListener(val);
      },
      get a() {
        return this.aInternal;
      },
      registerListener: function(listener) {
        this.aListener = listener;
      }
    }

    x.registerListener(function(val) {
      alert("Someone changed the value of x.a to " + val);
      console.log('cambio');
    });



    /*  --------------------------*/
    //enviar categoria_hijos al back
    $('#categoria_padre').on('change',function () {
        var id = $('#categoria_padre option:selected').val();
        console.log(id);
        $.ajax({
            url: 'catprodHijos/' + id,
            success: function (categoria_hijo) {
                console.log("funciono el ajax");
                //console.log(categoria_hijos);
                
                 $.each(categoria_hijo, function(i, valor){
                     console.log(categoria_hijo[i]);
                });

                $('#categoria_hijo').html('');
                $('#categoria_hijo').append('<option></option>');
                $.each(categoria_hijo, function(i, valor){
                    $('#categoria_hijo').append('<option value= "'+ categoria_hijo[i].id +'">'   + categoria_hijo[i].descripcion +  '</option>');
                });

            }
        });
    });

    // ruta donde buscar  catprodNietos/ + id;
    // variable a recibir categoria_nieto

    $('#categoria_hijo').on('change',function () {
        console.log("Categoria hijo cambio");
        var id = $('#categoria_hijo option:selected').val();
        console.log(id);
        $.ajax({
            url: 'catprodNietos/' + id,
            success: function (categoria_nieto) {
                console.log('funciona el ajax 2');

                $.each(categoria_nieto, function (i, valor) {
                    console.log(categoria_nieto[i]);
                });

                $('#categoria_nieto').html('');
                $('#categoria_nieto').append('<option></option>');
                $.each(categoria_nieto, function (i, valor) {
                    $('#categoria_nieto').append('<option value="'+ categoria_nieto[i].id +'">'+ categoria_nieto[i].descripcion +'</option>')
                });
            }
        });
    });

    $('#img_guardadas').on('click', function(){
      var borrar_imagen = confirm("estas seguro de eliminar esta imagen?");
        if (borrar_imagen == true) {
            $(this).remove();
        }
    })

  

    // For Firefox to work.
    $('#drag-smile, #drag-text').on('dragstart', function (e) {
            e.originalEvent.dataTransfer.setData('Text', this.id);
        })

    
    $('#precio').autoNumeric('init');

    $('#titulo').on("keypress",function (key) {
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
    });

    $("#asd").on('click', function(e) {
            e.preventDefault();
            console.log("asd");
        });

});

function elimin(){

}

