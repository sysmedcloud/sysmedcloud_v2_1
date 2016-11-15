// Gestion de datos (Mantenedores)
$(document).ready(function() {    
    render_grafico_balance();
});


/**************************************************************************/
/** @Function que renderiza el grafico de pie para el dashboard de datos
/**************************************************************************/

function render_grafico_balance(){
	$('#grafico_pie2').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Balance de Datos'
        },
        subtitle: {
            text: 'Balance de datos en plataforma'
        },
        xAxis: {
            categories: ''
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total de preguntas (t)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="blue">Hola </td>' +
                '<td style="padding:0"><b>{point.y:.1f} total</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
		    name: 'hola',
		    data: [1,2,3]
		}]
    });

    $('#grafico_pie').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Balance de Datos'
        },
        subtitle: {
            text: 'Balance de datos en plataforma'
        },
        xAxis: {
            categories: ''
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total de preguntas (t)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="blue">Hola </td>' +
                '<td style="padding:0"><b>{point.y:.1f} total</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'hola',
            data: [1,2,3]
        }]
    });
}


/**************************************************************************/
/** @Function que permite seleccionar el tipo de dato a cargar
/**************************************************************************/
function modal_info() {
    html = '';
    html += '<table class="table" text-align="left">';
    html += '<thead>';
    html += '</thead>';
    html += '<tbody>';
    html += '<tr>';
    html += '  <td><input type="radio" value="1" name="data-gestion" checked="checked"><b> &nbsp;Alergias</b></td>';
    html += '  <td><input type="radio" value="2" name="data-gestion"><b> &nbsp;Patologías</b></td>';
    html += '</tr>';
    html += '<tr>';
    html += '  <td><input type="radio" value="3" name="data-gestion"><b> &nbsp;Medicamentos</b></td>';
    html += '  <td><input type="radio" value="4" name="data-gestion" disabled title="no disponible"><b> &nbsp;Vacunas</b></td>';
    html += '</tr>';
    html += '<tr>';
    html += '  <td><input type="radio" value="5" name="data-gestion" disabled title="no disponible"><b> &nbsp;Tratamientos</b></a></td>';
    html += '  <td><input type="radio" value="6" name="data-gestion"><b> &nbsp;Diagnósticos</b></td>';
    html += '</tr>';
    html += '</tbody>';
    html += '</table>';

    $('#gestion_datos').modal('toggle');
    $('#modal-data').html(html);
}

/**************************************************************************/
/** @Function que permite mostrar las opciones asociadas al CRUD
/**************************************************************************/

function mostrar_opciones() {
    html = '';
    html += '<table class="table" text-align="left">';
    html += '<thead>';
    html += '</thead>';
    html += '<tbody>';
    html += '<tr>';
    html += '  <td><input type="radio" value="1" name="data-crud" checked="checked"><b> &nbsp;Ver / Editar Información</b></td>';
    html += '  <td><input type="radio" value="2" name="data-crud"><b> &nbsp;Agregar Información</b></td>';
    html += '  <td><input type="radio" value="3" name="data-crud"><b> &nbsp;Eliminar Información</b></td>';
    html += '</tr>';
    html += '</tbody>';
    html += '</table>';

    $('#gestion_datos').modal('hide');
    $('#crud_datos').modal('toggle');
    $('#modal-data-sm').html(html);

    var tipo_dato = $('input[name="data-gestion"]:checked').val();


    $('#bto_crud').click(function() {
        var opcion = $('input[name="data-crud"]:checked').val();
        crud_datos(tipo_dato, opcion);
    });
}

/**************************************************************************/
/** @Function que permite cargar, actualizar o eliminar informacion 
	del sistema
/**************************************************************************/

function crud_datos(dato, opcion) {
    
    var baseURL         = $('body').data('baseurl');//url base
    
    $('#middle').hide('fast');
    $('#crud_datos').modal('hide');
    var tipo = parseInt(dato);
    var opt = parseInt(opcion);
    var datos = {
        tipo: tipo,
        case: opt
    };
    $.ajax({
        type: "POST",
        url: baseURL + 'gestion/ajax/',
        data: datos,
        dataType: 'JSON',
        success: function(result) {
            var dato = parseInt(result.tipo);
            switch (dato) {
                case 1: // Alergias
                    $('#ibox-wrapper').show();
                    $('#spntipo').text("Alergias");
                    $('#alergias').html(result.html);
                    break;
                case 2: // Patologias
                    $('#ibox-wrapper').show();
                    $('#spntipo').text("Patologías");
                    $('#patologias').html(result.html);
                    break;
                case 3: // Medicamentos				 		
                    $('#ibox-wrapper').show();
                    $('#spntipo').text("Medicamentos");
                    $('#medicamentos').html(result.html);
                    break;
                case 4: // Vacunas
                    $('#ibox-wrapper').show();
                    $('#spntipo').text("Vacunas");
                    $('#vacunas').html(result.html);
                    break;
                case 5: // Tratamientos
                    $('#ibox-wrapper').show();
                    $('#spntipo').text("Tratamientos");
                    $('#alergias').html(result.html);
                    break;
                case 6: // Diagnosticos
                    $('#ibox-wrapper').show();
                    $('#spntipo').text("Diagnósticos");
                    $('#diagnosticos').html(result.html);
                    break;
            }
        }
    });
}

/**************************************************************************/
/** @Function que permite visualizar la informacion asociada a un dato
/**************************************************************************/
function ver_dato(tipo, id, opt) {
    
    var baseURL         = $('body').data('baseurl');//url base
    
	if(opt == 1){
		$('#mod_title').text('Ver información');
		$('#bto_actualizar_datos').hide();	
		
	}else if (opt == 2){
		$('#mod_title').text('Editar información');	
		$('#bto_actualizar_datos').show();
		$('#inp_tipo').val(tipo);			
	}

	var datos = {
        tipo: 	tipo,
        id: 	id,
        case: 	6,
        opt : 	opt
    };
    $.ajax({
        type: "POST",
        url: baseURL + 'gestion/ajax/',
        data: datos,
        dataType: 'JSON',
        success: function(result) {
        	$('#mod_ver_datos').modal('toggle');
    		$('#mod_ver_datos_body').html(result.html);        	                        	
        }
    });
}

/**************************************************************************/
/** @Function que permite actualizar la informacion asociada a un dato
/**************************************************************************/

function actualizar_datos(){
    
    var baseURL         = $('body').data('baseurl');//url base
    
	var tipo = $('#inp_tipo').val();
	$.ajax({
        type: "POST",
        url: baseURL + 'gestion/ajax/',
        data: $('#mod_ver_datos_body').serialize() + "&case=7&tipo="+tipo,
        dataType: 'JSON',
        success: function( result ) {        	
        	var estado = result.estado;
        	var tipo = result.tipo;
        	$('#mod_ver_datos').modal('hide');
        	$('#mod_ver_datos_body')[0].reset();
        	crud_datos(result.tipo , 1);
        	if(estado){
        		sweetAlert(
				  'Confirmación',
				  'Informacion agregada al sistema',
				  'success'
				);				      		
        	}else{
        		sweetAlert(
				  'Error',
				  'Hubo un problema al procesar su solicitud',
				  'error'
				);
        	}
            }

    	});
	
}

/**************************************************************************/
/** @Function que permite eliminar la informacion asociada a un dato
/**************************************************************************/
function eliminar_dato(dato, id) {	
    
    var baseURL         = $('body').data('baseurl');//url base
    
	var tipo = dato;
	var idtipo = id;
    swal({
        title: "¿Esta Seguro?",
        text: "¡Esta informacion será eliminada definitivamente del sistema!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, eliminar informacion!",
        closeOnConfirm: false
    }, function() {
    	var datos = {dato : tipo, id : idtipo, case: 4};    	
    	$.ajax({
        type: "POST",
        url: baseURL + 'gestion/ajax/',
        data: datos,
        dataType: 'JSON',
        success: function( result ) {
        	swal("Confirmación!", "La información ha sido eliminada del sistema.", "success"); 
        	crud_datos(result.dato , 3);                 	 
            }

    	});
    });
}

/**************************************************************************/
/** @Functiones que permiten ingresar informacion a la base de datos
/**************************************************************************/

function ingresar_datos(tipo){	
    
    var baseURL         = $('body').data('baseurl');//url base
    
	$.ajax({
        type: "POST",
        url: baseURL + 'gestion/ajax/',
        data: $('#frm_'+tipo).serialize() + "&case=5&tipo="+tipo,
        dataType: 'JSON',
        success: function( result ) {        	
        	var estado = result.estado;
        	var tipo = result.tipo;
        	if(estado){
        		sweetAlert(
				  'Confirmación',
				  'Informacion agregada al sistema',
				  'success'
				);
				// Limpiando los campos del formulario
				switch(tipo){
					case '1':
						$("#frm_"+tipo)[0].reset();		
						break;
					case '2':
						$("#frm_"+tipo)[0].reset();
						break;
					case '3':
						$("#frm_"+tipo)[0].reset();
						break;
					case '4':
						$("#frm_"+tipo)[0].reset();
						break;
					case '5':
						$("#frm_"+tipo)[0].reset();
						break;
					case '6':
						$("#frm_"+tipo)[0].reset();
						break;
					default:
						sweetAlert(
						  'Error',
						  'Error al procesar su solicitud',
						  'error'
						);	
						break;
				}				       		
        	}else{
        		sweetAlert(
				  'Error',
				  'Hubo un problema al procesar su solicitud',
				  'error'
				);
        	}
        }
   	});
}
