//SCRIPT QUE PERMITE ORDENAR TABLA DE PACIENTES POR FECHA
jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "date-eu-pre": function ( date ) {
        date = date.replace(" ", "");
        var eu_date, year;

        if (date == '') {
            return 0;
        }

        if (date.indexOf('.') > 0) {
            /*date a, format dd.mn.(yyyy) ; (year is optional)*/
            eu_date = date.split('.');
        } else {
            /*date a, format dd/mn/(yyyy) ; (year is optional)*/
            eu_date = date.split('/');
        }

        /*year (optional)*/
        if (eu_date[2]) {
            year = eu_date[2];
        } else {
            year = 0;
        }

        /*month*/
        var month = eu_date[1];
        if (month.length == 1) {
            month = 0+month;
        }

        /*day*/
        var day = eu_date[0];
        if (day.length == 1) {
            day = 0+day;
        }

        return (year + month + day) * 1;
    },

    "date-eu-asc": function ( a, b ) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },

    "date-eu-desc": function ( a, b ) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
});

//AL MOMENTO DE CARGAR LA PAGINA CARGA ESTO
$(document).ready(function() {
    
    //CARGA TABLA DE PACIENTES
    listado_pacientes();
    
});

//FUNCION QUE PERMITE CARGAR TABLA DE PACIENTES
function listado_pacientes(){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#pacientes').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"paciente_admin/pacientes_json",//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "fecha_creacion" },
            { "data": "rut" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "edad" },
            { "data": "celular" },
            { "data": "email"},
            { "data": "h_clinica"},
            { "data": "editar"},
            { "data": "view"},
            { "data": "delete"}
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
                    '<img src="'+baseURL+'img/pacientes/'+data.imagen+'" alt="...">'+
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

//FUNCION QUE PERMITE ELIMINAR UN PACIENTE
function eliminar_paciente(id_paciente,nombre,rut){
    
    var baseURL = $('body').data('baseurl');//url base
    
    swal({   
        title: "¿Estas seguro de eliminar al paciente "+nombre+" R.U.T. "+rut+"?",   
        text: "Recuerda que todo su historial médico sera eliminado!",   
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
            data: {"id_paciente" : id_paciente},
            type: "POST",
            dataType: "json",
            url: baseURL+"paciente_admin/eliminarPaciente"
        })
       .done(function(data,textStatus,jqXHR ) {         

            if(textStatus === "success"){//La solicitud se realizo correctamente
                
               //Paciente eliminado correctamente 
               swal({ 
                    title: "Paciente eliminado!",
                    text:  "Historia medica del paciente fue eliminada correctamente.",
                    type:  "success" 
                },
                function(){
                    //recargar tabla de pacientes
                    listado_pacientes();
                });
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {

            if(textStatus === "error") {//La solicitud a fallado
                alert("Error: "+textStatus+" "+jqXHR);
                console.log("La solicitud a fallado: " +  textStatus);
                console.log(textStatus+" "+jqXHR);
            }
        });
    });
    
    return false;
    
}

//FUNCION QUE PERMITE VISUALIZAR DETALLE DE LA HISTORIA MEDICA DE UN PACIENTE
function ver_HC(id_paciente,id_historia_med){
    var baseURL = $('body').data('baseurl');//url base
    var url = baseURL+"ficha_medica/ver_detalle/"+id_paciente+"/"+id_historia_med;    
    $(location).attr('href',url);

}

