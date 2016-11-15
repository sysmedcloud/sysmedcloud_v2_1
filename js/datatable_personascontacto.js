$(document).ready(function() {
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#personas_contacto').dataTable({
        "ajax": {
            //"url": baseURL+"paciente_admin/pacientes_json",//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "familiaridad" },
            { "data": "celular" },
            { "data": "email"},
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
        responsive: true,//tabla responsive, agrega un boton
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
    
});