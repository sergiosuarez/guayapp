/* ===================================================
 |
 |Descripción:
 |Archivo que contiene las funciones que interactua con el webservice
 |
 |Autor: Gabriel Romero
 *===================================================*/


function cargar_registros_informacion_ws(){
              var dataString='tipo=cargar_informacion_util';
              $.ajax({
                  type: "GET",
                  dataType:"json",
                  url: "/guayapp/data/F_mostrar_datos.php",
                  data: dataString,

                  success: function(data) {
                      if(data.items!=null){
                          insertar_registros_informacion_app(data);
                      }
                      else
                        $('#tbl_registros_informacion').html("<p>No existen articulos creados</p>")
                      }
               });
    
}

/*Coloca los registros en el browser */
 function insertar_registros_informacion_app(data){
       var registro;
       var fila=0;
       var str_class;
       
       $.each(data.items, function(i,data){
             fila++;
             if(fila%2==0){
                 str_class='';
             }else{
                 str_class='even gradeA';
             }

             registro="<tr class='"+str_class+"' id="+data.in_id+">"+
                "<td>"+fila+"</td>"+
                "<td  >"+data.in_descripcion+"</td>"+
                "<td style='text-align: center'><a onclick=ir_editar_registro("+data.in_id+")><img src='../../images/edit_icon.png'></a></td>"+
                "<td style='text-align: center'><a href='#'><img src='../../images/trash_icon.png'></a></td>"+
              "</tr>";

            $(registro).appendTo("#tbl_registros_informacion");
            
      });
}

function ir_editar_registro(id_registro){
    //window.location.href="form_ingreso_informacion.php?id_registro="+id_registro;
    window.location="form_ingreso_informacion.php?id_registro="+id_registro;
    
}

function cargar_registroxid(id_registro){
    
     var dataString='tipo=cargar_informacion_utilXid&id_registro='+id_registro;
              $.ajax({
                      type: "GET",
                      dataType:"json",
                      url: "/guayapp/data/F_mostrar_datos.php",
                      data: dataString,

                      success: function(data) {
                          if(data.items!=null){
                              
                              $('#txta_descripcion').val(data.items[0].in_descripcion);
                          }

                      }
               });

}


/*function eliminar_registros_informacion_app(id){
              var dataString='tipo=eliminar_informacion_util&id='+id;
              $.ajax({
                  type: "GET",
                  dataType:"json",
                  url: "/guayapp/data/F_ingresar_datos.php",
                  data: dataString,

                  success: function(data) {
                      if(data.items!=null){
                          insertar_registros_informacion_app(data);
                      }
                      else
                        $('#tbl_registros_informacion').html("<p>No existen articulos creados</p>")
                      }
               });

    
}*/



$(document).ready(function(){

            //Cargar los registros de información
            cargar_registros_informacion_ws();
            setTimeout(function(){
                $('#tbl_registros_informacion').dataTable();
            },800);

            //acción del boton registros
            $('#btn_registros').click(function(){
                //Limpia cada elemento del formulario
                
                 //Refirecciona a la consulta de los registros de información
                $('#btn_registros').attr("href","informacion.php");

           });

           var id_registro=$("#id_registro").val();
           cargar_registroxid(id_registro);
});