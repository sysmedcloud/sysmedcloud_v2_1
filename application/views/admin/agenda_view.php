<div class="row" style="background-color:#ffffff;padding: 0px 25px 15px 25px;">

    <div class="page-header" style="margin-top: 5px;"><h2></h2></div>

    <div class="pull-left form-inline"><br>

            <div class="btn-group">

                <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>

                <button class="btn" data-calendar-nav="today">Hoy</button>

                <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>

            </div>

            <div class="btn-group">

                <button class="btn btn-warning" data-calendar-view="year">Año</button>

                <button class="btn btn-warning active" data-calendar-view="month">Mes</button>

                <button class="btn btn-warning" data-calendar-view="week">Semana</button>

                <button class="btn btn-warning" data-calendar-view="day">Día</button>

            </div>



    </div>

    <div class="pull-right form-inline"><br>

        <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Agendar Cita</button>

    </div>

</div>

<div class="row">

    <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->

</div>

<!--ventana modal para el calendario-->

<div class="modal" id="events-modal">

    <div class="modal-dialog">

            <div class="modal-content">

                    <div class="modal-body" style="height: 500px;">

                        <p>One fine body&hellip;</p>

                    </div>

                <div class="modal-footer">

                    <button type="button" onclick="cerrar_modal_cita();" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                </div>

            </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

    

<script src="<?=base_url();?>js/underscore-min.js"></script>

<script src="<?=base_url();?>js/calendar.js"></script>

<script type="text/javascript">

    (function($){

            //creamos la fecha actual

            var date = new Date();

            var yyyy = date.getFullYear().toString();

            var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();

            var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();



            //establecemos los valores del calendario

            var options = {



                    //definimos que los eventos se mostraran en ventana modal

                    modal: '#events-modal', 



                    // dentro de un iframe

                    modal_type:'iframe',    



                    //obtenemos citas medicas registradas

                    events_source: '<?=  base_url()?>agenda/obtener_citas_medicas', 



                    // mostramos el calendario en el mes

                    view: 'month',             



                    // y dia actual

                    day: yyyy+"-"+mm+"-"+dd,   



                    // definimos el idioma por defecto

                    language: 'es-ES', 

                            

                    //Template de nuestro calendario

                    tmpl_path: '<?=base_url()?>tmpls/', 

                    tmpl_cache: false,



                    // Hora de inicio

                    time_start: '08:00', 



                    // y Hora final de cada dia

                    time_end: '22:00',   



                    // intervalo de tiempo entre las hora, en este caso son 30 minutos

                    time_split: '15',    



                    // Definimos un ancho del 100% a nuestro calendario

                    width: '100%', 



                    onAfterEventsLoad: function(events)

                    {

                            if(!events)

                            {

                                    return;

                            }

                            var list = $('#eventlist');

                            list.html('');



                            $.each(events, function(key, val)

                            {

                                    $(document.createElement('li'))

                                            .html('<a href="' + val.url + '">' + val.title + '</a>')

                                            .appendTo(list);

                            });

                    },

                    onAfterViewLoad: function(view)

                    {

                            $('.page-header h2').text(this.getTitle());

                            $('.btn-group button').removeClass('active');

                            $('button[data-calendar-view="' + view + '"]').addClass('active');

                    },

                    classes: {

                            months: {

                                    general: 'label'

                            }

                    }

            };



            // id del div donde se mostrara el calendario

            var calendar = $('#calendar').calendar(options); 



            $('.btn-group button[data-calendar-nav]').each(function()

            {

                    var $this = $(this);

                    $this.click(function()

                    {

                            calendar.navigate($this.data('calendar-nav'));

                    });

            });



            $('.btn-group button[data-calendar-view]').each(function()

            {

                    var $this = $(this);

                    $this.click(function()

                    {

                            calendar.view($this.data('calendar-view'));

                    });

            });



            $('#first_day').change(function()

            {

                    var value = $(this).val();

                    value = value.length ? parseInt(value) : null;

                    calendar.setOptions({first_day: value});

                    calendar.view();

            });

    }(jQuery));

</script>



<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;&nbsp;Crear nueva cita</h4>

      </div>

      <div class="modal-body">

          <form id="form_crear_cita" action="<?php echo base_url(); ?>agenda/crear_cita" method="post">

                <div class="row">

                  <div class="form-group">

                      <label class="control-label col-sm-3"  for="title">Rut Paciente</label>

                      <div class="col-sm-9">

                          <input type="text" onblur="buscar_paciente(this.value);" required autocomplete="off" name="rut_paciente" class="form-control" id="rut_paciente" onchange="Rut('rut_paciente');" placeholder="Introduce rut del paciente ejm: 11.111.111-1">

                      </div>

                  </div>

                </div>

                <br>

                <div class="row">

                  <div class="form-group">

                      <label class="control-label col-sm-3"  for="title">Paciente</label>

                      <div class="col-sm-9">

                        <input type="hidden" required autocomplete="off" name="id_paciente" class="form-control" id="id_paciente" readonly="true"  placeholder="">

                        <input type="text" required autocomplete="off" name="paciente" class="form-control" id="paciente" readonly="true"  placeholder="">

                      </div>

                  </div>

                </div> 

                <br>

                <div class="row">

                  <div class="form-group">

                      <label class="control-label col-sm-3"  for="title">Inicio</label>

                      <div class="col-sm-9">

                          <div class='input-group date' id='from'>

                              <input type='text' id="from" name="from" class="form-control" readonly />

                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>

                          </div>

                      </div>

                  </div>

                </div> 

                <br>

                <div class="row">

                  <div class="form-group">

                      <label class="control-label col-sm-3"  for="title">Final</label>

                      <div class="col-sm-9">

                          <div class='input-group date' id='to'>

                              <input type='text' name="to" id="to" class="form-control" readonly />

                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>

                          </div>

                      </div>

                  </div>

                </div> 

                <br>

                <div class="row">

                  <div class="form-group">

                      <label class="control-label col-sm-3"  for="title">Estado Cita</label>

                      <div class="col-sm-9">

                          <select class="form-control" name="estado" id="tipo">

                              <option value="">-- Seleccione estado cita --</option>

                              <?php echo $estadosCitas; ?>

                          </select>

                      </div>

                  </div>

                </div> 

                <br>

                <label for="body">Nota</label>

                <textarea id="nota" name="nota" required class="form-control" rows="3"></textarea>

                <script type="text/javascript">

                

                //Funcion que permite limpiar campos del modal crear cita

                function limpiar_campos(){

                    

                    $("#rut_paciente").val("");

                    $("#id_paciente").val("");

                    $("#paciente").val("");

                    $("#nota").val("");

                }

                

                //Buscar nombre y id de un paciente

                function buscar_paciente(rut){

                    

                    var rut_paciente = rut;

                    

                    /*if(rut_paciente === ""){

                        

                        swal({   

                            title:"Ingresa rut del paciente",   

                            text:"",   

                            type: "info",   

                            showCancelButton: true,  

                            confirmButtonColor: "#DD6B55",   

                            confirmButtonText: "Ok",   

                            cancelButtonText: "Cerrar",   

                            closeOnConfirm: true,   

                            closeOnCancel: true 

                        });

                        

                        limpiar_campos();

                    }*/

                    

                    $.ajax({

                        data        : {"rut" : rut_paciente},

                        type        : "POST",

                        dataType    : "json",

                        url         : "<?php echo base_url(); ?>paciente_admin/nombre_y_id_del_paciente"

                    })

                    .done(function(data,textStatus,jqXHR ) {         

                        

                        if(textStatus === "success"){//La solicitud se realizo correctamente

                            

                            var id_paciente = data.id_paciente;

                            

                            if(id_paciente !== "" && id_paciente > 0){   

                                

                                //Cambiamos valores a nuestros input

                                $("#id_paciente").val(id_paciente);

                                

                                if(data.primer_nombre === "No informado"){

                                    var nombres = "";

                                    var apellidos = "";

                                }else{

                                    var nombres     = data.primer_nombre+" "+data.segundo_nombre;

                                    var apellidos   = data.apellido_paterno+" "+data.apellido_materno;

                                }

                                

                                $("#paciente").val(nombres+" "+apellidos);

                                

                            }else{

                                

                                

                                //alert("Paciente con rut "+rut_paciente+" no existe en el sistema.");

                                swal({   

                                    title:"Paciente con rut "+rut_paciente+" no existe en el sistema",   

                                    text:"Puedes crear un nuevo paciente desde el modulo pacientes/crear paciente",   

                                    type: "warning",   

                                    showCancelButton: true,  

                                    confirmButtonColor: "#DD6B55",   

                                    confirmButtonText: "Crear nuevo paciente",   

                                    cancelButtonText: "Cerrar",   

                                    closeOnConfirm: false,   

                                    closeOnCancel: true 

                                }, 

                                function(isConfirm){   

                                    if (isConfirm) {     

                                        //swal("Deleted!", "Your imaginary file has been deleted.", "success");

                                        var url = "<?php echo base_url(); ?>paciente_admin/RegistrarPaciente";    

                                        $(location).attr('href',url);

                                    }

                                });

                                

                                //$("#paciente").val("Paciente no existe en el sistema"); 

                                limpiar_campos();

                                return false;

                            }

                        }

                    })

                    .fail(function( jqXHR, textStatus, errorThrown ) {

                        

                        if(textStatus === "error") {//La solicitud a fallado

                        

                            console.log( "La solicitud a fallado: " +  textStatus);

                            console.log(textStatus+" "+jqXHR);

                        }

                    });

                }

                    

                $(function () {



                    //creamos la fecha actual

                    var date = new Date();

                    var yyyy = date.getFullYear().toString();

                    var mm   = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();

                    var dd   = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                    var hora = date.getHours();

                    var min  = date.getMinutes();



                    $('#from').datetimepicker({

                        defaultDate: mm+'/'+dd+'/'+yyyy+' '+hora+':'+min,

                        language: 'es',

                        minDate: new Date()

                    });

                    $('#to').datetimepicker({

                        defaultDate: mm+'/'+dd+'/'+yyyy+' '+hora+':'+min,

                        language: 'es',

                        minDate: new Date()

                    });



                });



                function cerrar_modal_cita(){



                    $(location).attr('href','<?=  base_url()?>agenda');

                }

            </script>

            </div>

            <div class="modal-footer">

                <button type="button" onclick="limpiar_campos();" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar Cita</button>

            </form>

        </div>

    </div>

</div>

</div>