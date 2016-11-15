<h4>Consulta Médica N° <?=$examen_fisico["id_consulta"];?> - Detalle Examen Físico</h4>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
   <h4 class="panel-title">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Examen Físico
      </a>
   </h4>
</div>
<div id="collapseTwo" class="panel-collapse" role="tabpanel" aria-labelledby="headingTwo">
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
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="d_posicion_pie" name="d_posicion_pie" cols="90" rows="5"><?=$examen_fisico["decubito"]["descripcion_posicion"];?></textarea>
               </div>
               <div class="col-sm-6">
                  <b>Decúbito /</b> descripción de la posición en decúbito del paciente.
                  <hr>
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="d_posicion_decubito" name="d_posicion_decubito" cols="90" rows="5"><?=$examen_fisico["decubito"]["descripcion_decubito"];?></textarea>
               </div>
            </div>
         </div>
         <div id="ef_2" class="tab-pane fade">
            <br>
            <div class="col-sm-7">
               Trastorno de marcha que presenta el paciente.
               <hr>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks"> 
                     <?php echo form_checkbox('deammbulación_normal','',$examen_fisico["deambulacion"]["deam_normal"],' id="deammbulación_normal" disabled="disabled" '); ?>&nbsp;&nbsp;Deammbulación normal
                     </label> 
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('marcha_ataxica','',$examen_fisico["deambulacion"]["marcha_ataxica"],' disabled="disabled" id="marcha_ataxica" '); ?>&nbsp;&nbsp;Marcha atáxica o tabética
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('marcha_polineuritis','',$examen_fisico["deambulacion"]["marcha_p_polineuritis"],' disabled="disabled" id="marcha_polineuritis" '); ?>&nbsp;&nbsp;Marcha de pacientes con polineuritis
                     </label>
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('marcha_espastica','',$examen_fisico["deambulacion"]["marcha_espastica"],' disabled="disabled" id="marcha_espastica" '); ?>&nbsp;&nbsp;Marcha espástica (en tijeras)
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('marcha_hemiplejico','',$examen_fisico["deambulacion"]["marcha_hemiplejico"],' disabled="disabled" id="marcha_hemiplejico" '); ?>&nbsp;&nbsp;Marcha del hemipléjico
                     </label>
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('marcha_parkinsoniana','',$examen_fisico["deambulacion"]["marcha_parkinsoniana"],' disabled="disabled" id="marcha_parkinsoniana" '); ?>&nbsp;&nbsp;Marcha parkinsoniana
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('d_otros_trastornos','',$examen_fisico["deambulacion"]["otros_trastornos"],' disabled="disabled" id="d_otros_trastornos" '); ?>&nbsp;&nbsp;Otros trastornos
                     </label>
                  </div>
                  <div class="col-sm-6">
                     &nbsp;
                  </div>
               </div>
            </div>
            <div class="col-sm-5">
               <div class="row">
                  Comentarios / Nuevo transtorno.
                  <hr>
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="d_comentarios" name="d_comentarios" cols="90" rows="5"><?=$examen_fisico["deambulacion"]["comentarios"]?></textarea>
               </div>
            </div>
         </div>
         <div id="ef_3" class="tab-pane fade">
            <br>
            <div class="col-sm-7">
               Trastorno facie que presenta el paciente.
               <hr>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks"> 
                     <?php echo form_checkbox('facie_normal','',$examen_fisico["facie"]["facie_normal"],' disabled="disabled" id="facie_normal" '); ?>&nbsp;&nbsp;Facie normal
                     </label> 
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_acromegalica','',$examen_fisico["facie"]["facie_acromegalica"],' disabled="disabled" id="facie_acromegalica" '); ?>&nbsp;&nbsp;Facie acromegálica
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">                              
                     <?php echo form_checkbox('facie_cushingoide','',$examen_fisico["facie"]["facie_cushingoide"],' disabled="disabled" id="facie_cushingoide" '); ?>&nbsp;&nbsp;Facie cushingoide
                     </label>
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_hipertiroídea','',$examen_fisico["facie"]["facie_hipotiroidea"],' disabled="disabled" id="facie_hipertiroídea" '); ?>&nbsp;&nbsp;Facie hipertiroídea
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_hipotiroidea','',$examen_fisico["facie"]["facie_hipertiroidea"],' disabled="disabled" id="facie_hipotiroidea" '); ?>&nbsp;&nbsp;Facie hipotiroídea o mixedematosa
                     </label>
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_hipocratica','',$examen_fisico["facie"]["facie_hipocratica"],' disabled="disabled" id="facie_hipocratica" '); ?>&nbsp;&nbsp;Facie hipocrática
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_mongolica','',$examen_fisico["facie"]["facie_mongolica"],' disabled="disabled" id="facie_mongolica" '); ?>&nbsp;&nbsp;Facie mongólica (s. de Down)
                     </label>
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_parkinsoniana','',$examen_fisico["facie"]["facie_parkinsoniana"],' disabled="disabled" id="facie_parkinsoniana" '); ?>&nbsp;&nbsp;Facie parkinsoniana
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_febril','',$examen_fisico["facie"]["facie_febril"],' disabled="disabled" id="facie_febril" '); ?>&nbsp;&nbsp;Facie febril
                     </label>
                  </div>
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_mitralica','',$examen_fisico["facie"]["facie_mitralica"],' disabled="disabled" id="facie_mitralica" '); ?>&nbsp;&nbsp;Facie mitrálica
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <label class="radio-inline i-checks">
                     <?php echo form_checkbox('facie_otros_trastornos','',$examen_fisico["facie"]["otros_trastornos"],' disabled="disabled" id="facie_otros_trastornos" '); ?>&nbsp;&nbsp;Otros trastornos
                     </label>
                  </div>
                  <div class="col-sm-6">
                     &nbsp;
                  </div>
               </div>
            </div>
            <div class="col-sm-5">
               <div class="row">
                  Comentarios / Nuevo transtorno.
                  <hr>
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="facie_comentarios" name="facie_comentarios" cols="90" rows="5"><?=$examen_fisico["facie"]["comentarios"];?></textarea>
               </div>
            </div>
         </div>
         <div id="ef_4" class="tab-pane fade">
            <br>
            <div class="row">
               <div class="col-sm-6">
                  Orientación en el tiempo
                  <textarea style="background-color: #fff;" class="form-control" id="orientacion_t" name="orientacion_t" cols="90" rows="3" readonly="true"><?=$examen_fisico["conciencia"]["orientacion_tiempo"];?></textarea>
               </div>
               <div class="col-sm-6">
                  Orientación en el espacio
                  <textarea style="background-color: #fff;" class="form-control" id="orientacion_e" name="orientacion_e" cols="90" rows="3" readonly="true"><?=$examen_fisico["conciencia"]["orientacion_espacio"];?></textarea>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  Reconocimiento de personas&nbsp;
                  <textarea style="background-color: #fff;" class="form-control" id="reconocimiento_p" name="reconocimiento_p" cols="90" rows="3" readonly="true"><?=$examen_fisico["conciencia"]["reconocimiento_personas"];?></textarea>
               </div>
               <div class="col-sm-6">
                  Nivel de conciencia&nbsp;
                  <div class="row">
                     <div class="col-sm-3">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('lucidez','',$examen_fisico["conciencia"]["lucidez"],' disabled="disabled" id="lucidez" '); ?>&nbsp;&nbsp;Lucidez
                        </label>
                     </div>
                     <div class="col-sm-4">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('obnubilacion','',$examen_fisico["conciencia"]["obnubilacion"],' disabled="disabled" id="obnubilacion" '); ?>&nbsp;&nbsp;Obnubilación
                        </label>
                     </div>
                     <div class="col-sm-5">&nbsp;</div>
                  </div>
                  <div class="row">
                     <div class="col-sm-3">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('sopor','',$examen_fisico["conciencia"]["sopor"],' disabled="disabled" id="sopor" '); ?>&nbsp;&nbsp;Sopor
                        </label>
                     </div>
                     <div class="col-sm-4">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('coma','',$examen_fisico["conciencia"]["coma"],' disabled="disabled" id="coma" '); ?>&nbsp;&nbsp;Coma
                        </label>
                     </div>
                     <div class="col-sm-5">&nbsp;</div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  Comentarios&nbsp;
                  <textarea class="form-control" id="conciencia_comentarios" name="conciencia_comentarios" cols="90" rows="3" readonly="true" style="background-color: #fff;" ><?=$examen_fisico["conciencia"]["comentarios"];?></textarea>
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
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="piel_color" name="piel_color" cols="90" rows="2"><?=$examen_fisico["piel"]["color"];?></textarea>
                  <br>
                  Humedad y untuosidad
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="piel_humedad_u" name="piel_humedad_u" cols="90" rows="2"><?=$examen_fisico["piel"]["humedad_untuosidad"];?></textarea>
                  <br>
                  Turgor y elasticidad
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="piel_turgor_e" name="piel_turgor_e" cols="90" rows="2"><?=$examen_fisico["piel"]["turgor_elasticidad"];?></textarea>
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
                  Trastorno en la piel que presenta el paciente.
                  <hr>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_sin_lesiones','',$examen_fisico["piel"]["no_lesiones"],' disabled="disabled" id="piel_sin_lesiones" '); ?>&nbsp;&nbsp;No presenta lesiones
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_Eritema','',$examen_fisico["piel"]["eritema"],' disabled="disabled" id="piel_Eritema" '); ?>&nbsp;&nbsp;Eritema por exposicion solar
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_mascula','',$examen_fisico["piel"]["mascula_cara"],' disabled="disabled" id="piel_mascula" '); ?>&nbsp;&nbsp;Máscula en la cara
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_papula','',$examen_fisico["piel"]["papula"],' disabled="disabled" id="piel_papula" '); ?>&nbsp;&nbsp;Pápula
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_nodulo','',$examen_fisico["piel"]["nodulo"],' disabled="disabled" id="piel_nodulo" '); ?>&nbsp;&nbsp;Nódulo
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_tumor','',$examen_fisico["piel"]["tumor"],' disabled="disabled" id="piel_tumor" '); ?>&nbsp;&nbsp;Tumor
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_vesicula','',$examen_fisico["piel"]["vesicula"],' disabled="disabled" id="piel_vesicula" '); ?>&nbsp;&nbsp;Vesícula
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_ampolla','',$examen_fisico["piel"]["ampolla"],' disabled="disabled" id="piel_ampolla" '); ?>&nbsp;&nbsp;Ampolla
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_pustula','',$examen_fisico["piel"]["pustula"],' disabled="disabled" id="piel_pustula" '); ?>&nbsp;&nbsp;Pústula
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_placa','',$examen_fisico["piel"]["placa"],' disabled="disabled" id="piel_placa" '); ?>&nbsp;&nbsp;Placa
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_eritema','',$examen_fisico["piel"]["eritema"],' disabled="disabled" id="piel_eritema" '); ?>&nbsp;&nbsp;Eritema
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_escama','',$examen_fisico["piel"]["escama"],' disabled="disabled" id="piel_escama" '); ?>&nbsp;&nbsp;Escama
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_erosion','',$examen_fisico["piel"]["erosion"],' disabled="disabled" id="piel_erosion" '); ?>&nbsp;&nbsp;Erosión
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_ulceracion','',$examen_fisico["piel"]["ulceracion"],' disabled="disabled" id="piel_ulceracion" '); ?>&nbsp;&nbsp;Ulceración
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_costra','',$examen_fisico["piel"]["costra"],' disabled="disabled" id="piel_costra" '); ?>&nbsp;&nbsp;Costra
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_cicatriz','',$examen_fisico["piel"]["cicatriz"],' disabled="disabled" id="piel_cicatriz" '); ?>&nbsp;&nbsp;Cicatriz
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_roncha','',$examen_fisico["piel"]["roncha"],' disabled="disabled" id="piel_roncha" '); ?>&nbsp;&nbsp;Roncha
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_liquenificacion','',$examen_fisico["piel"]["liquenificacion"],' disabled="disabled" id="piel_liquenificacion" '); ?>&nbsp;&nbsp;Liquenificación
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_telangiectasia','',$examen_fisico["piel"]["telangiectasia"],' disabled="disabled" id="piel_telangiectasia" '); ?>&nbsp;&nbsp;Telangiectasia
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_petequia','',$examen_fisico["piel"]["petequia"],' disabled="disabled" id="piel_petequia" '); ?>&nbsp;&nbsp;Petequia
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_equimosis','',$examen_fisico["piel"]["equimosis"],' disabled="disabled" id="piel_equimosis" '); ?>&nbsp;&nbsp;Equímosis
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_vibice','',$examen_fisico["piel"]["víbice"],' disabled="disabled" id="piel_vibice" '); ?>&nbsp;&nbsp;Víbice
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_efelide','',$examen_fisico["piel"]["efelide"],' disabled="disabled" id="piel_efelide" '); ?>&nbsp;&nbsp;Efélide
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('piel_otros_t','',$examen_fisico["piel"]["otros_trastornos"],' disabled="disabled" id="piel_otros_t" '); ?>&nbsp;&nbsp;Otros trastornos
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
                        <?php echo form_checkbox('pelos_calvicie','',$examen_fisico["piel"]["pelos_calvicie"],' disabled="disabled" id="pelos_calvicie" '); ?>&nbsp;&nbsp;Calvicie
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('pelos_alopecia','',$examen_fisico["piel"]["pelos_alopecia"],' disabled="disabled" id="pelos_alopecia" '); ?>&nbsp;&nbsp;Alopecía
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('pelos_hirsutismo','',$examen_fisico["piel"]["pelos_hirsutismo"],' disabled="disabled" id="pelos_hirsutismo" '); ?>&nbsp;&nbsp;Hirsutismo
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('pelos_otros_alt','',$examen_fisico["piel"]["pelos_otras_alt"],' disabled="disabled" id="pelos_otros_alt" '); ?>&nbsp;&nbsp;Otras alteraciones
                        </label>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="row">
                     <div class="col-sm-12">
                        <b>Uñas:</b> signos presentes.
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_acropaquia','',$examen_fisico["piel"]["unas_acropaquia"],' disabled="disabled" id="unias_acropaquia" '); ?>&nbsp;&nbsp;Acropaquia
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_coiloniquia','',$examen_fisico["piel"]["unas_coiloniquia"],' disabled="disabled" id="unias_coiloniquia" '); ?>&nbsp;&nbsp;Coiloniquia o uña en cuchara
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_psoriasis','',$examen_fisico["piel"]["unas_psoriasis"],' disabled="disabled" id="unias_psoriasis" '); ?>&nbsp;&nbsp;Uñas en psoriasis
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_l_beau','',$examen_fisico["piel"]["unas_líneas_beau"],' disabled="disabled" id="unias_l_beau" '); ?>&nbsp;&nbsp;Uñas con líneas de Beau
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_l_ungueales_p','',$examen_fisico["piel"]["unas_lechos_ungueales_p"],' disabled="disabled" id="unias_l_ungueales_p" '); ?>&nbsp;&nbsp;Lechos ungueales pálidos
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_l_ungueales_c','',$examen_fisico["piel"]["unas_lechos_ungueales_cianoticos"],' disabled="disabled" id="unias_l_ungueales_c" '); ?>&nbsp;&nbsp;Lechos ungueales cianóticos
                        </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_renal_c','',$examen_fisico["piel"]["unas_insuficiencia_renal_cronica"],' disabled="disabled" id="unias_renal_c" '); ?>&nbsp;&nbsp;Uñas en la insuficiencia renal crónica
                        </label>
                     </div>
                     <div class="col-sm-6">
                        <label class="radio-inline i-checks">
                        <?php echo form_checkbox('unias_hemorragias_s','',$examen_fisico["piel"]["unas_hemorragias_subungueales"],' disabled="disabled" id="unias_hemorragias_s" '); ?>&nbsp;&nbsp;Hemorragias subungueales o en astilla
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
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="sl_adenopatia" name="sl_adenopatia" cols="90" rows="5"><?=$examen_fisico["linfatico"]["adenopatia"];?></textarea>
               </div>
               <div class="col-sm-6">
                  Comentarios
                  <hr>
                  <textarea style="background-color: #fff;" readonly="true" class="form-control" id="sl_comercial" name="sl_comercial" cols="90" rows="5"><?=$examen_fisico["linfatico"]["cometarios"];?></textarea>
               </div>
            </div>
         </div>
         <div id="ef_7" class="tab-pane fade">
            <br>
            <div class="col-sm-6">
               <div class="row">
                  <div class="col-sm-2 col-xs-2">F.R.</div>
                  <div class="col-sm-3 col-xs-6">
                      <input style="background-color: #fff;" readonly="true" type="text" id="sv_fr" name="sv_fr" class="form-control input-sm" value="<?=$examen_fisico["signos_vitales"]["fr"];?>">
                  </div>
                  <div class="col-sm-1 col-xs-1">R.P.M.</div>
                  <div class="col-sm-8 col-xs-3">&nbsp</div>
               </div>
               <div class="row">
                  <div class="col-sm-2 col-xs-2">Temp.</div>
                  <div class="col-sm-3 col-xs-6">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_temperatura" name="sv_temperatura" value="<?=$examen_fisico["signos_vitales"]["temperatura"];?>" class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">°C</div>
                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
               </div>
               <div class="row">
                  <div class="col-sm-2 col-xs-2">
                     T.A.
                  </div>
                  <div class="col-sm-3 col-xs-3">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_ta_sis" name="sv_ta_sis" value="<?=$examen_fisico["signos_vitales"]["ta_sis"];?>" placeholder="sis." class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">
                     /
                  </div>
                  <div class="col-sm-3 col-xs-3">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_ta_diast" name="sv_ta_diast" value="<?=$examen_fisico["signos_vitales"]["ta_diast"];?>" placeholder="diast." class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">
                     mmHg.
                  </div>
                  <div class="col-sm-9 col-xs-9">&nbsp;</div>
               </div>
               <div class="row">
                  <div class="col-sm-2 col-xs-2">P.A.</div>
                  <div class="col-sm-3 col-xs-6">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_pa" name="sv_pa" value="<?=$examen_fisico["signos_vitales"]["pa"];?>" class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">P.P.M.</div>
                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="row">
                  <div class="col-sm-2 col-xs-2">F.C.</div>
                  <div class="col-sm-3 col-xs-6">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_fc" name="sv_fc" value="<?=$examen_fisico["signos_vitales"]["fc"];?>" class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">L.P.M.</div>
                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
               </div>
               <div class="row">
                  <div class="col-sm-2 col-xs-2">Peso</div>
                  <div class="col-sm-3 col-xs-6">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_peso" name="sv_peso" value="<?=$examen_fisico["signos_vitales"]["peso"];?>" class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">Kgs.</div>
                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
               </div>
               <div class="row">
                  <div class="col-sm-2 col-xs-2">Talla</div>
                  <div class="col-sm-3 col-xs-6">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_talla" name="sv_talla" value="<?=$examen_fisico["signos_vitales"]["talla"];?>" class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">Cms.</div>
                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
               </div>
               <div class="row">
                  <div class="col-sm-2 col-xs-2">IMC</div>
                  <div class="col-sm-3 col-xs-6">
                     <input style="background-color: #fff;" readonly="true" type="text" id="sv_imc" name="sv_imc" value="<?=$examen_fisico["signos_vitales"]["imc"];?>" class="form-control input-sm">
                  </div>
                  <div class="col-sm-1 col-xs-1">Kg/m2</div>
                  <div class="col-sm-8 col-xs-3">&nbsp;</div>
               </div>
            </div>
         </div>
         <div id="ef_8" class="tab-pane fade">
            <br>
            <input id="archivos_ef" name="imagenes_ef[]" type="file" multiple="true" class="file-loading">
         </div>
      </div>
   </div>
</div>
</div>