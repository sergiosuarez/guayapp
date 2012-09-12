
/*
 *
 *
 */
    
function pop_up_subir_archivo(id_div,id_boton_subir)  {
      
        //modificar estos parametros
         var nombre_articulo=$('#nom_artic').val();
         var nombre_usuario=$('#nom_usuario').val();
         var id_seccionx=$('#id_sec').val();
         
         new AjaxUpload(id_boton_subir,{
                action: 'data/F_ingresar_datos.php',
                name: 'archivo',
                onSubmit: function(file){
                    this.setData({
                        //Modificar estos parámetros
                        'tipo': '   ', 
                        'tipo_multimedia':'imagen',
                        'id_sec': id_seccionx,
                        'nom_artic': nombre_articulo,
                        'nom_usuario':nombre_usuario
                        });

                        $('#mensaje_img').empty();
                        $('#progressbar_img').fadeIn(1);
                },
                onComplete : function(file){
                        setTimeout(
                            function(){ 
                                $('#progressbar_img').fadeOut(50);
                                $('<p>La imagen se ha subido</p>').appendTo('#mensaje_img');},
                            2000);
                        }
           });
        
        
        $('#progressbar_img').css('display','none');
        document.getElementById('sombra').className='sombraLoad';
        document.getElementById(id_div).className='windowLoad';
    
}

function pop_up_ubicacion_geografica(id_div){
        //$('#progressbar_vid').css('display','none');
        document.getElementById('sombra').className='sombraLoad';
        document.getElementById('ventana_ubicacion_geografica').className='windowLoad';
    }
}

function pop_up_cerrar_ventana(id_ventana){
    $("#descripcion_img").val("");
    $('#mensaje_img').empty();
    document.getElementById('sombra').className='sombraUnload';
    document.getElementById(id_ventana).className='windowUnload';
}


