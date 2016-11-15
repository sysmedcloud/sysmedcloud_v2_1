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

$(document).ready(function() {
    
    //Cargamos listado de historias clinicas recientes
    listado_hc_recientes();

    listado_cc_recientes();
    
    //Cargamos grafico de distribución de consultas med. por pacientes y genero
    consultas_med_pacientes_genero();
    
    //Cargamos grafico de pacientes por genero
    genero_paciente();
});

//Grafico pacientes por genero
function genero_paciente(){
    
    var options = {
        
        chart: {
            renderTo: 'pacientes_por_genero',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pacientes por género'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                    }
                },
                showInLegend: false
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
             data: []
        }]
    };
    
    var baseURL = $('body').data('baseurl');//url base
    var url     = baseURL + 'dashboard_admin/paciente_genero_ajax';
    
    $.getJSON(url, function(json) {
        console.log(json);
        options.series[0].data = json;
        chart = new Highcharts.Chart(options);
    });
}

//Grafico que permite visualizar la distribución de consultas med. y genero
function consultas_med_pacientes_genero(){
    
    $('#cm_pacientes_genero').highcharts({
        data: {
            table: 'cm_pacientes_genero_datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Distribución de consultas médicas por género'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'N° de consultas médicas'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
}

//Funcion que permite visualizar historias clíncas recientemente registradas
function listado_hc_recientes(){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#hc_recientes').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"ficha_medica/historias_clinicas_recientes",//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "fecha_creacion" },
            { "data": "id_historia_medica" },
            { "data": "rut" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "ultimo_control" },
            { "data": "ver_detalle" }
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

function listado_cc_recientes(){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#cc_recientes').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"ficha_medica/historias_clinicas_recientes_paciente",//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "fecha_creacion" },
            { "data": "id_historia_medica" },
            { "data": "rut" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "ultimo_control" },
            { "data": "ver_detalle" }
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