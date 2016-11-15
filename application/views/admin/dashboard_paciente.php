<!--  inicio contenedor -->

<div class="wrapper wrapper-content">

   <div class="row">

      <div class="col-lg-6">

         <div class="ibox float-e-margins">

            <div class="ibox-title">

               <span class="label label-info pull-right"></span>

               <h5>Consultas Médicas</h5>

            </div>

            <div class="ibox-content">

               <h1 class="no-margins"><?=$cons_paciente;?></h1>

               <div class="stat-percent font-bold text-info"><i class="fa fa-stethoscope"></i></div>

               <small>consultas médicas registradas</small>

            </div>

         </div>

      </div>

      <div class="col-lg-6">

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

   </div>

   <div class="row">

      <div class="col-lg-12">

         <div onclick="location.href = '<?=  base_url();?>perfil_admin';" class="widget lazur-bg" style="cursor: pointer;background-color: #FFF;color:#7CB5EC;margin: 0px;">

            <div class="row vertical-align">

               <div class="col-xs-3">

                  <i class="fa fa-user fa-3x"></i>

               </div>

               <div class="col-xs-9 text-right">

                  <h2 class="font-bold">Actualizar Perfil</h2>

               </div>

            </div>

         </div>

         <div onclick="location.href = '<?=  base_url();?>ficha_medica/ver_detalle/<?=$session['id_usuario'];?>/<?=$hist_c['id_historia_medica'];?>';" class="widget lazur-bg" style="cursor: pointer;background-color: #FFF;color:#7CB5EC;">

            <div class="row vertical-align">

               <div class="col-xs-5">

                  <h2 class="font-bold">Ver Ficha Clínica Electrónica</h2>

               </div>

               <div class="col-xs-7 text-right">

                  <h2 class="font-bold"><i class="fa fa-file-text-o fa-3x"></i></h2>

               </div>

            </div>

         </div>

      </div>
       
   </div>
   <div class="row">

      <div class="col-lg-12">

         <div class="ibox float-e-margins">

            <div class="ibox-title">

               <h5>Mi Historia Clínica</h5>

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

                     <table id="cc_recientes" class="table table-striped table-hover dataTables-example" >

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