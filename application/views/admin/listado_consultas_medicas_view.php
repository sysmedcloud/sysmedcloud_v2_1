<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Consultas Médicas </h5>
                    &nbsp;&nbsp;(  
                    <i class="fa fa-eye"></i>&nbsp;Ver Información,
                    <i class="fa fa-pencil-square-o"></i>&nbsp;Editar, 
                    <i class="fa fa-times"></i>&nbsp;Eliminar)
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                <div class="table-responsive">
                    <table id="listado_consultas_medicas" class="table table-striped table-hover dataTables-example" >
                       <thead>
                          <tr>
                             <th style="width: 5%;">N°</th>
                             <th style="width: 5%;">Fecha</th>
                             <th style="width: 5%;">Rut</th>
                             <th style="width: 20%;">Paciente</th>
                             <th style="width: 55%;">Motivo Consulta</th>
                             <!--<th>Anamnesis Próxima</th>-->
                             <th style="width: 10%;">acciones</th>
                          </tr>
                       </thead>
                    </table>
                 </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal informacion consulta médica -->
<div class="modal fade informacion_consulta_medica" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="gridSystemModalLabel">Detalle Consulta Médica N°#32232 &nbsp;&nbsp;<span style="color: red;">(EN CONSTRUCCIÓN)</span></h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-12">
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
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Anam. Próxima
                                 </a>
                              </li>
                              <li>
                                 <a data-toggle="pill" style="color:#21B9BB;" href="#diagnostico">
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Diagnóstico
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
                                 <textarea readonly="true" class="form-control" id="motivo" name="motivo" cols="90" rows="6"><?php echo set_value('motivo'); ?></textarea>
                              </div>
                              <div id="anamnesis_proxima" class="tab-pane fade">
                                 <textarea readonly="true" class="form-control" id="anamnesis" name="anamnesis" cols="90" rows="6"><?php echo set_value('anamnesis'); ?></textarea>
                              </div>
                              <div id="diagnostico" class="tab-pane fade">
                                 <textarea readonly="true" class="form-control" id="diagnostico" name="diagnostico" cols="90" rows="6"><?php echo set_value('diagnostico'); ?></textarea>
                              </div>
                              <div id="tratamiento" class="tab-pane fade">
                                 <textarea readonly="true" class="form-control" id="tratamiento" name="tratamiento" cols="90" rows="6"><?php echo set_value('tratamiento'); ?></textarea>
                              </div>
                              <div id="obs_recomendaciones" class="tab-pane fade">
                                 <textarea readonly="true" class="form-control" id="observaciones" name="observaciones" cols="90" rows="6"><?php echo set_value('observaciones'); ?></textarea>
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
                                                      <?php echo form_checkbox('sg_fiebre','',set_checkbox('sg_fiebre'),' id="sg_fiebre" disabled="disabled" '); ?>&nbsp;&nbsp;FiebreFiebre
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_trans_peso','',set_checkbox('sg_trans_peso'),' id="sg_trans_peso" disabled="disabled" '); ?>&nbsp;&nbsp;Transtornos de Peso
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_malestar_gen','',set_checkbox('sg_malestar_gen'),' id="sg_malestar_gen" disabled="disabled"'); ?>&nbsp;&nbsp;Malestar General
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_problemas_ape','',set_checkbox('sg_problemas_ape'),' id="sg_problemas_ape" disabled="disabled"'); ?>&nbsp;&nbsp;Problemas con el apetito
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_sudoracion_n','',set_checkbox('sg_sudoracion_n'),' id="sg_sudoracion_n" disabled="disabled"'); ?>&nbsp;&nbsp;Sudoración Nocturna
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_insomnio','',set_checkbox('sg_insomnio'),' id="sg_insomnio" disabled="disabled"'); ?>&nbsp;&nbsp;Insomnio
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_angustia','',set_checkbox('sg_angustia'),' id="sg_angustia" disabled="disabled"'); ?>&nbsp;&nbsp;Angustia
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_otros','',set_checkbox('sg_otros'),' id="sg_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-5">
                                                <div class="row">
                                                   Puedes agregar un comentario adicional.
                                                   <hr>
                                                   <textarea class="form-control" readonly="true" id="sg_comentarios" name="sg_comentarios" cols="90" rows="5"><?php echo set_value('sg_comentarios');?></textarea>
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
                                                      <?php echo form_checkbox('resp_disnea','',set_checkbox('resp_disnea'),' id="resp_disnea" disabled="disabled"'); ?>&nbsp;&nbsp;Disnea
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_tos','',set_checkbox('resp_tos'),' id="resp_tos" disabled="disabled"'); ?>&nbsp;&nbsp;Tos
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_exp','',set_checkbox('resp_exp'),' id="resp_exp" disabled="disabled"'); ?>&nbsp;&nbsp;Expectoración
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_hemop','',set_checkbox('resp_hemop'),' id="resp_hemop" disabled="disabled"'); ?>&nbsp;&nbsp;Hemoptisis
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_p_costado','',set_checkbox('resp_p_costado'),' id="resp_p_costado" disabled="disabled"'); ?>&nbsp;&nbsp;Puntada de Costado
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('resp_obs_br','',set_checkbox('resp_obs_br'),' id="resp_obs_br" disabled="disabled"'); ?>&nbsp;&nbsp;Obstrucción bronquial
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('resp_otros','',set_checkbox('resp_otros'),' id="resp_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                                   <textarea class="form-control" readonly="true" id="resp_comentarios" name="resp_comentarios" cols="90" rows="5"><?php echo set_value("resp_comentarios"); ?></textarea>
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
                                                      <?php echo form_checkbox('card_dis_esf','',set_checkbox('card_dis_esf'),' id="card_dis_esf" disabled="disabled"'); ?>&nbsp;&nbsp;Disnea de Esfuerzo
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_ortopnea','',set_checkbox('card_ortopnea'),' id="card_ortopnea" disabled="disabled"'); ?>&nbsp;&nbsp;Ortopnea
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_dis_parox_noc','',set_checkbox('card_dis_parox_noc'),' id="card_dis_parox_noc" disabled="disabled"'); ?>&nbsp;&nbsp;Disnea Paroxística Nocturna
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_edema_ext_inf','',set_checkbox('card_edema_ext_inf'),' id="card_edema_ext_inf" disabled="disabled"'); ?>&nbsp;&nbsp;Edema de extremidades interiores
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_dolor_preco','',set_checkbox('card_dolor_preco'),' id="card_dolor_preco" disabled="disabled"'); ?>&nbsp;&nbsp;Dolor Precordial
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_otros','',set_checkbox('card_otros'),' id="card_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-5">
                                                <div class="row">
                                                   Puedes agregar un comentario adicional.
                                                   <hr>
                                                   <textarea class="form-control" id="card_comentarios" readonly="true" name="card_comentarios" cols="90" rows="5"><?php echo set_value("card_comentarios"); ?></textarea>
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
                                                      <?php echo form_checkbox('gast_p_ape','',set_checkbox('gast_p_ape'),' id="gast_p_ape" disabled="disabled"'); ?>&nbsp;&nbsp;Problemas de Apetito
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_nausas','',set_checkbox('gast_nausas'),' id="gast_nausas" disabled="disabled"'); ?>&nbsp;&nbsp;Nausas
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_vomitos','',set_checkbox('gast_vomitos'),' id="gast_vomitos" disabled="disabled"'); ?>&nbsp;&nbsp;Vomitos
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_disfagia','',set_checkbox('gast_disfagia'),' id="gast_disfagia" disabled="disabled"'); ?>&nbsp;&nbsp;Disfagia
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_pirosis','',set_checkbox('gast_pirosis'),' id="gast_pirosis" disabled="disabled"'); ?>&nbsp;&nbsp;Pirosis
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_diarrea','',set_checkbox('gast_diarrea'),' id="gast_diarrea" disabled="disabled"'); ?>&nbsp;&nbsp;Diarrea
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_constipacion','',set_checkbox('gast_constipacion'),' id="gast_constipacion" disabled="disabled"'); ?>&nbsp;&nbsp;Constipación
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_melena','',set_checkbox('gast_melena'),' id="gast_melena" disabled="disabled"'); ?>&nbsp;&nbsp;Melena
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_otros','',set_checkbox('gast_otros'),' id="gast_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                                   <textarea class="form-control" id="gast_comentarios" name="gast_comentarios" readonly="true" cols="90" rows="5"><?php echo set_value("gast_comentarios") ?></textarea>
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
                                                      <?php echo form_checkbox('geni_disuria','',set_checkbox('geni_disuria'),' id="geni_disuria" disabled="disabled"'); ?>&nbsp;&nbsp;Disuria dolorosa o de esfuerzo
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_polaquiuria','',set_checkbox('geni_polaquiuria'),' id="geni_polaquiuria" disabled="disabled"'); ?>&nbsp;&nbsp;Polaquiuria
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_poliuria','',set_checkbox('geni_poliuria'),' id="geni_poliuria" disabled="disabled"'); ?>&nbsp;&nbsp;Poliuria
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_nicturia','',set_checkbox('geni_nicturia'),' id="geni_nicturia" disabled="disabled"'); ?>&nbsp;&nbsp;Nicturia
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_alt_uri','',set_checkbox('geni_alt_uri'),' id="geni_alt_uri" disabled="disabled"'); ?>&nbsp;&nbsp;Alteración del chorro urinario
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_hematuria','',set_checkbox('geni_hematuria'),' id="geni_hematuria" disabled="disabled"'); ?>&nbsp;&nbsp;Hematuria
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_dolores_lum','',set_checkbox('geni_dolores_lum'),' id="geni_dolores_lum" disabled="disabled"'); ?>&nbsp;&nbsp;Dolores en fosas lumbares
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_otros','',set_checkbox('geni_otros'),' id="geni_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-5">
                                                <div class="row">
                                                   Puedes agregar un comentario adicional.
                                                   <hr>
                                                   <textarea class="form-control" id="geni_comentarios" name="geni_comentarios" readonly="true" cols="90" rows="5"><?php echo set_value("geni_comentarios"); ?></textarea>
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
                                                      <?php echo form_checkbox('neuro_cafalea','',set_checkbox('neuro_cafalea'),' id="neuro_cafalea" disabled="disabled"'); ?>&nbsp;&nbsp;Cafalea
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('neuro_mareos','',set_checkbox('neuro_mareos'),' id="neuro_mareos" disabled="disabled"'); ?>&nbsp;&nbsp;Mareos
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_problemas_coord','',set_checkbox('neuro_problemas_coord'),' id="neuro_problemas_coord" disabled="disabled"'); ?>&nbsp;&nbsp;Problemas de Coordinación
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_paresias','',set_checkbox('neuro_paresias'),' id="neuro_paresias" disabled="disabled"'); ?>&nbsp;&nbsp;Paresias
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_parestesias','',set_checkbox('neuro_parestesias'),' id="neuro_parestesias" disabled="disabled"'); ?>&nbsp;&nbsp;Parestesias
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_otros','',set_checkbox('neuro_otros'),' id="neuro_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-5">
                                                <div class="row">
                                                   Puedes agregar un comentario adicional.
                                                   <hr>
                                                   <textarea class="form-control" id="neuro_comentarios" name="neuro_comentarios" readonly="true" cols="90" rows="5"><?php echo set_value("neuro_comentarios"); ?></textarea>
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
                                                      <?php echo form_checkbox('endo_b_peso','',set_checkbox('endo_b_peso'),' id="endo_b_peso" disabled="disabled"'); ?>&nbsp;&nbsp;Baja de peso
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                                                  
                                                      <?php echo form_checkbox('endo_into_frio','',set_checkbox('endo_into_frio'),' id="endo_into_frio" disabled="disabled"'); ?>&nbsp;&nbsp;Intolerancia al frío
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('endo_into_calor','',set_checkbox('endo_into_calor'),' id="endo_into_calor" disabled="disabled"'); ?>&nbsp;&nbsp;Intolerancia al calor
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                                           
                                                      <?php echo form_checkbox('endo_temblor_fino','',set_checkbox('endo_temblor_fino'),' id="endo_temblor_fino" disabled="disabled"'); ?>&nbsp;&nbsp;Temblor fino
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_polidefecacion','',set_checkbox('endo_polidefecacion'),' id="endo_polidefecacion" disabled="disabled"'); ?>&nbsp;&nbsp;Polidefecacion
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_ronquera','',set_checkbox('endo_ronquera'),' id="endo_ronquera" disabled="disabled"'); ?>&nbsp;&nbsp;Ronquera
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_somnolencia','',set_checkbox('endo_somnolencia'),' id="endo_somnolencia" disabled="disabled"'); ?>&nbsp;&nbsp;Somnolencia
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_sequedad_piel','',set_checkbox('endo_sequedad_piel'),' id="endo_sequedad_piel" disabled="disabled"'); ?>&nbsp;&nbsp;Sequedad de la piel
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_otros','',set_checkbox('endo_otros'),' id="endo_otros" disabled="disabled"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                                   <textarea class="form-control" id="endo_comentarios" name="endo_comentarios" readonly="true" cols="90" rows="5"><?php echo set_value("endo_comentarios"); ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="rs_8" class="tab-pane fade">
                                             <br>
                                             <p>Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                tipo de archivo digital. Recuerda escribir un titulo y una descripción a los archivos que adjuntes. 
                                                Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. 
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
                                                   <textarea class="form-control" id="d_posicion_pie" readonly="true" name="d_posicion_pie" cols="90" rows="5"><?php echo set_value("d_posicion_pie"); ?></textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                   <b>Decúbito /</b> descripción de la posición en decúbito del paciente.
                                                   <hr>
                                                   <textarea class="form-control" id="d_posicion_decubito" readonly="true" name="d_posicion_decubito" cols="90" rows="5"><?php echo set_value("d_posicion_decubito"); ?></textarea>
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
                                                      <?php echo form_checkbox('deammbulación_normal','',set_checkbox('deammbulación_normal'),' id="deammbulación_normal" disabled="disabled"'); ?>&nbsp;&nbsp;Deammbulación normal
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_ataxica','',set_checkbox('marcha_ataxica'),' id="marcha_ataxica" disabled="disabled"'); ?>&nbsp;&nbsp;Marcha atáxica o tabética
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_polineuritis','',set_checkbox('marcha_polineuritis'),' id="marcha_polineuritis" disabled="disabled"'); ?>&nbsp;&nbsp;Marcha de pacientes con polineuritis
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_espastica','',set_checkbox('marcha_espastica'),' id="marcha_espastica" disabled="disabled"'); ?>&nbsp;&nbsp;Marcha espástica (en tijeras)
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_hemiplejico','',set_checkbox('marcha_hemiplejico'),' id="marcha_hemiplejico" disabled="disabled"'); ?>&nbsp;&nbsp;Marcha del hemipléjico
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_parkinsoniana','',set_checkbox('marcha_parkinsoniana'),' id="marcha_parkinsoniana" disabled="disabled"'); ?>&nbsp;&nbsp;Marcha parkinsoniana
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('d_otros_trastornos','',set_checkbox('d_otros_trastornos'),' id="d_otros_trastornos" disabled="disabled"'); ?>&nbsp;&nbsp;Otros trastornos
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
                                                   <textarea class="form-control" id="d_comentarios" name="d_comentarios" readonly="true" cols="90" rows="5"><?php echo set_value("d_comentarios"); ?></textarea>
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
                                                      <?php echo form_checkbox('facie_normal','',set_checkbox('facie_normal'),' id="facie_normal" disabled="disabled"'); ?>&nbsp;&nbsp;Facie normal
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_acromegalica','',set_checkbox('facie_acromegalica'),' id="facie_acromegalica" disabled="disabled"'); ?>&nbsp;&nbsp;Facie acromegálica
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                              
                                                      <?php echo form_checkbox('facie_cushingoide','',set_checkbox('facie_cushingoide'),' id="facie_cushingoide" disabled="disabled"'); ?>&nbsp;&nbsp;Facie cushingoide
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_hipertiroídea','',set_checkbox('facie_hipertiroídea'),' id="facie_hipertiroídea" disabled="disabled"'); ?>&nbsp;&nbsp;Facie hipertiroídea
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_hipotiroidea','',set_checkbox('facie_hipotiroidea'),' id="facie_hipotiroidea" disabled="disabled"'); ?>&nbsp;&nbsp;Facie hipotiroídea o mixedematosa
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_hipocratica','',set_checkbox('facie_hipocratica'),' id="facie_hipocratica" disabled="disabled"'); ?>&nbsp;&nbsp;Facie hipocrática
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_mongolica','',set_checkbox('facie_mongolica'),' id="facie_mongolica" disabled="disabled"'); ?>&nbsp;&nbsp;Facie mongólica (s. de Down)
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_parkinsoniana','',set_checkbox('facie_parkinsoniana'),' id="facie_parkinsoniana" disabled="disabled"'); ?>&nbsp;&nbsp;Facie parkinsoniana
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_febril','',set_checkbox('facie_febril'),' id="facie_febril" disabled="disabled"'); ?>&nbsp;&nbsp;Facie febril
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_mitralica','',set_checkbox('facie_mitralica'),' id="facie_mitralica" disabled="disabled"'); ?>&nbsp;&nbsp;Facie mitrálica
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_otros_trastornos','',set_checkbox('facie_otros_trastornos'),' id="facie_otros_trastornos" disabled="disabled"'); ?>&nbsp;&nbsp;Otros trastornos
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
                                                   <textarea class="form-control" id="facie_comentarios" name="facie_comentarios" readonly="true" cols="90" rows="5"><?php echo set_value("facie_comentarios"); ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="ef_4" class="tab-pane fade">
                                             <br>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   Orientación en el tiempo
                                                   <textarea class="form-control" id="orientacion_t" name="orientacion_t" readonly="true" cols="90" rows="3"><?php echo set_value("orientacion_t"); ?></textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                   Orientación en el espacio
                                                   <textarea class="form-control" id="orientacion_e" name="orientacion_e" readonly="true" cols="90" rows="3"><?php echo set_value("orientacion_e"); ?></textarea>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   Reconocimiento de personas&nbsp;
                                                   <textarea class="form-control" id="reconocimiento_p" name="reconocimiento_p" readonly="true" cols="90" rows="3"><?php echo set_value("reconocimiento_p"); ?></textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                   Nivel de conciencia&nbsp;
                                                   <div class="row">
                                                      <div class="col-sm-3">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('lucidez','',set_checkbox('lucidez'),' id="lucidez" disabled="disabled"'); ?>&nbsp;&nbsp;Lucidez
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-4">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('obnubilacion','',set_checkbox('obnubilacion'),' id="obnubilacion" disabled="disabled"'); ?>&nbsp;&nbsp;Obnubilación
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-5">&nbsp;</div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-3">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('sopor','',set_checkbox('sopor'),' id="sopor" disabled="disabled"'); ?>&nbsp;&nbsp;Sopor
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-4">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('coma','',set_checkbox('coma'),' id="coma" disabled="disabled"'); ?>&nbsp;&nbsp;Coma
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-5">&nbsp;</div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   Comentarios&nbsp;
                                                   <textarea class="form-control" id="conciencia_comentarios" name="conciencia_comentarios" readonly="true" cols="90" rows="3"><?php echo set_value("conciencia_comentarios"); ?></textarea>
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
                                                   <textarea class="form-control" id="piel_color" name="piel_color" readonly="true" cols="90" rows="2"><?php echo set_value("piel_color"); ?></textarea>
                                                   <br>
                                                   Humedad y untuosidad
                                                   <textarea class="form-control" id="piel_humedad_u" name="piel_humedad_u" readonly="true" cols="90" rows="2"><?php echo set_value("piel_humedad_u"); ?></textarea>
                                                   <br>
                                                   Turgor y elasticidad
                                                   <textarea class="form-control" id="piel_turgor_e" name="piel_turgor_e" readonly="true" cols="90" rows="2"><?php echo set_value("piel_turgor_e"); ?></textarea>
                                                   <br>
                                                   Temperatura
                                                   <select name="piel_temperatura" id="piel_temperatura" class="form-control" disabled="disabled" >
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
                                                         <?php echo form_checkbox('piel_sin_lesiones','',set_checkbox('piel_sin_lesiones'),' id="piel_sin_lesiones" disabled="disabled"'); ?>&nbsp;&nbsp;No presenta lesiones
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_Eritema','',set_checkbox('piel_Eritema'),' id="piel_Eritema" disabled="disabled"'); ?>&nbsp;&nbsp;Eritema por exposicion solar
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_mascula','',set_checkbox('piel_mascula'),' id="piel_mascula" disabled="disabled"'); ?>&nbsp;&nbsp;Máscula en la cara
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_papula','',set_checkbox('piel_papula'),' id="piel_papula" disabled="disabled"'); ?>&nbsp;&nbsp;Pápula
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_nodulo','',set_checkbox('piel_nodulo'),' id="piel_nodulo" disabled="disabled"'); ?>&nbsp;&nbsp;Nódulo
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_tumor','',set_checkbox('piel_tumor'),' id="piel_tumor" disabled="disabled"'); ?>&nbsp;&nbsp;Tumor
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_vesicula','',set_checkbox('piel_vesicula'),' id="piel_vesicula" disabled="disabled"'); ?>&nbsp;&nbsp;Vesícula
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_ampolla','',set_checkbox('piel_ampolla'),' id="piel_ampolla" disabled="disabled"'); ?>&nbsp;&nbsp;Ampolla
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_pustula','',set_checkbox('piel_pustula'),' id="piel_pustula" disabled="disabled"'); ?>&nbsp;&nbsp;Pústula
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_placa','',set_checkbox('piel_placa'),' id="piel_placa" disabled="disabled"'); ?>&nbsp;&nbsp;Placa
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_eritema','',set_checkbox('piel_eritema'),' id="piel_eritema" disabled="disabled"'); ?>&nbsp;&nbsp;Eritema
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_escama','',set_checkbox('piel_escama'),' id="piel_escama" disabled="disabled"'); ?>&nbsp;&nbsp;Escama
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_erosion','',set_checkbox('piel_erosion'),' id="piel_erosion" disabled="disabled"'); ?>&nbsp;&nbsp;Erosión
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_ulceracion','',set_checkbox('piel_ulceracion'),' id="piel_ulceracion" disabled="disabled"'); ?>&nbsp;&nbsp;Ulceración
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_costra','',set_checkbox('piel_costra'),' id="piel_costra" disabled="disabled"'); ?>&nbsp;&nbsp;Costra
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_cicatriz','',set_checkbox('piel_cicatriz'),' id="piel_cicatriz" disabled="disabled"'); ?>&nbsp;&nbsp;Cicatriz
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_roncha','',set_checkbox('piel_roncha'),' id="piel_roncha" disabled="disabled"'); ?>&nbsp;&nbsp;Roncha
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_liquenificacion','',set_checkbox('piel_liquenificacion'),' id="piel_liquenificacion" disabled="disabled"'); ?>&nbsp;&nbsp;Liquenificación
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_telangiectasia','',set_checkbox('piel_telangiectasia'),' id="piel_telangiectasia" disabled="disabled"'); ?>&nbsp;&nbsp;Telangiectasia
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_petequia','',set_checkbox('piel_petequia'),' id="piel_petequia" disabled="disabled"'); ?>&nbsp;&nbsp;Petequia
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_equimosis','',set_checkbox('piel_equimosis'),' id="piel_equimosis" disabled="disabled"'); ?>&nbsp;&nbsp;Equímosis
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_vibice','',set_checkbox('piel_vibice'),' id="piel_vibice" disabled="disabled"'); ?>&nbsp;&nbsp;Víbice
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_efelide','',set_checkbox('piel_efelide'),' id="piel_efelide" disabled="disabled"'); ?>&nbsp;&nbsp;Efélide
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_otros_t','',set_checkbox('piel_otros_t'),' id="piel_otros_t" disabled="disabled"'); ?>&nbsp;&nbsp;Otros trastornos
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
                                                         <?php echo form_checkbox('pelos_calvicie','',set_checkbox('pelos_calvicie'),' id="pelos_calvicie" disabled="disabled"'); ?>&nbsp;&nbsp;Calvicie
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('pelos_alopecia','',set_checkbox('pelos_alopecia'),' id="pelos_alopecia" disabled="disabled"'); ?>&nbsp;&nbsp;Alopecía
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('pelos_hirsutismo','',set_checkbox('pelos_hirsutismo'),' id="pelos_hirsutismo" disabled="disabled"'); ?>&nbsp;&nbsp;Hirsutismo
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('pelos_otros_alt','',set_checkbox('pelos_otros_alt'),' id="pelos_otros_alt" disabled="disabled"'); ?>&nbsp;&nbsp;Otras alteraciones
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
                                                         <?php echo form_checkbox('unias_acropaquia','',set_checkbox('unias_acropaquia'),' id="unias_acropaquia" disabled="disabled"'); ?>&nbsp;&nbsp;Acropaquia
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_coiloniquia','',set_checkbox('unias_coiloniquia'),' id="unias_coiloniquia" disabled="disabled"'); ?>&nbsp;&nbsp;Coiloniquia o uña en cuchara
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_psoriasis','',set_checkbox('unias_psoriasis'),' id="unias_psoriasis" disabled="disabled"'); ?>&nbsp;&nbsp;Uñas en psoriasis
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_l_beau','',set_checkbox('unias_l_beau'),' id="unias_l_beau" disabled="disabled"'); ?>&nbsp;&nbsp;Uñas con líneas de Beau
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_l_ungueales_p','',set_checkbox('unias_l_ungueales_p'),' id="unias_l_ungueales_p" disabled="disabled"'); ?>&nbsp;&nbsp;Lechos ungueales pálidos
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_l_ungueales_c','',set_checkbox('unias_l_ungueales_c'),' id="unias_l_ungueales_c" disabled="disabled"'); ?>&nbsp;&nbsp;Lechos ungueales cianóticos
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_renal_c','',set_checkbox('unias_renal_c'),' id="unias_renal_c" disabled="disabled"'); ?>&nbsp;&nbsp;Uñas en la insuficiencia renal crónica
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_hemorragias_s','',set_checkbox('unias_hemorragias_s'),' id="unias_hemorragias_s" disabled="disabled"'); ?>&nbsp;&nbsp;Hemorragias subungueales o en astilla
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
                                                   <textarea class="form-control" id="sl_adenopatia" readonly="true" name="sl_adenopatia" cols="90" rows="5"><?php echo set_value("sl_adenopatia"); ?></textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                   Comentarios
                                                   <hr>
                                                   <textarea class="form-control" id="sl_comercial" readonly="true" name="sl_comercial" cols="90" rows="5"><?php echo set_value("sl_comercial"); ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="ef_7" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-6">
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">F.R.</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input readonly="true" type="text" id="sv_fr" name="sv_fr" class="form-control input-sm" value="<?php echo set_value("sv_fr"); ?>">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">R.P.M.</div>
                                                   <div class="col-sm-8 col-xs-3">&nbsp</div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">Temp.</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input type="text" readonly="true" id="sv_temperatura" name="sv_temperatura" value="<?php echo set_value("sv_temperatura"); ?>" class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">°C</div>
                                                   <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">
                                                      T.A.
                                                   </div>
                                                   <div class="col-sm-3 col-xs-3">
                                                      <input readonly="true" type="text" id="sv_ta_sis" name="sv_ta_sis" value="<?php echo set_value("sv_ta_sis"); ?>" placeholder="sis." class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">
                                                      /
                                                   </div>
                                                   <div class="col-sm-3 col-xs-3">
                                                      <input readonly="true" type="text" id="sv_ta_diast" name="sv_ta_diast" value="<?php echo set_value("sv_ta_diast"); ?>" placeholder="diast." class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">
                                                      mmHg.
                                                   </div>
                                                   <div class="col-sm-9 col-xs-9">&nbsp;</div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">P.A.</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input readonly="true" type="text" id="sv_pa" name="sv_pa" value="<?php echo set_value("sv_pa"); ?>" class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">P.P.M.</div>
                                                   <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                </div>
                                             </div>
                                             <div class="col-sm-6">
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">F.C.</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input readonly="true" type="text" id="sv_fc" name="sv_fc" value="<?php echo set_value("sv_fc"); ?>" class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">L.P.M.</div>
                                                   <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">Peso</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input readonly="true" type="text" id="sv_peso" name="sv_peso" value="<?php echo set_value("sv_peso"); ?>" class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">Kgs.</div>
                                                   <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">Talla</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input readonly="true" type="text" id="sv_talla" name="sv_talla" value="<?php echo set_value("sv_talla"); ?>" class="form-control input-sm">
                                                   </div>
                                                   <div class="col-sm-1 col-xs-1">Cms.</div>
                                                   <div class="col-sm-8 col-xs-3">&nbsp;</div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-2 col-xs-2">IMC</div>
                                                   <div class="col-sm-3 col-xs-6">
                                                      <input readonly="true" type="text" id="sv_imc" name="sv_imc" value="<?php echo set_value("sv_imc"); ?>" class="form-control input-sm">
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
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Examen Físico Segmentado
                                       </a>
                                    </h4>
                                 </div>
                                 <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                       Contenido...
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
               <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
<!-- fin modal informacion consulta médica -->
<!-- modal edicion consulta médica -->
<div class="modal fade editar_consulta_medica" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="gridSystemModalLabel">Editar Consulta Médica&nbsp;&nbsp;<span style="color: red;">(EN CONSTRUCCIÓN)</span></h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <ul class="nav nav-tabs">
                              <li class="active">
                                 <a data-toggle="pill" style="color:#21B9BB;" href="#motivo_consulta_edit">                                                        
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Motivo Consulta Médica
                                 </a>
                              </li>
                              <li>
                                 <a data-toggle="pill" style="color:#21B9BB;" href="#anamnesis_proxima_edit">
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Anam. Próxima
                                 </a>
                              </li>
                              <li>
                                 <a data-toggle="pill" style="color:#21B9BB;" href="#diagnostico_edit">
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Diagnóstico
                                 </a>
                              </li>
                              <li>
                                 <a data-toggle="pill" style="color:#21B9BB;" href="#tratamiento_edit">
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Tratamiento
                                 </a>
                              </li>
                              <li>
                                 <a data-toggle="pill" style="color:#21B9BB;" href="#obs_recomendaciones_edit">
                                 <i class="fa fa-leaf" aria-hidden="true"></i>Observaciones
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div id="motivo_consulta_edit" class="tab-pane fade in active">
                                 <textarea class="form-control" id="motivo" name="motivo" cols="90" rows="6"><?php echo set_value('motivo'); ?></textarea>
                              </div>
                              <div id="anamnesis_proxima_edit" class="tab-pane fade">
                                 <textarea  class="form-control" id="anamnesis" name="anamnesis" cols="90" rows="6"><?php echo set_value('anamnesis'); ?></textarea>
                              </div>
                              <div id="diagnostico_edit" class="tab-pane fade">
                                 <textarea class="form-control" id="diagnostico" name="diagnostico" cols="90" rows="6"><?php echo set_value('diagnostico'); ?></textarea>
                              </div>
                              <div id="tratamiento_edit" class="tab-pane fade">
                                 <textarea class="form-control" id="tratamiento" name="tratamiento" cols="90" rows="6"><?php echo set_value('tratamiento'); ?></textarea>
                              </div>
                              <div id="obs_recomendaciones_edit" class="tab-pane fade">
                                 <textarea class="form-control" id="observaciones" name="observaciones" cols="90" rows="6"><?php echo set_value('observaciones'); ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12" style="margin-top: 5px;">
                           <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseRS" aria-expanded="true" aria-controls="collapseRS">
                                       <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Revisíon por Sistemas
                                       </a>
                                    </h4>
                                 </div>
                                 <div id="collapseRS" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#rs_1_edit">Síntomas Generales<b></b></a></li>
                                          <li><a data-toggle="tab" href="#rs_2_edit">Respiratorio<b></b></a></li>
                                          <li><a data-toggle="tab" href="#rs_3_edit">Cardiovascular</a></li>
                                          <li><a data-toggle="tab" href="#rs_4_edit">Gastroinstestinal</a></li>
                                          <li><a data-toggle="tab" href="#rs_5_edit">Genitourinario</a></li>
                                          <li><a data-toggle="tab" href="#rs_6_edit">Neurológico</a></li>
                                          <li><a data-toggle="tab" href="#rs_7_edit">Endocrino</a></li>
                                          <li><a data-toggle="tab" href="#rs_8_edit">Archivos y Documentos</a></li>
                                       </ul>
                                       <div class="tab-content">
                                          <div id="rs_1_edit" class="tab-pane fade in active">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks"> 
                                                      <?php echo form_checkbox('sg_fiebre','',set_checkbox('sg_fiebre'),' id="sg_fiebre"'); ?>&nbsp;&nbsp;FiebreFiebre
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_trans_peso','',set_checkbox('sg_trans_peso'),' id="sg_trans_peso"'); ?>&nbsp;&nbsp;Transtornos de Peso
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_malestar_gen','',set_checkbox('sg_malestar_gen'),' id="sg_malestar_gen"'); ?>&nbsp;&nbsp;Malestar General
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_problemas_ape','',set_checkbox('sg_problemas_ape'),' id="sg_problemas_ape"'); ?>&nbsp;&nbsp;Problemas con el apetito
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_sudoracion_n','',set_checkbox('sg_sudoracion_n'),' id="sg_sudoracion_n"'); ?>&nbsp;&nbsp;Sudoración Nocturna
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_insomnio','',set_checkbox('sg_insomnio'),' id="sg_insomnio"'); ?>&nbsp;&nbsp;Insomnio
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_angustia','',set_checkbox('sg_angustia'),' id="sg_angustia"'); ?>&nbsp;&nbsp;Angustia
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('sg_otros','',set_checkbox('sg_otros'),' id="sg_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_2_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks"> 
                                                      <?php echo form_checkbox('resp_disnea','',set_checkbox('resp_disnea'),' id="resp_disnea"'); ?>&nbsp;&nbsp;Disnea
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_tos','',set_checkbox('resp_tos'),' id="resp_tos"'); ?>&nbsp;&nbsp;Tos
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_exp','',set_checkbox('resp_exp'),' id="resp_exp"'); ?>&nbsp;&nbsp;Expectoración
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_hemop','',set_checkbox('resp_hemop'),' id="resp_hemop"'); ?>&nbsp;&nbsp;Hemoptisis
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('resp_p_costado','',set_checkbox('resp_p_costado'),' id="resp_p_costado"'); ?>&nbsp;&nbsp;Puntada de Costado
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('resp_obs_br','',set_checkbox('resp_obs_br'),' id="resp_obs_br"'); ?>&nbsp;&nbsp;Obstrucción bronquial
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('resp_otros','',set_checkbox('resp_otros'),' id="resp_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_3_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('card_dis_esf','',set_checkbox('card_dis_esf'),' id="card_dis_esf"'); ?>&nbsp;&nbsp;Disnea de Esfuerzo
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_ortopnea','',set_checkbox('card_ortopnea'),' id="card_ortopnea"'); ?>&nbsp;&nbsp;Ortopnea
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_dis_parox_noc','',set_checkbox('card_dis_parox_noc'),' id="card_dis_parox_noc"'); ?>&nbsp;&nbsp;Disnea Paroxística Nocturna
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_edema_ext_inf','',set_checkbox('card_edema_ext_inf'),' id="card_edema_ext_inf"'); ?>&nbsp;&nbsp;Edema de extremidades interiores
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_dolor_preco','',set_checkbox('card_dolor_preco'),' id="card_dolor_preco"'); ?>&nbsp;&nbsp;Dolor Precordial
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('card_otros','',set_checkbox('card_otros'),' id="card_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_4_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks"> 
                                                      <?php echo form_checkbox('gast_p_ape','',set_checkbox('gast_p_ape'),' id="gast_p_ape"'); ?>&nbsp;&nbsp;Problemas de Apetito
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_nausas','',set_checkbox('gast_nausas'),' id="gast_nausas"'); ?>&nbsp;&nbsp;Nausas
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_vomitos','',set_checkbox('gast_vomitos'),' id="gast_vomitos"'); ?>&nbsp;&nbsp;Vomitos
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_disfagia','',set_checkbox('gast_disfagia'),' id="gast_disfagia"'); ?>&nbsp;&nbsp;Disfagia
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_pirosis','',set_checkbox('gast_pirosis'),' id="gast_pirosis"'); ?>&nbsp;&nbsp;Pirosis
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_diarrea','',set_checkbox('gast_diarrea'),' id="gast_diarrea"'); ?>&nbsp;&nbsp;Diarrea
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_constipacion','',set_checkbox('gast_constipacion'),' id="gast_constipacion"'); ?>&nbsp;&nbsp;Constipación
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_melena','',set_checkbox('gast_melena'),' id="gast_melena"'); ?>&nbsp;&nbsp;Melena
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('gast_otros','',set_checkbox('gast_otros'),' id="gast_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_5_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                     
                                                      <?php echo form_checkbox('geni_disuria','',set_checkbox('geni_disuria'),' id="geni_disuria"'); ?>&nbsp;&nbsp;Disuria dolorosa o de esfuerzo
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_polaquiuria','',set_checkbox('geni_polaquiuria'),' id="geni_polaquiuria"'); ?>&nbsp;&nbsp;Polaquiuria
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_poliuria','',set_checkbox('geni_poliuria'),' id="geni_poliuria"'); ?>&nbsp;&nbsp;Poliuria
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_nicturia','',set_checkbox('geni_nicturia'),' id="geni_nicturia"'); ?>&nbsp;&nbsp;Nicturia
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_alt_uri','',set_checkbox('geni_alt_uri'),' id="geni_alt_uri"'); ?>&nbsp;&nbsp;Alteración del chorro urinario
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_hematuria','',set_checkbox('geni_hematuria'),' id="geni_hematuria"'); ?>&nbsp;&nbsp;Hematuria
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_dolores_lum','',set_checkbox('geni_dolores_lum'),' id="geni_dolores_lum"'); ?>&nbsp;&nbsp;Dolores en fosas lumbares
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('geni_otros','',set_checkbox('geni_otros'),' id="geni_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_6_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_cafalea','',set_checkbox('neuro_cafalea'),' id="neuro_cafalea"'); ?>&nbsp;&nbsp;Cafalea
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('neuro_mareos','',set_checkbox('neuro_mareos'),' id="neuro_mareos"'); ?>&nbsp;&nbsp;Mareos
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_problemas_coord','',set_checkbox('neuro_problemas_coord'),' id="neuro_problemas_coord"'); ?>&nbsp;&nbsp;Problemas de Coordinación
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_paresias','',set_checkbox('neuro_paresias'),' id="neuro_paresias"'); ?>&nbsp;&nbsp;Paresias
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_parestesias','',set_checkbox('neuro_parestesias'),' id="neuro_parestesias"'); ?>&nbsp;&nbsp;Parestesias
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('neuro_otros','',set_checkbox('neuro_otros'),' id="neuro_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_7_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks"> 
                                                      <?php echo form_checkbox('endo_b_peso','',set_checkbox('endo_b_peso'),' id="endo_b_peso"'); ?>&nbsp;&nbsp;Baja de peso
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                                                  
                                                      <?php echo form_checkbox('endo_into_frio','',set_checkbox('endo_into_frio'),' id="endo_into_frio"'); ?>&nbsp;&nbsp;Intolerancia al frío
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                    
                                                      <?php echo form_checkbox('endo_into_calor','',set_checkbox('endo_into_calor'),' id="endo_into_calor"'); ?>&nbsp;&nbsp;Intolerancia al calor
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                                                           
                                                      <?php echo form_checkbox('endo_temblor_fino','',set_checkbox('endo_temblor_fino'),' id="endo_temblor_fino"'); ?>&nbsp;&nbsp;Temblor fino
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_polidefecacion','',set_checkbox('endo_polidefecacion'),' id="endo_polidefecacion"'); ?>&nbsp;&nbsp;Polidefecacion
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_ronquera','',set_checkbox('endo_ronquera'),' id="endo_ronquera"'); ?>&nbsp;&nbsp;Ronquera
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_somnolencia','',set_checkbox('endo_somnolencia'),' id="endo_somnolencia"'); ?>&nbsp;&nbsp;Somnolencia
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_sequedad_piel','',set_checkbox('endo_sequedad_piel'),' id="endo_sequedad_piel"'); ?>&nbsp;&nbsp;Sequedad de la piel
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('endo_otros','',set_checkbox('endo_otros'),' id="endo_otros"'); ?>&nbsp;&nbsp;Otros Sintomas
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
                                          <div id="rs_8_edit" class="tab-pane fade">
                                             <br>
                                             <p>Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                tipo de archivo digital. Recuerda escribir un titulo y una descripción a los archivos que adjuntes. 
                                                Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. 
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseExamenFisico" aria-expanded="false" aria-controls="collapseExamenFisico">
                                       <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Examen Físico
                                       </a>
                                    </h4>
                                 </div>
                                 <div id="collapseExamenFisico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#ef_1_edit">Decúbito</a></li>
                                          <li><a data-toggle="tab" href="#ef_2_edit">Deambulación</a></li>
                                          <li><a data-toggle="tab" href="#ef_3_edit">Facie</a></li>
                                          <li><a data-toggle="tab" href="#ef_4_edit">Conciencia</a></li>
                                          <li><a data-toggle="tab" href="#ef_5_edit">Piel</a></li>
                                          <li><a data-toggle="tab" href="#ef_6_edit">S. Linfático</a></li>
                                          <li><a data-toggle="tab" href="#ef_7_edit">Signos Vitales</a></li>
                                          <li><a data-toggle="tab" href="#ef_8_edit">Archivos y Documentos</a></li>
                                       </ul>
                                       <div class="tab-content">
                                          <div id="ef_1_edit" class="tab-pane fade in active">
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
                                          <div id="ef_2_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Seleccione algun trastorno de marcha que presente el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks"> 
                                                      <?php echo form_checkbox('deammbulación_normal','',set_checkbox('deammbulación_normal'),' id="deammbulación_normal"'); ?>&nbsp;&nbsp;Deammbulación normal
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_ataxica','',set_checkbox('marcha_ataxica'),' id="marcha_ataxica"'); ?>&nbsp;&nbsp;Marcha atáxica o tabética
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_polineuritis','',set_checkbox('marcha_polineuritis'),' id="marcha_polineuritis"'); ?>&nbsp;&nbsp;Marcha de pacientes con polineuritis
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_espastica','',set_checkbox('marcha_espastica'),' id="marcha_espastica"'); ?>&nbsp;&nbsp;Marcha espástica (en tijeras)
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_hemiplejico','',set_checkbox('marcha_hemiplejico'),' id="marcha_hemiplejico"'); ?>&nbsp;&nbsp;Marcha del hemipléjico
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('marcha_parkinsoniana','',set_checkbox('marcha_parkinsoniana'),' id="marcha_parkinsoniana"'); ?>&nbsp;&nbsp;Marcha parkinsoniana
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('d_otros_trastornos','',set_checkbox('d_otros_trastornos'),' id="d_otros_trastornos"'); ?>&nbsp;&nbsp;Otros trastornos
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
                                          <div id="ef_3_edit" class="tab-pane fade">
                                             <br>
                                             <div class="col-sm-7">
                                                Seleccione algun trastorno facie que presente el paciente.
                                                <hr>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks"> 
                                                      <?php echo form_checkbox('facie_normal','',set_checkbox('facie_normal'),' id="facie_normal"'); ?>&nbsp;&nbsp;Facie normal
                                                      </label> 
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_acromegalica','',set_checkbox('facie_acromegalica'),' id="facie_acromegalica"'); ?>&nbsp;&nbsp;Facie acromegálica
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">                              
                                                      <?php echo form_checkbox('facie_cushingoide','',set_checkbox('facie_cushingoide'),' id="facie_cushingoide"'); ?>&nbsp;&nbsp;Facie cushingoide
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_hipertiroídea','',set_checkbox('facie_hipertiroídea'),' id="facie_hipertiroídea"'); ?>&nbsp;&nbsp;Facie hipertiroídea
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_hipotiroidea','',set_checkbox('facie_hipotiroidea'),' id="facie_hipotiroidea"'); ?>&nbsp;&nbsp;Facie hipotiroídea o mixedematosa
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_hipocratica','',set_checkbox('facie_hipocratica'),' id="facie_hipocratica"'); ?>&nbsp;&nbsp;Facie hipocrática
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_mongolica','',set_checkbox('facie_mongolica'),' id="facie_mongolica"'); ?>&nbsp;&nbsp;Facie mongólica (s. de Down)
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_parkinsoniana','',set_checkbox('facie_parkinsoniana'),' id="facie_parkinsoniana"'); ?>&nbsp;&nbsp;Facie parkinsoniana
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_febril','',set_checkbox('facie_febril'),' id="facie_febril"'); ?>&nbsp;&nbsp;Facie febril
                                                      </label>
                                                   </div>
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_mitralica','',set_checkbox('facie_mitralica'),' id="facie_mitralica"'); ?>&nbsp;&nbsp;Facie mitrálica
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-sm-6">
                                                      <label class="radio-inline i-checks">
                                                      <?php echo form_checkbox('facie_otros_trastornos','',set_checkbox('facie_otros_trastornos'),' id="facie_otros_trastornos"'); ?>&nbsp;&nbsp;Otros trastornos
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
                                          <div id="ef_4_edit" class="tab-pane fade">
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
                                                         <?php echo form_checkbox('lucidez','',set_checkbox('lucidez'),' id="lucidez"'); ?>&nbsp;&nbsp;Lucidez
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-4">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('obnubilacion','',set_checkbox('obnubilacion'),' id="obnubilacion"'); ?>&nbsp;&nbsp;Obnubilación
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-5">&nbsp;</div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-3">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('sopor','',set_checkbox('sopor'),' id="sopor"'); ?>&nbsp;&nbsp;Sopor
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-4">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('coma','',set_checkbox('coma'),' id="coma"'); ?>&nbsp;&nbsp;Coma
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
                                          <div id="ef_5_edit" class="tab-pane fade">
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
                                                   <select name="piel_temperatura" id="piel_temperatura" class="form-control" >
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
                                                         <?php echo form_checkbox('piel_sin_lesiones','',set_checkbox('piel_sin_lesiones'),' id="piel_sin_lesiones"'); ?>&nbsp;&nbsp;No presenta lesiones
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
                                                         <?php echo form_checkbox('piel_mascula','',set_checkbox('piel_mascula'),' id="piel_mascula"'); ?>&nbsp;&nbsp;Máscula en la cara
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_papula','',set_checkbox('piel_papula'),' id="piel_papula"'); ?>&nbsp;&nbsp;Pápula
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_nodulo','',set_checkbox('piel_nodulo'),' id="piel_nodulo"'); ?>&nbsp;&nbsp;Nódulo
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_tumor','',set_checkbox('piel_tumor'),' id="piel_tumor"'); ?>&nbsp;&nbsp;Tumor
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_vesicula','',set_checkbox('piel_vesicula'),' id="piel_vesicula"'); ?>&nbsp;&nbsp;Vesícula
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_ampolla','',set_checkbox('piel_ampolla'),' id="piel_ampolla"'); ?>&nbsp;&nbsp;Ampolla
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_pustula','',set_checkbox('piel_pustula'),' id="piel_pustula"'); ?>&nbsp;&nbsp;Pústula
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_placa','',set_checkbox('piel_placa'),' id="piel_placa"'); ?>&nbsp;&nbsp;Placa
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_eritema','',set_checkbox('piel_eritema'),' id="piel_eritema"'); ?>&nbsp;&nbsp;Eritema
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_escama','',set_checkbox('piel_escama'),' id="piel_escama"'); ?>&nbsp;&nbsp;Escama
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_erosion','',set_checkbox('piel_erosion'),' id="piel_erosion"'); ?>&nbsp;&nbsp;Erosión
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_ulceracion','',set_checkbox('piel_ulceracion'),' id="piel_ulceracion"'); ?>&nbsp;&nbsp;Ulceración
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_costra','',set_checkbox('piel_costra'),' id="piel_costra"'); ?>&nbsp;&nbsp;Costra
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_cicatriz','',set_checkbox('piel_cicatriz'),' id="piel_cicatriz"'); ?>&nbsp;&nbsp;Cicatriz
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_roncha','',set_checkbox('piel_roncha'),' id="piel_roncha"'); ?>&nbsp;&nbsp;Roncha
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_liquenificacion','',set_checkbox('piel_liquenificacion'),' id="piel_liquenificacion"'); ?>&nbsp;&nbsp;Liquenificación
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_telangiectasia','',set_checkbox('piel_telangiectasia'),' id="piel_telangiectasia"'); ?>&nbsp;&nbsp;Telangiectasia
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_petequia','',set_checkbox('piel_petequia'),' id="piel_petequia"'); ?>&nbsp;&nbsp;Petequia
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_equimosis','',set_checkbox('piel_equimosis'),' id="piel_equimosis"'); ?>&nbsp;&nbsp;Equímosis
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_vibice','',set_checkbox('piel_vibice'),' id="piel_vibice"'); ?>&nbsp;&nbsp;Víbice
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_efelide','',set_checkbox('piel_efelide'),' id="piel_efelide"'); ?>&nbsp;&nbsp;Efélide
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('piel_otros_t','',set_checkbox('piel_otros_t'),' id="piel_otros_t"'); ?>&nbsp;&nbsp;Otros trastornos
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
                                                         <?php echo form_checkbox('pelos_calvicie','',set_checkbox('pelos_calvicie'),' id="pelos_calvicie"'); ?>&nbsp;&nbsp;Calvicie
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('pelos_alopecia','',set_checkbox('pelos_alopecia'),' id="pelos_alopecia"'); ?>&nbsp;&nbsp;Alopecía
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('pelos_hirsutismo','',set_checkbox('pelos_hirsutismo'),' id="pelos_hirsutismo"'); ?>&nbsp;&nbsp;Hirsutismo
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('pelos_otros_alt','',set_checkbox('pelos_otros_alt'),' id="pelos_otros_alt"'); ?>&nbsp;&nbsp;Otras alteraciones
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
                                                         <?php echo form_checkbox('unias_acropaquia','',set_checkbox('unias_acropaquia'),' id="unias_acropaquia"'); ?>&nbsp;&nbsp;Acropaquia
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_coiloniquia','',set_checkbox('unias_coiloniquia'),' id="unias_coiloniquia"'); ?>&nbsp;&nbsp;Coiloniquia o uña en cuchara
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_psoriasis','',set_checkbox('unias_psoriasis'),' id="unias_psoriasis"'); ?>&nbsp;&nbsp;Uñas en psoriasis
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_l_beau','',set_checkbox('unias_l_beau'),' id="unias_l_beau"'); ?>&nbsp;&nbsp;Uñas con líneas de Beau
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_l_ungueales_p','',set_checkbox('unias_l_ungueales_p'),' id="unias_l_ungueales_p"'); ?>&nbsp;&nbsp;Lechos ungueales pálidos
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_l_ungueales_c','',set_checkbox('unias_l_ungueales_c'),' id="unias_l_ungueales_c"'); ?>&nbsp;&nbsp;Lechos ungueales cianóticos
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_renal_c','',set_checkbox('unias_renal_c'),' id="unias_renal_c"'); ?>&nbsp;&nbsp;Uñas en la insuficiencia renal crónica
                                                         </label>
                                                      </div>
                                                      <div class="col-sm-6">
                                                         <label class="radio-inline i-checks">
                                                         <?php echo form_checkbox('unias_hemorragias_s','',set_checkbox('unias_hemorragias_s'),' id="unias_hemorragias_s"'); ?>&nbsp;&nbsp;Hemorragias subungueales o en astilla
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <!--<textarea class="form-control" id="piel_turgor_e" name="piel_turgor_e" cols="90" rows="2"></textarea>-->
                                                </div>
                                             </div>
                                          </div>
                                          <div id="ef_6_edit" class="tab-pane fade">
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
                                          <div id="ef_7_edit" class="tab-pane fade">
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
                                          <div id="ef_8_edit" class="tab-pane fade">
                                             <br>
                                             <p>
                                                Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                tipo de archivo digital. 
                                                Recuerda escribir un titulo y una descripción a los archivos que adjuntes. 
                                                Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. 
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseExamenFisicoSeg" aria-expanded="false" aria-controls="collapseExamenFisicoSeg">
                                       <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Examen Físico Segmentado
                                       </a>
                                    </h4>
                                 </div>
                                 <div id="collapseExamenFisicoSeg" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                       Contenido...
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
               <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
<!-- fin modal edicion consulta médica -->