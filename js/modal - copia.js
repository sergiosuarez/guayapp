
/*
 *
 *
 */
    
function pop_up(tipo_multimedia)  {
    
  
    
    if(tipo_multimedia=='imagen'){
         
         var nombre_articulo=$('#nom_artic').val();
         var nombre_usuario=$('#nom_usuario').val();
         var id_seccionx=$('#id_sec').val();
         
         new AjaxUpload('#btn_enviar',{
                action: 'data/F_ingresar_datos.php',
                name: 'archivo',
                onSubmit: function(file){
                    this.setData({
                        'descripcion': $('#descripcion_img').val(),
                        'tipo': 'reg_multimedia',
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
        document.getElementById('ventana_subir_archivo').className='windowLoad';
    }
    
    if(tipo_multimedia=='video'){
        
        $('#progressbar_vid').css('display','none');
        document.getElementById('sombra').className='sombraLoad';
        document.getElementById('ventana_subir_video').className='windowLoad';
    }
    
    
    
}

function cerrar_ventana(tipo_ventana)
{
    
        if(tipo_ventana=='imagen'){
             $("#descripcion_img").val("");
             $('#mensaje_img').empty();
            document.getElementById('sombra').className='sombraUnload';
            document.getElementById('ventana_subir_archivo').className='windowUnload';
        }
        
        if(tipo_ventana=='video'){
            $("#codigo_video").val("");
            $("#descripcion_video").val("");
            $('#mensaje_vid').empty();
            document.getElementById('sombra').className='sombraUnload';
            document.getElementById('ventana_subir_video').className='windowUnload';
        }

}


function subir_video(){
    var id_seccion=$('#id_sec').val(); 
    var cod_video=$('#codigo_video').val();
    var descrip_video=$('#descripcion_video').val();
    var dataString='tipo=reg_multimedia&tipo_multimedia=video&id_sec='+id_seccion+'&codigo_video='+cod_video+'&descripcion='+descrip_video;
    $.ajax({
            type: "GET",
            dataType: "json",
            url: "/liberatucurso/data/F_ingresar_datos.php",
            data: dataString,    
            success: function(data) {
                    $('#progressbar_vid').fadeIn(1);
                  setTimeout(function(){
                      $('#progressbar_vid').fadeOut(50);
                      $('<p>El video se ha registrado</p>').appendTo('#mensaje_vid');}
                  ,2000);
            }
        });
    }

