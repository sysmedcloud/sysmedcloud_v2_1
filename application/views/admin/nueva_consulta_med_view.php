<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Crear Nueva Consulta Médica <small>todos los campos obligatorios tienen la etiqueta (*).</small></h5>
               <div class="ibox-tools">
               </div>
            </div>
            <div class="ibox-content">
               <form method="POST" action="<?=base_url();?>consulta_medica/recibirDatos" class="form-horizontal">
                  <div class="form-group">
                     <!--<label clas<s="col-sm-2 control-label">
                        <img src="<?=base_url();?>img/sin-foto.png" class="img-thumbnail" alt="imagen usuario">
                        </label>-->
                     <div class="col-sm-12">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel blank-panel">
                                 <div class="panel-heading">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <?php
                                             //Mensaje tipo flashdata - datos de acceso son incorrectos
                                             $validaUser = $this->session->flashdata('usuario_existe');
                                             
                                             if ($validaUser){ ?>
                                          <div class="alert alert-warning" role="alert">
                                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                             <?=$validaUser;?>
                                          </div>
                                          <?php } ?> 
                                          <?php 
                                             if(validation_errors()){
                                             
                                             ?>
                                          <div class="alert alert-danger alert-dismissable">
                                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                             <?php echo form_error('id_paciente'); ?>
                                             <?php echo form_error('motivo'); ?>
                                             <?php echo form_error('anamnesis'); ?>
                                             <?php echo form_error('diagnostico'); ?>
                                             <?php echo form_error('tratamiento'); ?>
                                             <br>
                                             <a class="alert-link" href="#">¡Inténtelo otra vez!</a>.
                                          </div>
                                          <?php } ?> 
                                       </div>
                                       <div class="col-lg-12">
                                          <label class="col-sm-3"  for="title">Busqueda por RUT del paciente: </label>
                                          &nbsp;
                                          <div class="col-sm-5">
                                             <input type='text'  required="true"    name="rut" id="rut" onchange="Rut('rut');" placeholder="Ingrese RUT o DNI de un paciente" value="<?php echo $rut; ?>" class="form-control" />
                                             <input type="hidden"   name="id_paciente" value="<?php echo $id_paciente; ?>" id="id_paciente">
                                             <input type="hidden"   id="id_cita_med"   name="id_cita_med"   value="<?=$id_cita_medica;?>">
                                          </div>
                                          &nbsp;
                                          <div class="col-sm-3">
                                             <button class="btn btn-info" type="button" onclick="buscar_paciente();" ><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Buscar Paciente</button>
                                          </div>
                                       </div>
                                    </div>
                                    &nbsp;
                                    <div class="row">
                                       <div class="col-lg-3">
                                          <a href="#" class="thumbnail">
                                          <img src="<?=base_url();?>img/pacientes/<?php echo $imagen; ?>" id="imagen_paciente" class="img-thumbnail" alt="imagen usuario">
                                          </a>
                                       </div>
                                       &nbsp;
                                       <div class="col-lg-9">
                                          <label for="title">Rut del paciente:</label>&nbsp;<span id="rut_paciente"><?php echo $rut; ?></span> 
                                          <br>
                                          <label for="title">Nombre Completo:</label>&nbsp;<span id="nombre_paciente"><?php echo $nombre; ?></span> 
                                          <br>
                                          <label for="title">Fecha Nacimiento:</label>&nbsp;<span id="fecha_nac_paciente"><?php echo $fecha_nac; ?></span> 
                                          <br>
                                          <label for="title">Nacionalidad:</label>&nbsp;<span id="nacionalidad_paciente"><?php echo $nacionalidad; ?></span> 
                                          <br>
                                          <label for="title">Estado Civil:</label>&nbsp;<span id="est_civil_paciente"><?php echo $estado_civil; ?></span>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <ul class="nav nav-tabs">
                                             <li class="active">
                                                <a data-toggle="pill" style="color:#21B9BB;" href="#motivo_consulta">                                                        
                                                <i class="fa fa-leaf" aria-hidden="true"></i>Motivo Consulta Médica
                                                </a>
                                             </li>
                                             <li>
                                                <a data-toggle="pill" style="color:#21B9BB;" href="#anamnesis_proxima">
                                                <i class="fa fa-leaf" aria-hidden="true"></i>Anamnesis Próxima
                                                </a>
                                             </li>
                                             <li>
                                                <a data-toggle="pill" style="color:#21B9BB;" href="#diagnostico">
                                                <i class="fa fa-leaf" aria-hidden="true"></i>Hipótesis Diagnóstico
                                                </a>
                                             </li>
                                             <li>
                                                <a data-toggle="pill" style="color:#21B9BB;" href="#tratamiento">
                                                <i class="fa fa-leaf" aria-hidden="true"></i>Tratamiento
                                                </a>
                                             </li>
                                             <li>
                                                <a data-toggle="pill" style="color:#21B9BB;" href="#obs_recomendaciones">
                                                <i class="fa fa-leaf" aria-hidden="true"></i>Observaciones
                                                </a>
                                             </li>
                                          </ul>
                                          <div class="tab-content">
                                             <div id="motivo_consulta" class="tab-pane fade in active">
                                                <textarea required="true" class="form-control" id="motivo" name="motivo" cols="90" rows="6"><?php echo set_value('motivo'); ?></textarea>
                                             </div>
                                             <div id="anamnesis_proxima" class="tab-pane fade">
                                                <textarea required="true" class="form-control" id="anamnesis" name="anamnesis" cols="90" rows="6"><?php echo set_value('anamnesis'); ?></textarea>
                                             </div>
                                             <div id="diagnostico" class="tab-pane fade">
                                                <textarea required="true" class="form-control" id="diagnostico" name="diagnostico" cols="90" rows="6"><?php echo set_value('diagnostico'); ?></textarea>
                                             </div>
                                             <div id="tratamiento" class="tab-pane fade">
                                                <textarea required="true" class="form-control" id="tratamiento" name="tratamiento" cols="90" rows="6"><?php echo set_value('tratamiento'); ?></textarea>
                                             </div>
                                             <div id="obs_recomendaciones" class="tab-pane fade">
                                                <textarea class="form-control" id="observaciones" name="observaciones" cols="90" rows="6"><?php echo set_value('observaciones'); ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-12" style="margin-top: 5px;">
                                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                             <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                   <h4 class="panel-title">
                                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Revisíon por Sistemas
                                                      </a>
                                                   </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                   <div class="panel-body">
                                                      <ul class="nav nav-tabs">
                                                         <li class="active"><a data-toggle="tab" href="#rs_1">Síntomas Generales<b></b></a></li>
                                                         <li><a data-toggle="tab" href="#rs_2">Respiratorio<b></b></a></li>
                                                         <li><a data-toggle="tab" href="#rs_3">Cardiovascular</a></li>
                                                         <li><a data-toggle="tab" href="#rs_4">Gastroinstestinal</a></li>
                                                         <li><a data-toggle="tab" href="#rs_5">Genitourinario</a></li>
                                                         <li><a data-toggle="tab" href="#rs_6">Neurológico</a></li>
                                                         <li><a data-toggle="tab" href="#rs_7">Endocrino</a></li>
                                                         <li><a data-toggle="tab" href="#rs_8">Archivos y Documentos</a></li>
                                                      </ul>
                                                      <div class="tab-content">
                                                         <div id="rs_1" class="tab-pane fade in active">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks"> 
                                                                     <?php echo form_checkbox('sg_fiebre','',set_checkbox('sg_fiebre'),' id="sg_fiebre" '); ?>&nbsp;&nbsp;FiebreFiebre
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_trans_peso','',set_checkbox('sg_trans_peso'),' id="sg_trans_peso" '); ?>&nbsp;&nbsp;Transtornos de Peso
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_malestar_gen','',set_checkbox('sg_malestar_gen'),' id="sg_malestar_gen" '); ?>&nbsp;&nbsp;Malestar General
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_problemas_ape','',set_checkbox('sg_problemas_ape'),' id="sg_problemas_ape" '); ?>&nbsp;&nbsp;Problemas con el apetito
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_sudoracion_n','',set_checkbox('sg_sudoracion_n'),' id="sg_sudoracion_n" '); ?>&nbsp;&nbsp;Sudoración Nocturna
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_insomnio','',set_checkbox('sg_insomnio'),' id="sg_insomnio" '); ?>&nbsp;&nbsp;Insomnio
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_angustia','',set_checkbox('sg_angustia'),' id="sg_angustia" '); ?>&nbsp;&nbsp;Angustia
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('sg_otros','',set_checkbox('sg_otros'),' id="sg_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="sg_comentarios" name="sg_comentarios" cols="90" rows="5"><?php echo set_value('sg_comentarios');?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_2" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks"> 
                                                                     <?php echo form_checkbox('resp_disnea','',set_checkbox('resp_disnea'),' id="resp_disnea" '); ?>&nbsp;&nbsp;Disnea
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('resp_tos','',set_checkbox('resp_tos'),' id="resp_tos" '); ?>&nbsp;&nbsp;Tos
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('resp_exp','',set_checkbox('resp_exp'),' id="resp_exp" '); ?>&nbsp;&nbsp;Expectoración
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('resp_hemop','',set_checkbox('resp_hemop'),' id="resp_hemop" '); ?>&nbsp;&nbsp;Hemoptisis
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('resp_p_costado','',set_checkbox('resp_p_costado'),' id="resp_p_costado" '); ?>&nbsp;&nbsp;Puntada de Costado
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                    
                                                                     <?php echo form_checkbox('resp_obs_br','',set_checkbox('resp_obs_br'),' id="resp_obs_br" '); ?>&nbsp;&nbsp;Obstrucción bronquial
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                    
                                                                     <?php echo form_checkbox('resp_otros','',set_checkbox('resp_otros'),' id="resp_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     &nbsp;
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="resp_comentarios" name="resp_comentarios" cols="90" rows="5"><?php echo set_value("resp_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_3" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                    
                                                                     <?php echo form_checkbox('card_dis_esf','',set_checkbox('card_dis_esf'),' id="card_dis_esf" '); ?>&nbsp;&nbsp;Disnea de Esfuerzo
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('card_ortopnea','',set_checkbox('card_ortopnea'),' id="card_ortopnea" '); ?>&nbsp;&nbsp;Ortopnea
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('card_dis_parox_noc','',set_checkbox('card_dis_parox_noc'),' id="card_dis_parox_noc" '); ?>&nbsp;&nbsp;Disnea Paroxística Nocturna
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('card_edema_ext_inf','',set_checkbox('card_edema_ext_inf'),' id="card_edema_ext_inf" '); ?>&nbsp;&nbsp;Edema de extremidades interiores
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('card_dolor_preco','',set_checkbox('card_dolor_preco'),' id="card_dolor_preco" '); ?>&nbsp;&nbsp;Dolor Precordial
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('card_otros','',set_checkbox('card_otros'),' id="card_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="card_comentarios" name="card_comentarios" cols="90" rows="5"><?php echo set_value("card_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_4" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks"> 
                                                                     <?php echo form_checkbox('gast_p_ape','',set_checkbox('gast_p_ape'),' id="gast_p_ape" '); ?>&nbsp;&nbsp;Problemas de Apetito
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_nausas','',set_checkbox('gast_nausas'),' id="gast_nausas" '); ?>&nbsp;&nbsp;Nausas
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_vomitos','',set_checkbox('gast_vomitos'),' id="gast_vomitos" '); ?>&nbsp;&nbsp;Vomitos
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_disfagia','',set_checkbox('gast_disfagia'),' id="gast_disfagia" '); ?>&nbsp;&nbsp;Disfagia
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_pirosis','',set_checkbox('gast_pirosis'),' id="gast_pirosis" '); ?>&nbsp;&nbsp;Pirosis
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_diarrea','',set_checkbox('gast_diarrea'),' id="gast_diarrea" '); ?>&nbsp;&nbsp;Diarrea
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_constipacion','',set_checkbox('gast_constipacion'),' id="gast_constipacion" '); ?>&nbsp;&nbsp;Constipación
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_melena','',set_checkbox('gast_melena'),' id="gast_melena" '); ?>&nbsp;&nbsp;Melena
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('gast_otros','',set_checkbox('gast_otros'),' id="gast_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     &nbsp;
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="gast_comentarios" name="gast_comentarios" cols="90" rows="5"><?php echo set_value("gast_comentarios") ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_5" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                     
                                                                     <?php echo form_checkbox('geni_disuria','',set_checkbox('geni_disuria'),' id="geni_disuria" '); ?>&nbsp;&nbsp;Disuria dolorosa o de esfuerzo
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_polaquiuria','',set_checkbox('geni_polaquiuria'),' id="geni_polaquiuria" '); ?>&nbsp;&nbsp;Polaquiuria
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_poliuria','',set_checkbox('geni_poliuria'),' id="geni_poliuria" '); ?>&nbsp;&nbsp;Poliuria
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_nicturia','',set_checkbox('geni_nicturia'),' id="geni_nicturia" '); ?>&nbsp;&nbsp;Nicturia
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_alt_uri','',set_checkbox('geni_alt_uri'),' id="geni_alt_uri" '); ?>&nbsp;&nbsp;Alteración del chorro urinario
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_hematuria','',set_checkbox('geni_hematuria'),' id="geni_hematuria" '); ?>&nbsp;&nbsp;Hematuria
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_dolores_lum','',set_checkbox('geni_dolores_lum'),' id="geni_dolores_lum" '); ?>&nbsp;&nbsp;Dolores en fosas lumbares
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('geni_otros','',set_checkbox('geni_otros'),' id="geni_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="geni_comentarios" name="geni_comentarios" cols="90" rows="5"><?php echo set_value("geni_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_6" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('neuro_cafalea','',set_checkbox('neuro_cafalea'),' id="neuro_cafalea" '); ?>&nbsp;&nbsp;Cafalea
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                    
                                                                     <?php echo form_checkbox('neuro_mareos','',set_checkbox('neuro_mareos'),' id="neuro_mareos" '); ?>&nbsp;&nbsp;Mareos
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('neuro_problemas_coord','',set_checkbox('neuro_problemas_coord'),' id="neuro_problemas_coord" '); ?>&nbsp;&nbsp;Problemas de Coordinación
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('neuro_paresias','',set_checkbox('neuro_paresias'),' id="neuro_paresias" '); ?>&nbsp;&nbsp;Paresias
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('neuro_parestesias','',set_checkbox('neuro_parestesias'),' id="neuro_parestesias" '); ?>&nbsp;&nbsp;Parestesias
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('neuro_otros','',set_checkbox('neuro_otros'),' id="neuro_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="neuro_comentarios" name="neuro_comentarios" cols="90" rows="5"><?php echo set_value("neuro_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_7" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Indique aquellos sintomas que pueden ser observados en el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks"> 
                                                                     <?php echo form_checkbox('endo_b_peso','',set_checkbox('endo_b_peso'),' id="endo_b_peso" '); ?>&nbsp;&nbsp;Baja de peso
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                                                  
                                                                     <?php echo form_checkbox('endo_into_frio','',set_checkbox('endo_into_frio'),' id="endo_into_frio" '); ?>&nbsp;&nbsp;Intolerancia al frío
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                    
                                                                     <?php echo form_checkbox('endo_into_calor','',set_checkbox('endo_into_calor'),' id="endo_into_calor" '); ?>&nbsp;&nbsp;Intolerancia al calor
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                                                           
                                                                     <?php echo form_checkbox('endo_temblor_fino','',set_checkbox('endo_temblor_fino'),' id="endo_temblor_fino" '); ?>&nbsp;&nbsp;Temblor fino
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('endo_polidefecacion','',set_checkbox('endo_polidefecacion'),' id="endo_polidefecacion" '); ?>&nbsp;&nbsp;Polidefecacion
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('endo_ronquera','',set_checkbox('endo_ronquera'),' id="endo_ronquera" '); ?>&nbsp;&nbsp;Ronquera
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('endo_somnolencia','',set_checkbox('endo_somnolencia'),' id="endo_somnolencia" '); ?>&nbsp;&nbsp;Somnolencia
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('endo_sequedad_piel','',set_checkbox('endo_sequedad_piel'),' id="endo_sequedad_piel" '); ?>&nbsp;&nbsp;Sequedad de la piel
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('endo_otros','',set_checkbox('endo_otros'),' id="endo_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     &nbsp;
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Puedes agregar un comentario adicional.
                                                                  <hr>
                                                                  <textarea class="form-control" id="endo_comentarios" name="endo_comentarios" cols="90" rows="5"><?php echo set_value("endo_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="rs_8" class="tab-pane fade">
                                                            <br>
                                                            <p>Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                               tipo de archivo digital. 
                                                               Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. 
                                                               <br> 
                                                               <label></label>
                                                               <input type="hidden" name="token_rs" id="token_rs" value="<?php  echo $token_rs; ?>">
                                                               <input id="archivos_rs" name="imagenes[]" type="file" multiple="true" class="file-loading">
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                   <h4 class="panel-title">
                                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Examen Físico
                                                      </a>
                                                   </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                   <div class="panel-body">
                                                      <ul class="nav nav-tabs">
                                                         <li class="active"><a data-toggle="tab" href="#ef_1">Decúbito</a></li>
                                                         <li><a data-toggle="tab" href="#ef_2">Deambulación</a></li>
                                                         <li><a data-toggle="tab" href="#ef_3">Facie</a></li>
                                                         <li><a data-toggle="tab" href="#ef_4">Conciencia</a></li>
                                                         <li><a data-toggle="tab" href="#ef_5">Piel</a></li>
                                                         <li><a data-toggle="tab" href="#ef_6">S. Linfático</a></li>
                                                         <li><a data-toggle="tab" href="#ef_7">Signos Vitales</a></li>
                                                         <li><a data-toggle="tab" href="#ef_8">Archivos y Documentos</a></li>
                                                      </ul>
                                                      <div class="tab-content">
                                                         <div id="ef_1" class="tab-pane fade in active">
                                                            <br>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  <b>Posición /</b> descripción de la posición de pie del paciente.
                                                                  <hr>
                                                                  <textarea class="form-control" id="d_posicion_pie" name="d_posicion_pie" cols="90" rows="5"><?php echo set_value("d_posicion_pie"); ?></textarea>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  <b>Decúbito /</b> descripción de la posición en decúbito del paciente.
                                                                  <hr>
                                                                  <textarea class="form-control" id="d_posicion_decubito" name="d_posicion_decubito" cols="90" rows="5"><?php echo set_value("d_posicion_decubito"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_2" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Seleccione algun trastorno de marcha que presente el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks"> 
                                                                     <?php echo form_checkbox('deammbulación_normal','',set_checkbox('deammbulación_normal'),' id="deammbulación_normal" '); ?>&nbsp;&nbsp;Deammbulación normal
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('marcha_ataxica','',set_checkbox('marcha_ataxica'),' id="marcha_ataxica" '); ?>&nbsp;&nbsp;Marcha atáxica o tabética
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('marcha_polineuritis','',set_checkbox('marcha_polineuritis'),' id="marcha_polineuritis" '); ?>&nbsp;&nbsp;Marcha de pacientes con polineuritis
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('marcha_espastica','',set_checkbox('marcha_espastica'),' id="marcha_espastica" '); ?>&nbsp;&nbsp;Marcha espástica (en tijeras)
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('marcha_hemiplejico','',set_checkbox('marcha_hemiplejico'),' id="marcha_hemiplejico" '); ?>&nbsp;&nbsp;Marcha del hemipléjico
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('marcha_parkinsoniana','',set_checkbox('marcha_parkinsoniana'),' id="marcha_parkinsoniana" '); ?>&nbsp;&nbsp;Marcha parkinsoniana
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('d_otros_trastornos','',set_checkbox('d_otros_trastornos'),' id="d_otros_trastornos" '); ?>&nbsp;&nbsp;Otros trastornos
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     &nbsp;
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Comentarios / Puedes ingresar un nuevo transtorno.
                                                                  <hr>
                                                                  <textarea class="form-control" id="d_comentarios" name="d_comentarios" cols="90" rows="5"><?php echo set_value("d_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_3" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-7">
                                                               Seleccione algun trastorno facie que presente el paciente.
                                                               <hr>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks"> 
                                                                     <?php echo form_checkbox('facie_normal','',set_checkbox('facie_normal'),' id="facie_normal" '); ?>&nbsp;&nbsp;Facie normal
                                                                     </label> 
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_acromegalica','',set_checkbox('facie_acromegalica'),' id="facie_acromegalica" '); ?>&nbsp;&nbsp;Facie acromegálica
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">                              
                                                                     <?php echo form_checkbox('facie_cushingoide','',set_checkbox('facie_cushingoide'),' id="facie_cushingoide" '); ?>&nbsp;&nbsp;Facie cushingoide
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_hipertiroídea','',set_checkbox('facie_hipertiroídea'),' id="facie_hipertiroídea" '); ?>&nbsp;&nbsp;Facie hipertiroídea
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_hipotiroidea','',set_checkbox('facie_hipotiroidea'),' id="facie_hipotiroidea" '); ?>&nbsp;&nbsp;Facie hipotiroídea o mixedematosa
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_hipocratica','',set_checkbox('facie_hipocratica'),' id="facie_hipocratica" '); ?>&nbsp;&nbsp;Facie hipocrática
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_mongolica','',set_checkbox('facie_mongolica'),' id="facie_mongolica" '); ?>&nbsp;&nbsp;Facie mongólica (s. de Down)
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_parkinsoniana','',set_checkbox('facie_parkinsoniana'),' id="facie_parkinsoniana" '); ?>&nbsp;&nbsp;Facie parkinsoniana
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_febril','',set_checkbox('facie_febril'),' id="facie_febril" '); ?>&nbsp;&nbsp;Facie febril
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_mitralica','',set_checkbox('facie_mitralica'),' id="facie_mitralica" '); ?>&nbsp;&nbsp;Facie mitrálica
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-6">
                                                                     <label class="radio-inline i-checks">
                                                                     <?php echo form_checkbox('facie_otros_trastornos','',set_checkbox('facie_otros_trastornos'),' id="facie_otros_trastornos" '); ?>&nbsp;&nbsp;Otros trastornos
                                                                     </label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                     &nbsp;
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                               <div class="row">
                                                                  Comentarios / Puedes ingresar un nuevo transtorno.
                                                                  <hr>
                                                                  <textarea class="form-control" id="facie_comentarios" name="facie_comentarios" cols="90" rows="5"><?php echo set_value("facie_comentarios"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_4" class="tab-pane fade">
                                                            <br>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  Orientación en el tiempo
                                                                  <textarea class="form-control" id="orientacion_t" name="orientacion_t" cols="90" rows="3"><?php echo set_value("orientacion_t"); ?></textarea>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  Orientación en el espacio
                                                                  <textarea class="form-control" id="orientacion_e" name="orientacion_e" cols="90" rows="3"><?php echo set_value("orientacion_e"); ?></textarea>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  Reconocimiento de personas&nbsp;
                                                                  <textarea class="form-control" id="reconocimiento_p" name="reconocimiento_p" cols="90" rows="3"><?php echo set_value("reconocimiento_p"); ?></textarea>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  Nivel de conciencia&nbsp;
                                                                  <div class="row">
                                                                     <div class="col-sm-3">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('lucidez','',set_checkbox('lucidez'),' id="lucidez" '); ?>&nbsp;&nbsp;Lucidez
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-4">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('obnubilacion','',set_checkbox('obnubilacion'),' id="obnubilacion" '); ?>&nbsp;&nbsp;Obnubilación
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-5">&nbsp;</div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-3">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('sopor','',set_checkbox('sopor'),' id="sopor" '); ?>&nbsp;&nbsp;Sopor
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-4">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('coma','',set_checkbox('coma'),' id="coma" '); ?>&nbsp;&nbsp;Coma
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-5">&nbsp;</div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  Comentarios&nbsp;
                                                                  <textarea class="form-control" id="conciencia_comentarios" name="conciencia_comentarios" cols="90" rows="3"><?php echo set_value("conciencia_comentarios"); ?></textarea>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  &nbsp;
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_5" class="tab-pane fade">
                                                            <br>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  Color
                                                                  <textarea class="form-control" id="piel_color" name="piel_color" cols="90" rows="2"><?php echo set_value("piel_color"); ?></textarea>
                                                                  <br>
                                                                  Humedad y untuosidad
                                                                  <textarea class="form-control" id="piel_humedad_u" name="piel_humedad_u" cols="90" rows="2"><?php echo set_value("piel_humedad_u"); ?></textarea>
                                                                  <br>
                                                                  Turgor y elasticidad
                                                                  <textarea class="form-control" id="piel_turgor_e" name="piel_turgor_e" cols="90" rows="2"><?php echo set_value("piel_turgor_e"); ?></textarea>
                                                                  <br>
                                                                  Temperatura
                                                                  <select name="piel_temperatura" id="piel_temperatura" class="form-control">
                                                                     <option value="">--- Seleccione una opción ---</option>
                                                                     <option value="normal">Normal</option>
                                                                     <option value="aumentada">Aumentada</option>
                                                                     <option value="disminuida">Disminuida</option>
                                                                  </select>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  Seleccione algun trastorno en la piel que presente el paciente.
                                                                  <hr>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_sin_lesiones','',set_checkbox('piel_sin_lesiones'),' id="piel_sin_lesiones" '); ?>&nbsp;&nbsp;No presenta lesiones
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_Eritema','',set_checkbox('piel_Eritema'),' id="piel_Eritema" '); ?>&nbsp;&nbsp;Eritema por exposicion solar
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_mascula','',set_checkbox('piel_mascula'),' id="piel_mascula" '); ?>&nbsp;&nbsp;Máscula en la cara
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_papula','',set_checkbox('piel_papula'),' id="piel_papula" '); ?>&nbsp;&nbsp;Pápula
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_nodulo','',set_checkbox('piel_nodulo'),' id="piel_nodulo" '); ?>&nbsp;&nbsp;Nódulo
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_tumor','',set_checkbox('piel_tumor'),' id="piel_tumor" '); ?>&nbsp;&nbsp;Tumor
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_vesicula','',set_checkbox('piel_vesicula'),' id="piel_vesicula" '); ?>&nbsp;&nbsp;Vesícula
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_ampolla','',set_checkbox('piel_ampolla'),' id="piel_ampolla" '); ?>&nbsp;&nbsp;Ampolla
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_pustula','',set_checkbox('piel_pustula'),' id="piel_pustula" '); ?>&nbsp;&nbsp;Pústula
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_placa','',set_checkbox('piel_placa'),' id="piel_placa" '); ?>&nbsp;&nbsp;Placa
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_eritema','',set_checkbox('piel_eritema'),' id="piel_eritema" '); ?>&nbsp;&nbsp;Eritema
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_escama','',set_checkbox('piel_escama'),' id="piel_escama" '); ?>&nbsp;&nbsp;Escama
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_erosion','',set_checkbox('piel_erosion'),' id="piel_erosion" '); ?>&nbsp;&nbsp;Erosión
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_ulceracion','',set_checkbox('piel_ulceracion'),' id="piel_ulceracion" '); ?>&nbsp;&nbsp;Ulceración
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_costra','',set_checkbox('piel_costra'),' id="piel_costra" '); ?>&nbsp;&nbsp;Costra
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_cicatriz','',set_checkbox('piel_cicatriz'),' id="piel_cicatriz" '); ?>&nbsp;&nbsp;Cicatriz
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_roncha','',set_checkbox('piel_roncha'),' id="piel_roncha" '); ?>&nbsp;&nbsp;Roncha
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_liquenificacion','',set_checkbox('piel_liquenificacion'),' id="piel_liquenificacion" '); ?>&nbsp;&nbsp;Liquenificación
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_telangiectasia','',set_checkbox('piel_telangiectasia'),' id="piel_telangiectasia" '); ?>&nbsp;&nbsp;Telangiectasia
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_petequia','',set_checkbox('piel_petequia'),' id="piel_petequia" '); ?>&nbsp;&nbsp;Petequia
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_equimosis','',set_checkbox('piel_equimosis'),' id="piel_equimosis" '); ?>&nbsp;&nbsp;Equímosis
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_vibice','',set_checkbox('piel_vibice'),' id="piel_vibice" '); ?>&nbsp;&nbsp;Víbice
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_efelide','',set_checkbox('piel_efelide'),' id="piel_efelide" '); ?>&nbsp;&nbsp;Efélide
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('piel_otros_t','',set_checkbox('piel_otros_t'),' id="piel_otros_t" '); ?>&nbsp;&nbsp;Otros trastornos
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                               <div class="col-sm-12">
                                                                  <strong>Anexos de la piel: pelos y uñas.</strong>
                                                                  <hr>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  <div class="row">
                                                                     <div class="col-sm-12">
                                                                        <b>Pelos:</b> alteraciones de la distribución y características del pelo.
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('pelos_calvicie','',set_checkbox('pelos_calvicie'),' id="pelos_calvicie" '); ?>&nbsp;&nbsp;Calvicie
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('pelos_alopecia','',set_checkbox('pelos_alopecia'),' id="pelos_alopecia" '); ?>&nbsp;&nbsp;Alopecía
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('pelos_hirsutismo','',set_checkbox('pelos_hirsutismo'),' id="pelos_hirsutismo" '); ?>&nbsp;&nbsp;Hirsutismo
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('pelos_otros_alt','',set_checkbox('pelos_otros_alt'),' id="pelos_otros_alt" '); ?>&nbsp;&nbsp;Otras alteraciones
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  <div class="row">
                                                                     <div class="col-sm-12">
                                                                        <b>Uñas:</b> seleccione signos presentes.
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_acropaquia','',set_checkbox('unias_acropaquia'),' id="unias_acropaquia" '); ?>&nbsp;&nbsp;Acropaquia
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_coiloniquia','',set_checkbox('unias_coiloniquia'),' id="unias_coiloniquia" '); ?>&nbsp;&nbsp;Coiloniquia o uña en cuchara
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_psoriasis','',set_checkbox('unias_psoriasis'),' id="unias_psoriasis" '); ?>&nbsp;&nbsp;Uñas en psoriasis
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_l_beau','',set_checkbox('unias_l_beau'),' id="unias_l_beau" '); ?>&nbsp;&nbsp;Uñas con líneas de Beau
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_l_ungueales_p','',set_checkbox('unias_l_ungueales_p'),' id="unias_l_ungueales_p" '); ?>&nbsp;&nbsp;Lechos ungueales pálidos
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_l_ungueales_c','',set_checkbox('unias_l_ungueales_c'),' id="unias_l_ungueales_c" '); ?>&nbsp;&nbsp;Lechos ungueales cianóticos
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_renal_c','',set_checkbox('unias_renal_c'),' id="unias_renal_c" '); ?>&nbsp;&nbsp;Uñas en la insuficiencia renal crónica
                                                                        </label>
                                                                     </div>
                                                                     <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                        <?php echo form_checkbox('unias_hemorragias_s','',set_checkbox('unias_hemorragias_s'),' id="unias_hemorragias_s" '); ?>&nbsp;&nbsp;Hemorragias subungueales o en astilla
                                                                        </label>
                                                                     </div>
                                                                  </div>
                                                                  <!--<textarea class="form-control" id="piel_turgor_e" name="piel_turgor_e" cols="90" rows="2"></textarea>-->
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_6" class="tab-pane fade">
                                                            <br>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  Adenopatía:
                                                                  <hr>
                                                                  <textarea class="form-control" id="sl_adenopatia" name="sl_adenopatia" cols="90" rows="5"><?php echo set_value("sl_adenopatia"); ?></textarea>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  Comentarios
                                                                  <hr>
                                                                  <textarea class="form-control" id="sl_comercial" name="sl_comercial" cols="90" rows="5"><?php echo set_value("sl_comercial"); ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_7" class="tab-pane fade">
                                                            <br>
                                                            <div class="col-sm-6">
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">F.R.</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_fr" name="sv_fr" class="form-control input-sm" value="<?php echo set_value("sv_fr"); ?>">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">R.P.M.</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp</div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">Temp.</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_temperatura" name="sv_temperatura" value="<?php echo set_value("sv_temperatura"); ?>" class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">°C</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">
                                                                     T.A.
                                                                  </div>
                                                                  <div class="col-sm-3 col-xs-3">
                                                                     <input type="text" id="sv_ta_sis" name="sv_ta_sis" value="<?php echo set_value("sv_ta_sis"); ?>" placeholder="sis." class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">
                                                                     /
                                                                  </div>
                                                                  <div class="col-sm-3 col-xs-3">
                                                                     <input type="text" id="sv_ta_diast" name="sv_ta_diast" value="<?php echo set_value("sv_ta_diast"); ?>" placeholder="diast." class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">
                                                                     mmHg.
                                                                  </div>
                                                                  <div class="col-sm-9 col-xs-9">&nbsp;</div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">P.A.</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_pa" name="sv_pa" value="<?php echo set_value("sv_pa"); ?>" class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">P.P.M.</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">F.C.</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_fc" name="sv_fc" value="<?php echo set_value("sv_fc"); ?>" class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">L.P.M.</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">Peso</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_peso" name="sv_peso" value="<?php echo set_value("sv_peso"); ?>" class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">Kgs.</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">Talla</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_talla" name="sv_talla" value="<?php echo set_value("sv_talla"); ?>" class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">Cms.</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-sm-2 col-xs-2">IMC</div>
                                                                  <div class="col-sm-3 col-xs-6">
                                                                     <input type="text" id="sv_imc" name="sv_imc" value="<?php echo set_value("sv_imc"); ?>" class="form-control input-sm">
                                                                  </div>
                                                                  <div class="col-sm-1 col-xs-1">Kg/m2</div>
                                                                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div id="ef_8" class="tab-pane fade">
                                                            <br>
                                                            <p>
                                                               Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                               tipo de archivo digital. 
                                                               Recuerda escribir un titulo y una descripción a los archivos que adjuntes. 
                                                               Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. 
                                                            </p>
                                                            <label></label>
                                                            <input type="hidden" name="token_ef" id="token_ef" value="<?php  echo $token_ef; ?>">
                                                            <input id="archivos_ef" name="imagenes_ef[]" type="file" multiple="true" class="file-loading">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <button class="btn btn-white" type="button">Cancelar</button>
                                       &nbsp;&nbsp;
                                       <button class="btn btn-primary" type="submit">Crear Consulta Médica</button>
                                    </div>
                                    <div class="col-md-6">&nbsp;</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>