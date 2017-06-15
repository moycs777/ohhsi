$(function() {
    //enviar categoria_hijos al back
    console.log('crear post');
    var desc = 'Juery';
    var categoria_json = {
        padre:'pai',
        hijo:'hijito',
        nieto:'nieto',
    };
    $('#categoria_padre').append('<option>'+categoria_json.padre+'</option>');

    $('#categoria_padre').on('change',function () {
        var id = $('#categoria_padre option:selected').val();
        console.log(id);
        $.ajax({
            url: 'http://localhost/ohhsi/public/blog/catprodHijos/' + id,
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

    $('#img_guardadas').on('click', function(){
      var borrar_imagen = confirm("estas seguro de eliminar esta imagen?");
        if (borrar_imagen == true) {
            $(this).remove();
        }
    })

    // ruta donde buscar  catprodNietos/ + id;
    // variable a recibir categoria_nieto

    $('#categoria_hijo').on('change',function () {
        console.log("Categoria hijo cambio");
        var id = $('#categoria_hijo option:selected').val();
        console.log(id);
        $.ajax({
            url: 'http://localhost/ohhsi/public/blog/catprodNietos/' + id,
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

    // For Firefox to work.
    $('#drag-smile, #drag-text').on('dragstart', function (e) {
            e.originalEvent.dataTransfer.setData('Text', this.id);
        })

    $('div#froala-editor').froalaEditor({
            toolbarButtons: ['bold', 'italic', 'underline', 'insertImage', 'insertLink', 'emoticons', 'undo', 'redo'],
            pluginsEnabled: ['image', 'link', 'draggable', 'emoticons']
        })
        .on ('froalaEditor.drop', function (e, editor, dropEvent) {
                // Focus at the current posisiton.
                editor.markers.insertAtPoint(dropEvent.originalEvent);
                var $marker = editor.$el.find('.fr-marker');
                $marker.replaceWith($.FroalaEditor.MARKERS);
                editor.selection.restore();

                // Save into undo stack the current position.
                if (!editor.undo.canDo()) editor.undo.saveStep();

                // Insert HTML.
                if (dropEvent.originalEvent.dataTransfer.getData('Text') == 'drag-smile') {
                    editor.html.insert('<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/1f600.svg)">&nbsp;</span>');
                }
                else {
                    editor.html.insert('Hello!');
                }

                // Save into undo stack the changes.
                editor.undo.saveStep();

                // Stop event propagation.
                dropEvent.preventDefault();
                dropEvent.stopPropagation();
                return false;
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

});

Dropzone.options.myAwesomeDropzone = {
    maxFilesize: 10,
    addRemoveLinks: true,
    dictResponseError: 'Server not Configured',
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    init:function(){
        var self = this;
        // config
        self.options.addRemoveLinks = true;
        self.options.dictRemoveFile = "Delete";
        //New file added
        self.on("addedfile", function (file) {
            console.log('new file added ', file);
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

        // On removing file
        self.on("removedfile", function (file) {
            console.log(file);
            console.log(file + ' eliminada');
        });

        self.on('success', function(data, responseText){
            console.log(responseText.success);
            if(responseText.success = true){
                console.log(responseText.images);

                var id_imagen = responseText.images;

                $('#myform').append('<input type="hidden" name="id_image['+id_imagen+']" value="'+id_imagen+'">');
            };

        });
    }

    
};