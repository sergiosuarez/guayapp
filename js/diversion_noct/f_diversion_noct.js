/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*===========================================
 *cargar_combo_tipo: Carga los tipos de atractivos turisticos
 *a un combobox.
 *===========================================*/
/*function cargar_combo_tipo(id){
    var dataString='tipo=cargar_atractivos';
    var items_select;
      $.ajax({
          type: "GET",
          dataType:"json",
          url: "/guayapp/data/F_mostrar_datos.php",
          data: dataString,

          success: function(data) {
              if(data.items!=null){
                   $.each(data.items, function(i,data){
                       items_select="<option value='link pagina'>"+data.des+"</option>";
                        $(registro).appendTo("#tipo_atract_turistic");


                   });
                  //$(registro).appendTo("#tipo_atract_turistic");
              }

         }
       });
}*/



function mapa(longitud, latitud, msje){
    
    var map = new GMap2(document.getElementById("map"),
    {
        mapTypes:[G_SATELLITE_MAP, G_NORMAL_MAP, G_HYBRID_MAP]
    });
    map.setCenter(new GLatLng(longitud,latitud), 18);
    map.addControl(new GMapTypeControl(2));
    map.addControl(new GLargeMapControl());

    map.enableContinuousZoom();
    map.enableDoubleClickZoom();

    var icon = new GIcon();
    icon.image = "http://labs.google.com/ridefinder/images/mm_20_red.png";
    icon.shadow = "http://labs.google.com/ridefinder/images/mm_20_shadow.png";
    icon.iconSize = new GSize(12, 20);
    icon.shadowSize = new GSize(22, 20);
    icon.iconAnchor = new GPoint(6, 20);
    icon.infoWindowAnchor = new GPoint(5, 1);

    
    if(msje=="SI")
        document.getElementById("location").value=longitud+","+latitud;
    else
        document.getElementById("location").value="No pose coordenadas";
    var point = new GLatLng(longitud,latitud);
    var markerD = new GMarker(point, {
        icon:icon,
        draggable: true
    });
    map.addOverlay(markerD);

    markerD.enableDragging();

    GEvent.addListener(markerD, "drag", function(){
        document.getElementById("location").value=markerD.getPoint().toUrlValue();
    });

    GEvent.addListener(map, "mousemove", function(point){
        document.getElementById("mouse").value=point.toUrlValue();
    });
}



/*===================================================================
 * pop_up_subir_archivo: Guarda la imagen en el servidor y 
 * los datos de la misma en la base.
 *-id_div: id del div que contiene el formulario.                     
 *-id_boton_subir: id del boton que carga la ventana.
 *=====================================================================*/
    
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
                        // OJO Modificar estos parámetros q van a la tabla////////
                        'tipo': '   ', 
                        'tipo_multimedia':'imagen',
                        'id_sec': id_seccionx,
                        'nom_artic': nombre_articulo,
                        'nom_usuario':nombre_usuario
                        ///////////////////////////////
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
        document.getElementById(id_div).className='windowLoadsubir_img';
    
}

/*===================================================================
 * pop_up_subir_archivo: Guarda la imagen en el servidor y 
 * los datos de la misma en la base.
 *-id_div: id del div que contiene el formulario.                     
 *-id_boton_abrir: id del boton que carga la ventana.
 *=====================================================================*/
    
function pop_up_ubicar_geograficamente(id_div,id_boton_abrir)  {
      
        //modificar estos parametros
         var posicion_actual=$('#nom_artic').val();

         var dataString='tipo=cargar_atractivos';
         $.ajax({
          type: "GET",
          dataType:"json",
          url: "/guayapp/data/F_ingresar_datos.php",
          data: dataString,

          success: function(data) {
              if(data.items!=null){
                //mensaje que indica que esta todo bien
                  
              }

         }
       });
        
        
        //$('#progressbar_img').css('display','none');
        document.getElementById('sombra').className='sombraLoad';
        document.getElementById(id_div).className='windowLoadubicacion_geo';
    
}


/*======================================
* pop_up_cerrar_ventana: cierra una ventana pop up
* id_ventana: recibe el id de la ventana a cerrar.
========================================*/
function pop_up_cerrar_ventana(id_ventana){
    $("#descripcion_img").val("");
    $('#mensaje_img').empty();
    document.getElementById('sombra').className='sombraUnload';
    document.getElementById(id_ventana).className='windowUnload';
}


/////////////////////////////LLAMADA DE LOS METODOS CREADOS////////////////////
$(document).ready(function(){

            /***Botones del pop up subir imagen***/
             mapa(-2.139975, -79.883539, "SI");

            $('#btn_abrir_pop_up_subir_img').click(function(){
                pop_up_subir_archivo('ventana_subir_archivo','#btn_enviar_img');
            });

            $('#btn_cerrar_pop_up_subir_img').click(function(){
                pop_up_cerrar_ventana('ventana_subir_archivo');
            });

            /******Botones del pop up ubicación geografica ********/
            $('#btn_abrir_pop_up_ubica_geo').click(function(){
                pop_up_ubicar_geograficamente('ventana_ubicacion_geografica','#btn_guardar_ubica_geo');
            });

            $('#btn_cerrar_pop_up_cerrar_ubica_geo').click(function(){
                pop_up_cerrar_ventana('ventana_ubicacion_geografica');
            });




        });


