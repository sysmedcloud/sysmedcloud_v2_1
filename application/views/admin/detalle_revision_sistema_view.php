<h4>Consulta Médica N° <?=$rev_sist["id_consulta"];?> - Detalle Revisión por Sistemas</h4>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <div class="panel panel-default">
      <div class="panel-heading " role="tab" id="headingOne">
         <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Revisíon por Sistemas
            </a>
         </h4>
      </div>
      <div id="collapseOne" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
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
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks"> 
                           <?php echo form_checkbox('sg_fiebre','',$rev_sist["generales"]["fiebre"],' disabled="disabled" id="sg_fiebre" '); ?>&nbsp;&nbsp;FiebreFiebre
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_trans_peso','',$rev_sist["generales"]["transtornos_peso"],' disabled="disabled" id="sg_trans_peso" '); ?>&nbsp;&nbsp;Transtornos de Peso
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_malestar_gen','',$rev_sist["generales"]["malestar_general"],' disabled="disabled" id="sg_malestar_gen" '); ?>&nbsp;&nbsp;Malestar General
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_problemas_ape','',$rev_sist["generales"]["problemas_apetito"],' disabled="disabled" id="sg_problemas_ape" '); ?>&nbsp;&nbsp;Problemas con el apetito
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_sudoracion_n','',$rev_sist["generales"]["sudoracion_nocturna"],' disabled="disabled" id="sg_sudoracion_n" '); ?>&nbsp;&nbsp;Sudoración Nocturna
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_insomnio','',$rev_sist["generales"]["insomnio"],' disabled="disabled" id="sg_insomnio" '); ?>&nbsp;&nbsp;Insomnio
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_angustia','',$rev_sist["generales"]["angustia"],' disabled="disabled" id="sg_angustia" '); ?>&nbsp;&nbsp;Angustia
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('sg_otros','',$rev_sist["generales"]["otros_sintomas"],' disabled="disabled" id="sg_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="row">
                        Comentario adicional.
                        <hr>
                        <textarea style="background-color: #fff;" readonly="true" class="form-control" id="sg_comentarios" name="sg_comentarios" cols="90" rows="5"><?=$rev_sist["generales"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_2" class="tab-pane fade">
                  <br>
                  <div class="col-sm-7">
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks"> 
                           <?php echo form_checkbox('resp_disnea','',$rev_sist["respiratorios"]["disnea"],' disabled="disabled" id="resp_disnea" '); ?>&nbsp;&nbsp;Disnea
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('resp_tos','',$rev_sist["respiratorios"]["tos"],' disabled="disabled" id="resp_tos" '); ?>&nbsp;&nbsp;Tos
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('resp_exp','',$rev_sist["respiratorios"]["expectoracion"],' disabled="disabled" id="resp_exp" '); ?>&nbsp;&nbsp;Expectoración
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('resp_hemop','',$rev_sist["respiratorios"]["hemoptisis"],' disabled="disabled" id="resp_hemop" '); ?>&nbsp;&nbsp;Hemoptisis
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('resp_p_costado','',$rev_sist["respiratorios"]["puntada_costado"],' disabled="disabled" id="resp_p_costado" '); ?>&nbsp;&nbsp;Puntada de Costado
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                    
                           <?php echo form_checkbox('resp_obs_br','',$rev_sist["respiratorios"]["obstruccion_bronquial"],' disabled="disabled" id="resp_obs_br" '); ?>&nbsp;&nbsp;Obstrucción bronquial
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                    
                           <?php echo form_checkbox('resp_otros','',$rev_sist["respiratorios"]["otros_sintomas"],' disabled="disabled" id="resp_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
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
                        Comentario adicional.
                        <hr>
                        <textarea style="background-color: #fff;" readonly="true" class="form-control" id="resp_comentarios" name="resp_comentarios" cols="90" rows="5"><?=$rev_sist["respiratorios"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_3" class="tab-pane fade">
                  <br>
                  <div class="col-sm-7">
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                    
                           <?php echo form_checkbox('card_dis_esf','',$rev_sist["cardiovasculares"]["disnea_esfuerzo"],' disabled="disabled" id="card_dis_esf" '); ?>&nbsp;&nbsp;Disnea de Esfuerzo
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('card_ortopnea','',$rev_sist["cardiovasculares"]["ortopnea"],' disabled="disabled" id="card_ortopnea" '); ?>&nbsp;&nbsp;Ortopnea
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('card_dis_parox_noc','',$rev_sist["cardiovasculares"]["disnea_paroxistica"],' disabled="disabled" id="card_dis_parox_noc" '); ?>&nbsp;&nbsp;Disnea Paroxística Nocturna
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('card_edema_ext_inf','',$rev_sist["cardiovasculares"]["edema_ext_int"],' disabled="disabled" id="card_edema_ext_inf" '); ?>&nbsp;&nbsp;Edema de extremidades interiores
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('card_dolor_preco','',$rev_sist["cardiovasculares"]["dolor_precordial"],' disabled="disabled" id="card_dolor_preco" '); ?>&nbsp;&nbsp;Dolor Precordial
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('card_otros','',$rev_sist["cardiovasculares"]["otros_sintomas"],' disabled="disabled" id="card_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="row">
                        Comentario adicional.
                        <hr>
                        <textarea style="background-color: #fff;" readonly="true" class="form-control" id="card_comentarios" name="card_comentarios" cols="90" rows="5"><?=$rev_sist["cardiovasculares"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_4" class="tab-pane fade">
                  <br>
                  <div class="col-sm-7">
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks"> 
                           <?php echo form_checkbox('gast_p_ape','',$rev_sist["gastroinstestinales"]["problemas_apetito"],' disabled="disabled" id="gast_p_ape" '); ?>&nbsp;&nbsp;Problemas de Apetito
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_nausas','',$rev_sist["gastroinstestinales"]["nausas"],' disabled="disabled" id="gast_nausas" '); ?>&nbsp;&nbsp;Nausas
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_vomitos','',$rev_sist["gastroinstestinales"]["vomitos"],' disabled="disabled" id="gast_vomitos" '); ?>&nbsp;&nbsp;Vomitos
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_disfagia','',$rev_sist["gastroinstestinales"]["disfagia"],' disabled="disabled" id="gast_disfagia" '); ?>&nbsp;&nbsp;Disfagia
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_pirosis','',$rev_sist["gastroinstestinales"]["pirosis"],' disabled="disabled" id="gast_pirosis" '); ?>&nbsp;&nbsp;Pirosis
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_diarrea','',$rev_sist["gastroinstestinales"]["diarrea"],' disabled="disabled" id="gast_diarrea" '); ?>&nbsp;&nbsp;Diarrea
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_constipacion','',$rev_sist["gastroinstestinales"]["constipacion"],' disabled="disabled" id="gast_constipacion" '); ?>&nbsp;&nbsp;Constipación
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_melena','',$rev_sist["gastroinstestinales"]["melena"],' disabled="disabled" id="gast_melena" '); ?>&nbsp;&nbsp;Melena
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('gast_otros','',$rev_sist["gastroinstestinales"]["otros_sintomas"],' disabled="disabled" id="gast_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                           </label>
                        </div>
                        <div class="col-sm-6">
                           &nbsp;
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="row">
                        Comentario adicional.
                        <hr>
                        <textarea readonly="true" style="background-color: #fff;" class="form-control" id="gast_comentarios" name="gast_comentarios" cols="90" rows="5"><?=$rev_sist["gastroinstestinales"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_5" class="tab-pane fade">
                  <br>
                  <div class="col-sm-7">
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                     
                           <?php echo form_checkbox('geni_disuria','',$rev_sist["genitourinarios"]["disuria"],' disabled="disabled" id="geni_disuria" '); ?>&nbsp;&nbsp;Disuria dolorosa o de esfuerzo
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_polaquiuria','',$rev_sist["genitourinarios"]["polaquiuria"],' disabled="disabled" id="geni_polaquiuria" '); ?>&nbsp;&nbsp;Polaquiuria
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_poliuria','',$rev_sist["genitourinarios"]["poliuria"],' disabled="disabled" id="geni_poliuria" '); ?>&nbsp;&nbsp;Poliuria
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_nicturia','',$rev_sist["genitourinarios"]["nicturia"],' disabled="disabled" id="geni_nicturia" '); ?>&nbsp;&nbsp;Nicturia
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_alt_uri','',$rev_sist["genitourinarios"]["chorro_urinario"],' disabled="disabled" id="geni_alt_uri" '); ?>&nbsp;&nbsp;Alteración del chorro urinario
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_hematuria','',$rev_sist["genitourinarios"]["hematuria"],' disabled="disabled" id="geni_hematuria" '); ?>&nbsp;&nbsp;Hematuria
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_dolores_lum','',$rev_sist["genitourinarios"]["fosas_lumbares"],' disabled="disabled" id="geni_dolores_lum" '); ?>&nbsp;&nbsp;Dolores en fosas lumbares
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('geni_otros','',$rev_sist["genitourinarios"]["otros_sintomas"],' disabled="disabled" id="geni_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="row">
                        Comentario adicional.
                        <hr>
                        <textarea style="background-color: #fff;" readonly="true" class="form-control" id="geni_comentarios" name="geni_comentarios" cols="90" rows="5"><?=$rev_sist["genitourinarios"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_6" class="tab-pane fade">
                  <br>
                  <div class="col-sm-7">
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('neuro_cafalea','',$rev_sist["neurologicos"]["cafalea"],' disabled="disabled" id="neuro_cafalea" '); ?>&nbsp;&nbsp;Cafalea
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                    
                           <?php echo form_checkbox('neuro_mareos','',$rev_sist["neurologicos"]["mareos"],' disabled="disabled" id="neuro_mareos" '); ?>&nbsp;&nbsp;Mareos
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('neuro_problemas_coord','',$rev_sist["neurologicos"]["p_coordinacion"],' disabled="disabled" id="neuro_problemas_coord" '); ?>&nbsp;&nbsp;Problemas de Coordinación
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('neuro_paresias','',$rev_sist["neurologicos"]["paresias"],' disabled="disabled" id="neuro_paresias" '); ?>&nbsp;&nbsp;Paresias
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('neuro_parestesias','',$rev_sist["neurologicos"]["parestesias"],' disabled="disabled" id="neuro_parestesias" '); ?>&nbsp;&nbsp;Parestesias
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('neuro_otros','',$rev_sist["neurologicos"]["otros_sintomas"],' disabled="disabled" id="neuro_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="row">
                        Comentario adicional.
                        <hr>
                        <textarea style="background-color: #fff;" readonly="true" class="form-control" id="neuro_comentarios" name="neuro_comentarios" cols="90" rows="5"><?=$rev_sist["neurologicos"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_7" class="tab-pane fade">
                  <br>
                  <div class="col-sm-7">
                     Sintomas que pueden ser observados en el paciente.
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks"> 
                           <?php echo form_checkbox('endo_b_peso','',$rev_sist["endocrinos"]["baja_peso"],' disabled="disabled" id="endo_b_peso" '); ?>&nbsp;&nbsp;Baja de peso
                           </label> 
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                                                  
                           <?php echo form_checkbox('endo_into_frio','',$rev_sist["endocrinos"]["intolerancia_frio"],' disabled="disabled" id="endo_into_frio" '); ?>&nbsp;&nbsp;Intolerancia al frío
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                    
                           <?php echo form_checkbox('endo_into_calor','',$rev_sist["endocrinos"]["intolerancia_calor"],' disabled="disabled" id="endo_into_calor" '); ?>&nbsp;&nbsp;Intolerancia al calor
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">                                                           
                           <?php echo form_checkbox('endo_temblor_fino','',$rev_sist["endocrinos"]["temblor_fino"],' disabled="disabled" id="endo_temblor_fino" '); ?>&nbsp;&nbsp;Temblor fino
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('endo_polidefecacion','',$rev_sist["endocrinos"]["polidefecacion"],' disabled="disabled" id="endo_polidefecacion" '); ?>&nbsp;&nbsp;Polidefecacion
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('endo_ronquera','',$rev_sist["endocrinos"]["ronquera"],' disabled="disabled" id="endo_ronquera" '); ?>&nbsp;&nbsp;Ronquera
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('endo_somnolencia','',$rev_sist["endocrinos"]["somnolencia"],' disabled="disabled" id="endo_somnolencia" '); ?>&nbsp;&nbsp;Somnolencia
                           </label>
                        </div>
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('endo_sequedad_piel','',$rev_sist["endocrinos"]["sequedad_piel"],' disabled="disabled" id="endo_sequedad_piel" '); ?>&nbsp;&nbsp;Sequedad de la piel
                           </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="radio-inline i-checks">
                           <?php echo form_checkbox('endo_otros','',$rev_sist["endocrinos"]["otros_sintomas"],' disabled="disabled" id="endo_otros" '); ?>&nbsp;&nbsp;Otros Sintomas
                           </label>
                        </div>
                        <div class="col-sm-6">
                           &nbsp;
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="row">
                        Comentario adicional.
                        <hr>
                        <textarea style="background-color: #fff;" readonly="true" class="form-control" id="endo_comentarios" name="endo_comentarios" cols="90" rows="5"><?=$rev_sist["endocrinos"]["comentarios"];?></textarea>
                     </div>
                  </div>
               </div>
               <div id="rs_8" class="tab-pane fade">
                  <br>
                  <input id="archivos_rs" name="imagenes[]" type="file" multiple="true" class="file-loading"> 
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>