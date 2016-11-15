<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de pacientes registrados </h5>
                    &nbsp;&nbsp;( 
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Ver Historia Clínica, 
                    <i class="fa fa-pencil-square-o"></i>&nbsp;Editar Datos Paciente, 
                    <i class="fa fa-eye"></i>&nbsp;Ver Información del Paciente, 
                    <i class="fa fa-times"></i>&nbsp;Eliminar Paciente)
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
                    <table id="pacientes" class="table table-striped table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Fecha Creación</th>
                        <th>R.U.T.</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>HC</th>
                        <th>E</th>
                        <th>V</th>
                        <th>E</th>
                    </tr>
                    </thead>
                </table>
                </div>    
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-user fa-2x"></i>&nbsp;Información del paciente</h4>
          </div>
          <div class="modal-body">
              <div id="datos_paciente"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

      </div>
    </div>
</div>