<!DOCTYPE html>
<!-- release v4.3.5, copyright 2014 - 2016 Kartik Visweswaran -->
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Krajee JQuery Plugins - &copy; Kartik</title>
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../js/fileinput.js" type="text/javascript"></script>
        <script src="../js/locales/es.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <?php
        
        //Cargar archivos css
        foreach ($files['style'] as $file_css){ ?>
    
        <link rel="stylesheet" href="<?=$file_css?>" />
        
        <?php } ?>
        
    </head>
    <body>
        <div class="container kv-main">
            <h4>Examen Fisico</h4>
                <label></label>
                <input id="archivos" name="imagenes[]" type="file" multiple="true" class="file-loading">
            <hr>
            <br>
        </div>

        <?php 	
            $directory = "archivos_/";      
            $archivos = glob($directory . "*.*");
        ?>
        
        
         <?php
         
        //Cargar archivos js
        foreach ($files['script'] as $file_js){ ?>
    
        <script type="text/javascript" src="<?=$file_js;?>" ></script>
    
        <?php } ?>
        
    </body>
	<script>
    $('#archivos').fileinput({
        uploadUrl: "<?php echo base_url(); ?>consulta_medica/upload_files",
        deleteUrl: "<?php echo base_url(); ?>consulta_medica/delete_files",
        maxFilePreviewSize: 10240,
        uploadAsync: true,
        minFileCount: 1,
        maxFileCount: 20,
        showUpload: false, 
        showRemove: false,
        language: 'es',
        allowedFileExtensions : ['jpg', 'png','gif','pdf','csv','doc','docx','xls','xlsx','ppt','pptx','avi','mpg','mkv','mov','3gp','webm','wmv','flv','mp3','mp4','wav'],
		initialPreview: [
			<?php foreach($archivos as $archivo){

				$arch 	= explode(".",$archivo);
				$ext 	= $arch[1];

				switch ($ext) {
					
					case 'mp4': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'avi': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'mpg': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'mkv': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'mov': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case '3gp': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'webm': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'wmv': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;
					case 'flv': ?>
					'<video src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>',
					<?php break;

					case 'mp3': ?>
					'<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="<?php echo base_url().$archivo; ?>"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>',
					<?php break;
					case 'wav': ?>
					'<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="<?php echo base_url().$archivo; ?>"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>',
					<?php break;
											
					case 'jpg': ?>
					'<img src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">',
					<?php break;
					case 'png': ?>
					'<img src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">',
					<?php break;
					case 'gif': ?>
					'<img src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">',
					<?php break;
					
					case 'pdf': ?>
					'<embed class="kv-preview-data" height="160px" width="160px" type="application/pdf" src="<?php echo base_url().$archivo; ?>">',
					<?php break;

					case 'xls': ?>
				    '<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="<?php echo base_url().$archivo; ?>" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="<?php echo base_url().$archivo; ?>"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>',
					<?php break;
					case 'xlsx': ?>
				    '<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="<?php echo base_url().$archivo; ?>" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="<?php echo base_url().$archivo; ?>"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>',
					<?php break;
					case 'ppt': ?>
				    '<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="<?php echo base_url().$archivo; ?>" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="<?php echo base_url().$archivo; ?>"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>',
					<?php break;
					case 'pptx': ?>
				    '<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="<?php echo base_url().$archivo; ?>" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="<?php echo base_url().$archivo; ?>"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>',
					<?php break;
					case 'doc': ?>
				    '<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="<?php echo base_url().$archivo; ?>" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="<?php echo base_url().$archivo; ?>"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>',
					<?php break;
					case 'docx': ?>
				    '<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="<?php echo base_url().$archivo; ?>" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="<?php echo base_url().$archivo; ?>"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>',
					<?php break;

					default: ?>
					'<img src="<?php echo base_url().$archivo; ?>" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">',
					<?php break;
				}
			}
			?>
		],
	    initialPreviewConfig: [
	    <?php foreach($archivos as $archivo){ $infoArchivos=explode("/",$archivo);?>
		{caption: "<?php echo $infoArchivos[1];?>",  height: "120px", url: "<?php echo base_url(); ?>consulta_medica/delete_files", key:"<?php echo $infoArchivos[1];?>"},
		<?php } ?>
		]
    }).on("filebatchselected", function(event, files) {
	
	$("#archivos").fileinput("upload");
		
	});
	</script>
</html>