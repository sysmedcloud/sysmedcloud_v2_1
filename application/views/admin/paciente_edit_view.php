<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Edición De Paciente <small>todos los campos obligatorios tienen la etiqueta (*).</small></h5>
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
               <form method="POST" action="<?=base_url();?>paciente_admin/recibirDatosEdit" class="form-horizontal" enctype="multipart/form-data">
                   <input type="hidden" id="id_data_usuario" name="id_usuario" value="<?=$paciente["id_usuario"];?>">
                   <input type="hidden" id="id_usuario" name="id_usuario" value="<?=$paciente["id_usuario"];?>">
                   <div class="form-group">
                     <div class="col-sm-3">
                         <a href="#" class="thumbnail">
                             <img src="<?=base_url();?>img/pacientes/<?php echo $paciente["imagen"]; ?>" class="img-thumbnail" alt="imagen usuario">
                         </a>                       
                        <hr>
                     </div>
                     <div class="col-sm-9">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel blank-panel">
                                 <div class="panel-heading">
                                    <!--<div class="panel-title m-b-md"><h4>Blank Panel with text tabs</h4></div>-->
                                    <div class="panel-options">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#tab-1">Identificación</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-2">Residencia Actual</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-3">Grupo Sanguineo / Factor RH</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-4">Personas de Contacto</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="panel-body">
                                    <div class="tab-content">
                                       <div id="tab-1" class="tab-pane active">
                                            <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>R.U.T</strong>
                                                <input type="text" name="rut" id="rut" onchange="Rut('rut');" placeholder="Ingrese su rut" class="form-control" value="<?=$paciente["rut"];?>">
                                                <?=form_error('rut','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Primer nombre</strong>
                                                <input type="text" name="p_nombre" placeholder="Ingrese su primer nombre" class="form-control " value="<?=$paciente["primer_nombre"];?>">
                                                <?=form_error('p_nombre','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Segundo nombre</strong>
                                                <input type="text" name="s_nombre" placeholder="Ingrese su segundo nombre" class="form-control" value="<?=$paciente["segundo_nombre"];?>">
                                                <?=form_error('s_nombre','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Apellido paterno</strong>
                                                <input type="text" name="a_paterno" placeholder="Ingrese su apellido paterno" class="form-control " value="<?=$paciente["apellido_paterno"];?>">
                                                <?=form_error('a_paterno','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Apellido materno</strong>
                                                <input type="text" name="a_materno" placeholder="Ingrese su apellido materno" class="form-control " value="<?=$paciente["apellido_materno"];?>">
                                                <?=form_error('a_materno','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <?php
                                                   
                                                   //Validar genero
                                                   $v_masculino = $paciente["genero"] == "M" ?  true : false;
                                                   $v_femenino  = $paciente["genero"] == "F" ? true : false;
                                                
                                                   $js     = 'id="genero"';
                                                   $rd_mas =  form_radio('genero', 'M',$v_masculino,$js);
                                                   
                                                   $js2    = 'id="genero"';
                                                   $rd_fem =  form_radio('genero', 'F',$v_femenino,$js);
                                                   
                                                ?>
                                                *&nbsp;<strong>Genero</strong><br>
                                                <label class="radio-inline i-checks"> 
                                                <?=$rd_mas;?> Masculino
                                                </label> 
                                                <label class="radio-inline i-checks">
                                                <?=$rd_fem;?> Femenino
                                                </label>
                                                <?=form_error('genero','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                <strong>Telefono (fijo)</strong>
                                                <input type="text" name="telefono_f" placeholder="Ingrese su telefono (fijo)" class="form-control " value="<?=$paciente["telefono"];?>">
                                                <?=form_error('telefono_f','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Telefono celular</strong>
                                                <input type="text" name="celular" placeholder="Ingrese su telefono celular" class="form-control " value="<?=$paciente["celular"];?>">
                                                <?=form_error('celular','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Correo</strong>
                                                <input type="text" name="correo" placeholder="Ingrese su correo" class="form-control " value="<?=$paciente["email"];?>">
                                                <?=form_error('correo','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                <strong>Estado Civil</strong>
                                                <?=form_dropdown('estado_civil',$est_civil,$paciente["id_estado_civil"],'class="form-control m-b "');?>
                                                <?=form_error('estado_civil','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Fecha Nacimiento ( día / mes /año )</strong>
                                                <input type="text" name="fecha_nac" class="form-control " data-mask="99/99/9999" placeholder="Ingrese su fecha de nacimiento" value="<?=$paciente["fecha_nac"];?>">
                                                <!-- <span class="help-block">( día / mes /año )</span> -->
                                                <?=form_error('fecha_nac','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Lugar de Nacimiento</strong>
                                                <input type="text" name="lugar_nac" class="form-control " placeholder="Lugar de nacimiento" value="<?=$paciente["lugar_nac"];?>">
                                                <?=form_error('lugar_nac','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                <strong>Religión</strong>
                                                <?=form_dropdown('religion',$religiones,$paciente["id_religion"],'class="form-control m-b "');?>
                                                <?=form_error('religion','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>País de residencia</strong>
                                                <?=form_dropdown('pais_res',$paises,$paciente["nacionalidad"],'class="form-control m-b "');?>
                                                <?=form_error('pais_res','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                 &nbsp;
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Prev. Médica:</strong>
                                                <?=form_dropdown('prevision',$prev_med,$paciente["id_prevision"],'class="form-control m-b "');?>
                                                <?=form_error('prevision','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Ocupación:</strong>
                                                <?=form_dropdown('ocupacion',$ocupaciones,$paciente["id_ocupacion"],'class="form-control m-b "');?>
                                                <?=form_error('ocupacion','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Niv. Estudios</strong>
                                                <?=form_dropdown('niv_estudios',$niv_estudios,$paciente["id_nivel_estudio"],'class="form-control m-b "');?>
                                                <?=form_error('n_estudio','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12">
                                                 <h4>Editar imagen del paciente:</h4>
                                                 <input type="hidden" name="imagen_paciente" id="imagen_paciente" value="<?php echo $paciente["imagen"]; ?>">
                                                 <input type="file" name="new_img_paciente" id="new_img_paciente">
                                             </div>
                                          </div>
                                          <!--<div class="hr-line-dashed"></div>-->
                                       </div>
                                       <div id="tab-2" class="tab-pane">
                                          <!--<strong>Donec quam felis</strong>
                                             <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>
                                             <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>-->
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Región</strong>
                                                <?=form_dropdown('region',$regiones,$paciente["id_region"],'id="region" class="form-control m-b "');?>
                                                <?=form_error('region','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Provincia</strong>
                                                <?=form_dropdown('provincia',$provincias,$paciente["id_provincia"],'id="provincia" class="form-control m-b "');?>
                                                <?=form_error('provincia','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Comuna</strong>
                                                <?=form_dropdown('comuna',$comunas,$paciente["id_comuna"],'id="comuna" class="form-control m-b "');?>
                                                <?=form_error('comuna','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-8">
                                                *&nbsp;<strong>Calle / Pasaje / Villa</strong>
                                                <input type="text" name="calle" placeholder="Nombre de la calle, pasaje o villa" class="form-control " value="<?=$paciente["calle"];?>">
                                                <?=form_error('calle','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">&nbsp;</div>
                                          </div>
                                       </div>
                                       <div id="tab-3" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-4">
                                                <strong>Grupo Sanguíneo</strong>
                                                <?=form_dropdown('grupo_sang',$gr_sang,$paciente["id_grupo_sang"],'id="grupo_sang" class="form-control m-b "');?>
                                                <?=form_error('grupo_sang','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Factor RH</strong>
                                                <?=form_dropdown('factorn_rh',$factoresRH,$paciente["id_factor_rh"],'id="factorn_rh" class="form-control m-b "');?>
                                                <?=form_error('factorn_rh','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">&nbsp;</div>
                                          </div>
                                       </div>
                                       <div id="tab-4" class="tab-pane">
                                           <div class="alert alert-warning">
                                               <strong>IMPORTANTE:</strong>
                                               <br>
                                               1-&nbsp; Para agregar o editar una persona de contacto debes ingresar sus nombres,apellidos y su teléfonoo/celular, de lo contrario no se ingresara o editara en el sistema.
                                               <br>
                                               2-&nbsp;Para agregar mas de una persona de contacto debes hacer click en el botón "Agregar Otro Contacto". 
                                               <br>
                                               3-&nbsp;Para eliminar una persona de contacto debes hacer click en el botón "Eliminar Contacto".
                                               <br>
                                               4-&nbsp;Si no deseas agregar personas de contacto, deja todos los campos en blanco.
                                           </div>
                                             <?php 
                                                    //Validar que tenga personas de contacto
                                                    if(!empty($paciente["personas_contacto"])){
                                                        
                                                        $cont = 1;//Contador
                                                        //Recorrer arreglo con las personas de contacto
                                                        foreach ($paciente["personas_contacto"] as $p_contacto){ 
                                                            
                                                            //Solo primer registro tendra boton para agregar mas contactos
                                                            if($cont == 1){ ?>
                                                                
                                                                <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Nombres</strong>
                                                                    <input type="hidden" name="pc_ids[]" id="pc_ids[]" value="<?=$p_contacto["id_persona_contacto"]?>">
                                                                    <input type="text" name="pc_nombres[]" id="pc_nombres" class="form-control m-b " value="<?=$p_contacto["nombres"]; ?>">
                                                                    <?=form_error('pc_nombres','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                    <strong>Apellidos</strong>
                                                                    <input type="text" name="pc_apellidos[]" id="pc_apellidos" class="form-control m-b " value="<?=$p_contacto["apellidos"]; ?>">
                                                                    <?=form_error('pc_apellidos','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                  <div class="col-md-4">
                                                                    <strong>Familiaridad</strong>
                                                                    <?=form_dropdown('familiariodad[]',$parentescos,$p_contacto["id_parentesco"],'id="factorn_rh" class="form-control m-b "');?>
                                                                    <?=form_error('familiariodad','<div class="text-danger">','</div>');?>
                                                                  </div>
                                                                </div>
                                                                <div class="row">
                                                                 <div class="col-md-4">
                                                                    <strong>Telefono/Celular</strong>
                                                                    <input type="text" name="pc_telefono[]" id="pc_telefono" class="form-control m-b " value="<?=$p_contacto["telefono"]; ?>">
                                                                    <?=form_error('pc_telefono','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                    <strong>Correo</strong>
                                                                    <input type="text" name="pc_correo[]" id="pc_correo" class="form-control m-b " value="<?=$p_contacto["correo"];  ?>">
                                                                    <?=form_error('pc_correo','<div class="text-danger">','</div>');?>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                     <br>
                                                                     <a href="javascript:;" onclick="newFile();" id="plus" class="btn btn-primary">Agregar Otro Contacto</a>
                                                                 </div>
                                                                </div>
                                                                
                                                            <?php }else{ ?>
                                                                
                                                                <div id="group_<?=$cont;?>">
                                                                <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Nombres</strong>
                                                                    <input type="hidden" name="pc_ids[]" id="pc_ids[]" value="<?=$p_contacto["id_persona_contacto"]?>">
                                                                    <input type="text" name="pc_nombres[]" id="pc_nombres" class="form-control m-b " value="<?=$p_contacto["nombres"]; ?>">
                                                                    <?=form_error('pc_nombres','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                    <strong>Apellidos</strong>
                                                                    <input type="text" name="pc_apellidos[]" id="pc_apellidos" class="form-control m-b " value="<?=$p_contacto["apellidos"]; ?>">
                                                                    <?=form_error('pc_apellidos','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                  <div class="col-md-4">
                                                                    <strong>Familiaridad</strong>
                                                                    <?=form_dropdown('familiariodad[]',$parentescos,$p_contacto["id_parentesco"],'id="factorn_rh" class="form-control m-b "');?>
                                                                    <?=form_error('familiariodad','<div class="text-danger">','</div>');?>
                                                                  </div>
                                                                </div>
                                                                <div class="row">
                                                                 <div class="col-md-4">
                                                                    <strong>Telefono/Celular</strong>
                                                                    <input type="text" name="pc_telefono[]" id="pc_telefono" class="form-control m-b " value="<?=$p_contacto["telefono"]; ?>">
                                                                    <?=form_error('pc_telefono','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                    <strong>Correo</strong>
                                                                    <input type="text" name="pc_correo[]" id="pc_correo" class="form-control m-b " value="<?=$p_contacto["correo"];  ?>">
                                                                    <?=form_error('pc_correo','<div class="text-danger">','</div>');?>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                     <br>
                                                                     <a href="javascript:;" title="Eliminar contacto" onclick="deleteFile(<?=$cont;?>);" id="delete_<?=$cont;?>" class="delete btn btn-danger">Eliminar Contacto<i class="fa fa-fw fa-times"></i></a>
                                                                 </div>
                                                                </div>
                                                                </div>
                                                                
                                                            <?php }
                                                        
                                                    ?>
                                                    
                                                    <?php $cont++; }
                                                        
                                                    }else{ ?>
                                                            
                                                                <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Nombres</strong>
                                                                    <input type="hidden" name="pc_ids[]" id="pc_ids[]" value="">
                                                                    <input type="text" name="pc_nombres[]" id="pc_nombres" class="form-control m-b " value="">
                                                                    <?=form_error('pc_nombres','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                    <strong>Apellidos</strong>
                                                                    <input type="text" name="pc_apellidos[]" id="pc_apellidos" class="form-control m-b " value="">
                                                                    <?=form_error('pc_apellidos','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                  <div class="col-md-4">
                                                                    <strong>Familiaridad</strong>
                                                                    <?=form_dropdown('familiariodad[]',$parentescos,"",'id="factorn_rh" class="form-control m-b "');?>
                                                                    <?=form_error('familiariodad','<div class="text-danger">','</div>');?>
                                                                  </div>
                                                                </div>
                                                                <div class="row">
                                                                 <div class="col-md-4">
                                                                    <strong>Telefono/Celular</strong>
                                                                    <input type="text" name="pc_telefono[]" id="pc_telefono" class="form-control m-b " value="">
                                                                    <?=form_error('pc_telefono','<div class="text-danger">','</div>');?>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                    <strong>Correo</strong>
                                                                    <input type="text" name="pc_correo[]" id="pc_correo" class="form-control m-b " value="">
                                                                    <?=form_error('pc_correo','<div class="text-danger">','</div>');?>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                     <br>
                                                                     <a href="javascript:;" onclick="newFile();" id="plus" class="btn btn-primary">Agregar Otro Contacto</a>
                                                                 </div>
                                                                </div>
                                                       
                                                    <?php }
                                                    
                                             ?>
                                           <div id="inFiles">
                                               <input type="hidden" id="contador" name="contador"  value="1">
                                           </div>
                                       </div>
                                    </div>
                                 </div>

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
                                        Recuerda completar todos los campos que sean obligatorios.
                                        <br>
                                        Asegúrate de ingresar todos los datos correctamente.
                                        <br>
                                        <a class="alert-link" href="#">¡Inténtelo otra vez!</a>.
                                    </div>
                                   <?php } ?> 
                                </div>
                                 
                                 <div class="hr-line-dashed"></div>
                                 &nbsp;
                                 <div class="row">
                                    <div class="col-md-6">
                                       <button class="btn btn-white" type="button">Cancelar</button>
                                       &nbsp;&nbsp;
                                       <button class="btn btn-primary" type="submit">Editar Paciente</button>
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
<script>
//Función para añadir un nuevo input file
function newFile(){
    
    var html = '<div id="group_'+$("#contador").val()+'"><div class="row"><hr>'+
                '<div class="col-md-4">'+
                   '<strong>Nombres</strong>'+
                   '<input type="hidden" name="pc_ids[]" id="pc_ids[]" value="">'+
                   '<input type="text" name="pc_nombres[]" id="pc_nombres" class="form-control m-b " value="">'+
               '</div>'+
                '<div class="col-md-4">'+
                   '<strong>Apellidos</strong>'+
                   '<input type="text" name="pc_apellidos[]" id="pc_apellidos" class="form-control m-b " value="">'+
                '</div>'+
                 '<div class="col-md-4">'+
                   '<strong>Familiaridad</strong>'+
                   '<select class="form-control m-b " id="factorn_rh" name="familiariodad[]">'+
                   '<option selected="selected" value="">Seleccione un parentesco</option>'+
                   '<option value="1">Padres</option>'+
                   '<option value="2">Hijos</option>'+
                   '<option value="3">Cónyuge</option>'+
                   '<option value="4">Suegro</option>'+
                   '<option value="5">Yerno/nuera</option>'+
                   '<option value="6">Abuelos</option>'+
                   '<option value="7">Nietos</option>'+
                   '<option value="8">Hermanos</option>'+
                   '<option value="9">Cuñados</option>'+
                   '<option value="10">Bisabuelos Y Bisnietos</option>'+
                   '<option value="11">Tíos Y Sobrinos</option>'+
                   '<option value="12">Primos Y Tíos Abuelos</option>'+
                   '</select>'+
                '</div>'+
             '</div>'+
              '<div class="row">'+
                '<div class="col-md-4">'+
                   '<strong>Telefono/Celular</strong>'+
                   '<input type="text" name="pc_telefono[]" id="pc_telefono" class="form-control m-b " value="">'+
                '</div>'+
                '<div class="col-md-4">'+
                   '<strong>Correo</strong>'+
                   '<input type="text" name="pc_correo[]" id="pc_correo" class="form-control m-b " value="">'+
                '</div>'+
                 '<div class="col-md-4">'+
                     '<br>'+
                     '<a href="javascript:;" title="Eliminar contacto" onclick="deleteFile('+$("#contador").val()+');" id="delete_'+$("#contador").val()+'" class="delete btn btn-danger">Eliminar Contacto<i class="fa fa-fw fa-times"></i></a>'+
                 '</div>'+
             '</div></div>';
             
    $("#inFiles").append(html);
    var cont = $("#contador").val()+1;
    $("#contador").val(cont);
    //Si el contador es igual a 5 se bloquea el boton añadir nuevo input
    if(cont == 5){
        $("#plus").addClass("disabled");
        $("#msj").html("&nbsp; *Maximo de archivos permitidos!.");
    }

}

//Eliminar un input de archivo
function deleteFile(num){
    $("#group_"+num+"").remove();
    cont = cont - 1;
   if(cont < 5){
        $("#plus").removeClass("disabled");
        $("#msj").html("");
    }
}
</script>