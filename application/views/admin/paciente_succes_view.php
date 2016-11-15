<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Registrar Paciente<small></small></h5>
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
                 
                 <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h2>Paciente Ingresado Correctamente.</h2>
                </div>
                <h1 class="logo-name">
                    <img class="img-responsive" src="<?php echo base_url();?>img/logo.png" alt="SysMedCloud" title="SysMedCloud">
                </h1>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?=base_url();?>dashboard_admin" class="btn btn-white">Volver a incio</a>
                       &nbsp;&nbsp;
                       <a href="<?=base_url();?>paciente_admin/listadoPacientes" class="btn btn-primary">Ver mis pacientes</a>
                    </div>
                    <div class="col-md-6">&nbsp;</div>
                 </div>
            </div>
         </div>
      </div>
   </div>
</div>