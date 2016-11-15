//AL MOMENTO DE CARGAR LA PAGINA CARGA ESTO
$(document).ready(function() {
    
    //CARGA TABLA DE PACIENTES
    listado_consultas_medicas();
    
    var baseURL         = $('body').data('baseurl');//url base
    var id_paciente     = $("#id_paciente").val();
    
    $('#guardar_cambios').click(function(event) {

        event.preventDefault();
        
        //información del formulario
        var formData        = new FormData(document.getElementById("form_ficha_clinica"));
        var baseURL         = $('body').data('baseurl');//url base
        var id_paciente     = $("#id_paciente").val();
        var id_h_clinica    = $("#id_historia_med").val();
        
        //hacemos la petición ajax  
        $.ajax({
            type: "POST",
            url: baseURL+"ficha_medica/guardar",
            secureuri : false,
            //fileElementId :'logo',
            //dataType: 'json',
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            /*beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },*/
            success: function(res) {
                
                //Ficha clinica modificada correctamente
                if(res == "success")
                {   
                    swal({ 
                        title:"Historia Clínica Editada Correctamente",
                        text:"haz click en 'OK' para volver a la historia clínica!",
                        type:"success" 
                    },
                    function(){
                        //window.location.href = 'login.html';
                        var url = baseURL+"ficha_medica/ver_detalle/"+id_paciente+"/"+id_h_clinica;   
                        $(location).attr('href',url);
                    });
                    
                }else if(res == "error"){//Error al editar informacion de la historia clínica

                    swal({ 
                        title: "Error al editar historia clínica",
                        text:  "Por favor inténtelo nuevamente!",
                        type:  "error" 
                    },
                    function(){
                        var url = baseURL+"ficha_medica/ver_detalle/"+id_paciente+"/"+id_h_clinica;
                        $(location).attr('href',url);
                    });

                }else{//Error en la valición de datos    

                    var html = ''+res+'';
                    var errores = $(html).text();
                                       
                    swal({ 
                        title: "Error de validación",
                        text:   errores,
                        type:  "error"
                    });
                }
            }
        });
    });
    
});

//FUNCION QUE PERMITE VER INFORMACION DE UNA CONSULTA MEDICA (Sin Realizar)
function ver_info_consulta_med(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#info_detalle').html('<i class="fa fa-spinner fa-spin fa-5x"></i> Cargando Información Consulta Médica...');
    
    $.ajax({
        data: {"id_consulta_med" : id_consulta_medica},
        type: "POST",
        dataType: "html",
        url: baseURL+"ficha_medica/detalle_consulta_medica",
        success: function(resp){
            
            //Cargamos datos revision por sistema
            $('#info_detalle').html(resp);
        }
    });
}

//Muestra informacion revision por sistemas
function ver_revision_sistema(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#info_detalle').html('<i class="fa fa-spinner fa-spin fa-5x"></i> Cargando Información Revisión Por Sistemas...');
    
    $.ajax({
        data: {"id_consulta_med" : id_consulta_medica},
        type: "POST",
        dataType: "html",
        url: baseURL+"ficha_medica/detalle_rev_sistema",
        success: function(resp){
            
            //Cargamos datos revision por sistema
            $('#info_detalle').html(resp);
            
            //Cargamos arvhicos multimedias
            cargar_archivos_rs(id_consulta_medica);
        }
    });
}

//Archivos multimedia revision por sistemas
function cargar_archivos_rs(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $.ajax({
        data: {"id_consulta_med" : id_consulta_medica},
        type: "POST",
        dataType: "json",
        url: baseURL+"ficha_medica/archivos_rev_sis",
        success: function(archivos_rs){
            
            var archivos = [];
            var PreviewConfig = [];
            
            for (i = 0; i < archivos_rs.length; i++) { 
                
                var ext = archivos_rs[i].split(".");
                
                //Verificar formato de los archivos (21 formatos distintos)
                switch (ext[1]) {
                    
                    //ARCHIVOS CON FORMATO DE VIDEO
                    case 'mp4':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'avi':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'mpg':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'mkv':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'mov':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case '3gp':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'webm':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'wmv':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'flv':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVOS CON FORMATO DE AUDIO    
                    case 'mp3':
                        archivos[i]         = '<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'+baseURL+archivos_rs[i]+'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'wav':
                        archivos[i]         = '<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'+baseURL+archivos_rs[i]+'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO DE IMAGEN
                    case 'jpg':
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'png':
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'gif':
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO PDF    
                    case 'pdf':
                        archivos[i]         = '<embed class="kv-preview-data" height="100px" width="100px" type="application/pdf" src="'+baseURL+archivos_rs[i]+'">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, type: "pdf",size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO EXCEL    
                    case 'xls':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;    
                    case 'xlsx':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';   
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVOS CON FORMATO POWER POINT
                    case 'ppt':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';    
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'pptx':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO DOCUMENTO
                    case 'doc':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'docx':
                        archivos[i]         = "formato docx ";
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                        
                    default: 
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                }
            }
            
            //Archivos multimedias revision por sistema
            $('#archivos_rs').fileinput({
                uploadUrl: baseURL + "ficha_medica/upload_files",
                //deleteUrl: "",
                maxFilePreviewSize: 10240,
                uploadAsync: false,
                showUploadedThumbs: false,
                layoutTemplates: {actionDelete: ''}, // disable thumbnail deletion
                //minFileCount: 1,
                maxFileCount: 20,
                overwriteInitial: false,
                showUpload: false, 
                showRemove: false,
                language: 'es',
                initialPreviewAsData: true, 
                initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                allowedFileExtensions : ['jpg', 'png','gif','pdf','csv','doc','docx','xls','xlsx','ppt','pptx','avi','mpg','mkv','mov','3gp','webm','wmv','flv','mp3','mp4','wav'],
                initialPreview: archivos,
                initialPreviewConfig: PreviewConfig
            }).on("filebatchselected", function(event, files) {

                $("#archivos_rs").fileinput("upload");

            });
        }
    });
}

function ver_examen_fisico(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#info_detalle').html('<i class="fa fa-spinner fa-spin fa-5x"></i> Cargando Información Examen Físico...');
    
    $.ajax({
        data: {"id_consulta_med" : id_consulta_medica},
        type: "POST",
        dataType: "html",
        url: baseURL+"ficha_medica/detalle_examen_fisico",
        success: function(resp){
            
            //Cargamos datos revision por sistema
            $('#info_detalle').html(resp);
            
            //Cargamos arvhicos multimedias
            cargar_archivos_ef(id_consulta_medica);
        }
    });
}

function cargar_archivos_ef(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $.ajax({
        data: {"id_consulta_med" : id_consulta_medica},
        type: "POST",
        dataType: "json",
        url: baseURL+"ficha_medica/archivos_ex_fisico",
        success: function(archivos_rs){
            
            var archivos = [];
            var PreviewConfig = [];
            
            for (i = 0; i < archivos_rs.length; i++) { 
                
                var ext = archivos_rs[i].split(".");
                
                //Verificar formato de los archivos (21 formatos distintos)
                switch (ext[1]) {
                    
                    //ARCHIVOS CON FORMATO DE VIDEO
                    case 'mp4':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'avi':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'mpg':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'mkv':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'mov':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case '3gp':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'webm':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'wmv':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'flv':
                        archivos[i]         = '<video src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" controls style="width:auto;height:100px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVOS CON FORMATO DE AUDIO    
                    case 'mp3':
                        archivos[i]         = '<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'+baseURL+archivos_rs[i]+'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'wav':
                        archivos[i]         = '<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'+baseURL+archivos_rs[i]+'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO DE IMAGEN
                    case 'jpg':
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'png':
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'gif':
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO PDF    
                    case 'pdf':
                        archivos[i]         = '<embed class="kv-preview-data" height="100px" width="100px" type="application/pdf" src="'+baseURL+archivos_rs[i]+'">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, type: "pdf",size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO EXCEL    
                    case 'xls':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;    
                    case 'xlsx':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';   
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVOS CON FORMATO POWER POINT
                    case 'ppt':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';    
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'pptx':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    //ARCHIVO CON FORMATO DOCUMENTO
                    case 'doc':
                        archivos[i]         = '<object height="100px" width="100px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'+baseURL+archivos_rs[i]+'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'+baseURL+archivos_rs[i]+'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                    case 'docx':
                        archivos[i]         = "formato docx ";
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                        break;
                        
                    default: 
                        archivos[i]         = '<img src="'+baseURL+archivos_rs[i]+'" class="kv-preview-data file-preview-image" style="width:auto;height:100px;">';
                        var nom_archivo     = archivos_rs[i].split("/");//Nombre del archivo
                        PreviewConfig[i]    = {previewAsData: false, size: 0, caption: nom_archivo[1], url: "", key: i};
                }
            }
            
            //Archivos multimedias revision por sistema
            $('#archivos_ef').fileinput({
                uploadUrl: baseURL + "ficha_medica/upload_files",
                //deleteUrl: "",
                maxFilePreviewSize: 10240,
                uploadAsync: false,
                showUploadedThumbs: false,
                layoutTemplates: {actionDelete: ''}, // disable thumbnail deletion
                //minFileCount: 1,
                maxFileCount: 20,
                overwriteInitial: false,
                showUpload: false, 
                showRemove: false,
                language: 'es',
                initialPreviewAsData: true, 
                initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                allowedFileExtensions : ['jpg', 'png','gif','pdf','csv','doc','docx','xls','xlsx','ppt','pptx','avi','mpg','mkv','mov','3gp','webm','wmv','flv','mp3','mp4','wav'],
                initialPreview: archivos,
                initialPreviewConfig: PreviewConfig
            }).on("filebatchselected", function(event, files) {

                $("#archivos_ef").fileinput("upload");

            });
        }
    });
}

//FUNCION QUE PERMITE ELIMINAR UNA CONSULTA MEDICA
function eliminar_consulta_med(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    swal({   
        title: "¿Estas seguro de eliminar consulta médica n° "+id_consulta_medica+"?",   
        text: "Recuerda que... sera eliminado!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, eliminalo!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false 
    }, 
    function(){
        
        //Iniciar peticion con ajax
        $.ajax({
            data: {"id_consulta_med" : id_consulta_medica},
            type: "POST",
            //dataType: "json",
            url: baseURL+"ficha_medica/eliminarConsultaMed"
        })
       .done(function(data,textStatus,jqXHR ) {         
            
            if(data === "success"){//La solicitud se realizo correctamente
                
               //Consulta medica eliminada correctamente 
               swal({ 
                    title: "Consulta Médica eliminada!",
                    text:  "consulta médica n° "+id_consulta_medica+" fue eliminada correctamente.",
                    type:  "success" 
                },
                function(){
                    //recargar tabla de consultas medicas
                    listado_consultas_medicas();
                });
                
            }else{
                
                swal({ 
                    title: "Ha ocurrido un error",
                    text:  "Por favor intente nuevamente",
                    type:  "error" 
                });
                
                return false;
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {

            if(textStatus === "error") {//La solicitud a fallado
                alert("Error: "+textStatus+" "+jqXHR);
                console.log("La solicitud a fallado: " +  textStatus);
                console.log(textStatus+" "+jqXHR);
                
                swal({ 
                    title: "Error: "+textStatus+" "+jqXHR,
                    text:  "",
                    type:  "error" 
                });
            }
        });
    });
    
    return false;
}

//FUNCION QUE PERMITE CARGAR TABLA DE PACIENTES
function listado_consultas_medicas(){
    
    var id_paciente = $("#id_paciente").val();
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#consultas_medicas').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"ficha_medica/listado_consultas_med/"+id_paciente,//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "id_consulta"},
            { "data": "fecha" },
            { "data": "motivo_consulta" },
            //{ "data": "anamnesis_proxima" },
            { "data": "acciones"}
        ],
        columnDefs: [
            { type: 'date-eu', //ordena fecha
              targets: 0
            }
        ],
        order: [[ 0, "desc" ]],//orden by por fecha de creacion
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
            }
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        responsive: false,//tabla responsive, agrega un boton
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": baseURL+"swf/copy_csv_xls_pdf.swf",//archivos necesario para que funcione
            "aButtons": [ //botones que sirven para exportar informacion de la tabla
                {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                },
                {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                },
                {
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }                
            ]
        }
    });
}

//FUNCION QUE PERMITE MOSTRAR UN MODAL CON LA INFORMACION DE UN PACIENTE
function ver_datos_paciente(id_paciente){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#datos_paciente').html('<i class="fa fa-spinner fa-spin fa-5x"></i> Cargando...');
    
    $.ajax({
        data: {"id_paciente" : id_paciente},
        type: "POST",
        dataType: "json",
        url: baseURL+"paciente_admin/dataPaciente"
    })
    .done(function(data,textStatus,jqXHR ) {         
        
        if(textStatus === "success"){//La solicitud se realizo correctamente
            
            var nombre  =   data.primer_nombre+' '+data.segundo_nombre+' '+
                            data.apellido_paterno+' '+data.apellido_materno;
            
            var personas_contacto = Object.keys(data.personas_contacto).length;
            
            var html_personas_contacto = "";//personas de contacto
            
            //crear html de las personas de contacto
            for (i = 0; i < personas_contacto; i++) { 

               html_personas_contacto += '<tr>'+
               '<td>'+data.personas_contacto[i].nombres+'</td>'+
               '<td>'+data.personas_contacto[i].apellidos+'</td>'+
               '<td>'+data.personas_contacto[i].correo+'</td>'+
               '<td>'+data.personas_contacto[i].parentesco+'</td>'+
               '</tr>';
           }
            
            var modal = '<div class="row">'+
                '<div class="col-xs-12 col-md-3">'+
                  '<a href="#" class="thumbnail">'+
                    '<img src="'+baseURL+'img/sin-foto.png" alt="...">'+
                  '</a>'+
                '</div>'+
                '<div class="col-xs-12 col-md-9">'+
                    '<p><strong>R.U.T:</strong> '+data.rut+'</p>'+
                    '<p><strong>Nombre:</strong> '+nombre+'</p>'+    
                    '<p><strong>Genero:</strong> '+data.genero+'</p>'+
                    '<p><strong>Edad:</strong> '+data.edad+'</p>'+
                '</div>'+
            '</div>'+
            '<div id="accordion" class="panel-group">'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h5 class="panel-title">'+
                            '<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" class="collapsed">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Datos de Identificación'+
                            '</a>'+
                        '</h5>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseOne" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                            '<div class="table-responsive">'+
                                '<table class="table table-striped">'+
                                     '<tbody>'+
                                        '<tr>'+
                                           '<td><strong>Correo:</strong></td>'+
                                           '<td>'+data.email+'</td> '+
                                           '<td><strong>Estado Civil:</strong></td>'+
                                           '<td>'+data.estado_civil+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>Telefono fijo:</strong></td>'+
                                           '<td>'+data.telefono+'</td>'+
                                           '<td><strong>Celular:</strong></td>'+
                                           '<td>'+data.celular+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>Religión:</strong></td>'+
                                           '<td>'+data.religion+'</td>'+
                                           '<td><strong>Previsión méd.:</strong></td>'+
                                           '<td>'+data.prevision+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>País de res.:</strong></td>'+
                                           '<td>'+data.nacionalidad+'</td>'+
                                           '<td></td>'+
                                           '<td></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>N. de estudio:</strong></td>'+
                                            '<td colspan="3">'+data.nivel_estudio+'</td>'+
                                        '</tr>'+
                                       '<tr>'+
                                            '<td><strong>Fecha Nac.:</strong></td>'+
                                            '<td>'+data.fecha_nac+'</td>'+
                                            '<td><strong></strong></td>'+
                                            '<td></td>'+
                                        '</tr> '+
                                        '<tr>'+
                                            '<td><strong>Lugar de Nac.:</strong></td>'+
                                            '<td colspan="3">'+data.lugar_nac+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Ocupación:</strong></td>'+
                                            '<td colspan="3">'+data.ocupacion+'</td>'+
                                        '</tr>'+
                                     '</tbody>'+
                                 '</table>'+
                             '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h4 class="panel-title">'+
                            '<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Datos de Residencia Actual'+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                            '<div class="table-responsive">´'+
                                '<table class="table table-striped">'+
                                    '<tbody>'+
                                        '<tr>'+
                                            '<td><strong>Región:</strong></td>'+
                                            '<td colspan="3">'+data.region+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Provincia:</strong></td>'+
                                            '<td colspan="3">'+data.provincia+'</td>'+
                                        '</tr>'+
                                       '<tr>'+
                                            '<td><strong>Comuna:</strong></td>'+
                                            '<td colspan="3">'+data.comuna+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Calle/pasaje/villa:</strong></td>'+
                                            '<td colspan="3">'+data.calle+'</td>'+
                                        '</tr>'+
                                    '</tbody>'+
                                '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="panel panel-default">'+
                   '<div class="panel-heading">'+
                        '<h4 class="panel-title">'+
                            '<a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Gr. Sanguineo/ F. RH'+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseThree" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                                '<div class="table-responsive">'+
                                '<table class="table table-striped">'+
                                    '<tbody>'+
                                        '<tr>'+
                                           '<td><strong>Grupo Sanguíneo:</strong></td>'+
                                           '<td>'+data.grupo_sang+'</td>'+
                                           '<td><strong>Factor RH:</strong></td>'+
                                           '<td>'+data.factor_rh+'</td>'+
                                        '</tr>'+
                                    '</tbody>'+
                                '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h4 class="panel-title">'+
                            '<a href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Personas de Contacto'+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseFour" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                            '<table class="table table-striped">'+
                                '<thead>'+
                                  '<tr>'+
                                    '<th>Nombres</th>'+
                                    '<th>Apellidos</th>'+
                                    '<th>Email</th>'+
                                    '<th>Parentesco</th>'+
                                  '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                html_personas_contacto+
                                '</tbody>'+
                              '</table>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
                        
            $('#datos_paciente').html(modal);  
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
         
        if(textStatus === "error") {//La solicitud a fallado
            
            console.log( "La solicitud a fallado: " +  textStatus);
            console.log(textStatus+" "+jqXHR);
        }
    });
}


