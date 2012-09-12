/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function obtener_login(){
     var txt_usuario = $("#txt_usuario").val();
     var txt_clave = $("#txt_clave").val();

     var dataString='txt_usuario='+txt_usuario+'&txt_clave='+txt_clave;
     $.ajax({
      type: "GET",
      dataType:"json",
      url: "/guayapp/data/login.php",
      data: dataString,
      success: function(data) {
         if(data.items!=null)
            window.location="/guayapp/ingreso.php";
          else
            alert("Usuario o clave incorrecta");
      }
     });

 }

 $(document).ready(function(){
    /*Validación del formulario login de la pagina index.php*/
           $('#form_login').each (function(){
                  this.reset();
                });

         $("#submit").click(
            function(){
                var indicar_foco=0;
                var entrar=true;
                if($("#txt_usuario").val()==""){

                    // mensaje_tooltip("#txt_usuario","Ingrese su usuario");
                    indicar_foco++;
                    entrar=false;
                }

                if($("#txt_clave").val()==""){
                    $("#msj_login").toggle(200);

                    //mensaje_tooltip("#txt_clave","Ingrese su clave");
                    indicar_foco++;
                    entrar=false;
                }

                if(indicar_foco==2){
                    $("#txt_usuario").focus();
                }

                if(entrar){
                    obtener_login();
                }
            }
        );




});
