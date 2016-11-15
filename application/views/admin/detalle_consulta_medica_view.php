<div class="row">
<div class="col-sm-12">
    <h4>Detalle Consulta Médica N° <?=$consulta_med->id_consulta;?></h4>
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
               <br>
               <p><?=$consulta_med->motivo_consulta;?></p>
            </div>
            <div id="anamnesis_proxima" class="tab-pane fade">
               <br>
               <p><?=$consulta_med->anamnesis_proxima;?></p>
            </div>
            <div id="diagnostico" class="tab-pane fade">
               <br>
               <p><?=$consulta_med->hipotesis_diagnostica;?></p>
            </div>
            <div id="tratamiento" class="tab-pane fade">
               <br>
               <p><?=$consulta_med->tratamiento;?></p>
            </div>
            <div id="obs_recomendaciones" class="tab-pane fade">
               <br>
               <p><?=$consulta_med->observaciones;?></p>
            </div>
         </div>
      </div>
   </div>
</div>
</div>