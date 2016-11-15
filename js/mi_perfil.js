$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });   
});

$('#bto_foto').click(function(){
	
        var baseURL         = $('body').data('baseurl');//url base
        
	var foto_perfil = document.getElementById("upload_foto");
        var perfil      = $("#perfil").val();
	var file = foto_perfil.files[0];
	var datos = new FormData();

	datos.append('case', 1);
	datos.append('foto_perfil', file);

	$.ajax({
		url:baseURL + 'perfil_admin/ajax/',
		type:'POST',
		contentType:false,
		data: datos,
		dataType: 'json',
		processData:false,
		cache:false,
        success: function(result){  
            
            //Validar tipo de paciente    
            if(perfil == 4){//Paciente
                var src = baseURL + 'img/pacientes/';            	    
            }else{
                var src = baseURL + 'img/foto_perfil/';            	    
            }
            
            if(result.estado == 'true'){
            	$("#img_perfil").attr( "src", src + result.imagen);
        		$("#bar_foto_perfil").attr( "src", src + result.imagen);
            	swal("Éxito", "Imagen de perfil actualizada", "success")
            }else{
            	sweetAlert("Error", "Asegúrese de seleccionar un archivo", "error");
            }            
        }        
	});
});


