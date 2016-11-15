<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-success pull-right"></span>
               <h5>Pacientes</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_p;?></h1>
               <div class="stat-percent font-bold text-success"><i class="fa fa-users"></i></div>
               <small>pacientes acitvos</small>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-info pull-right"></span>
               <h5>Consultas Médicas</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_cm;?></h1>
               <div class="stat-percent font-bold text-info"><i class="fa fa-stethoscope"></i></div>
               <small>consultas médicas registradas</small>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-primary pull-right"></span>
               <h5>Citas</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_c;?></h1>
               <div class="stat-percent font-bold text-navy"><i class="fa fa-calendar"></i></div>
               <small>citas registradas</small>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-danger pull-right"></span>
               <h5>Usuarios</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_u;?></h1>
               <div class="stat-percent font-bold text-navy"><i class="fa fa-user"></i></div>
               <small>usuarios activos</small>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div  id="cm_pacientes_genero" style="min-width: 310px; height: 300px; max-width: 600px; margin: 0 auto" class="col-lg-6">
         <table id="cm_pacientes_genero_datatable">
            <thead>
               <tr>
                  <th></th>
                  <th>Hombres</th>
                  <th>Mujeres</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th>Consultas Médicas</th>
                  <td><?=$dist_hm['M'];?></td>
                  <td><?=$dist_hm['F'];?></td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="col-lg-6">
         <div id="pacientes_por_genero" style="min-width: 310px; height: 300px; max-width: 600px; margin: 0 auto"></div>
      </div>
   </div>
   <br>
   <div class="row">
      <div class="col-lg-6">
         <div onclick="location.href = '<?=  base_url();?>paciente_admin/RegistrarPaciente';" class="widget lazur-bg" style="cursor: pointer;background-color: #FFF;color:#7CB5EC;margin: 0px;">
            <div class="row vertical-align">
               <div class="col-xs-3">
                  <i class="fa fa-users fa-3x"></i>
               </div>
               <div class="col-xs-9 text-right">
                  <h2 class="font-bold">Crear Nuevo Paciente</h2>
               </div>
            </div>
         </div>
         <div onclick="location.href = '<?=  base_url();?>agenda';" class="widget lazur-bg" style="cursor: pointer;background-color: #FFF;color:#7CB5EC;">
            <div class="row vertical-align">
               <div class="col-xs-5">
                  <h2>Crear Nueva Cita</h2>
               </div>
               <div class="col-xs-7 text-right">
                  <h2 class="font-bold"><i class="fa fa-calendar fa-3x"></i></h2>
               </div>
            </div>
         </div>
         <div onclick="location.href = '<?=  base_url();?>consulta_medica/nueva_consulta';" class="widget lazur-bg" style="cursor: pointer; background-color: #FFF;color:#7CB5EC;height: 100px;">
            <div class="row vertical-align">
               <div class="col-xs-3">
                  <i class="fa fa-stethoscope fa-3x"></i>
               </div>
               <div class="col-xs-9 text-right">
                  <h2 class="font-bold">Crear Consulta Médica</h2>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Actividades Recientes Agenda</h5>
               <div class="ibox-tools">
                  <!--<span class="label label-warning-light pull-right">10 Messages</span>-->
               </div>
            </div>
            <div class="ibox-content">
               <div>
                  <div class="feed-activity-list">
                     <?=$act_agenda;?>
                  </div>
                  <a href="<?=base_url();?>agenda">Ver detalle de citas</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Historias Clínicas Recientes</h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
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
               <div class="row">
                  <div class="table-responsive">
                     <table id="hc_recientes" class="table table-striped table-hover dataTables-example" >
                        <thead>
                           <tr>
                              <th>Fecha Creación</th>
                              <th>N HCE</th>
                              <th>R.U.T.</th>
                              <th>Nombres</th>
                              <th>Apellidos</th>
                              <th>Ultimo Control</th>
                              <th>Acceso HCE</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>