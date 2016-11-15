/* 
 * Script que permite cargar automaticamente selects.
 * Este ejemplo permite cargar automaticamente selects
 * region - provincias - comunas
 */
$(document).ready(function() {

    var baseURL = $('body').data('baseurl');
    
    $("#region").change(function() {

        $("#region option:selected").each(function() {

            region = $('#region').val();

            $.post(baseURL+"perfil_admin/llena_provincias", {
                
                region : region

            }, function(data) {
                
                $("#provincia").html(data);
            });
        });
    });


    $("#provincia").change(function() {

        $("#provincia option:selected").each(function() {

            provincia = $('#provincia').val();

            $.post(baseURL+"perfil_admin/llena_comunas", {
                
                provincia : provincia

            }, function(data) {

                $("#comuna").html(data);
            });
        });
    });
});
