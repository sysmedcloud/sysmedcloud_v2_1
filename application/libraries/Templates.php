<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/*
 *
 *   LIBRERIA data empresa: PERMITE retornar informacion de la empresa
 *   version 1.0
*/
class Templates {
    
    /******************************************************************/
    /** @Funtions que permiten mostrar formularios pora 
        el ingreso de datos
    /******************************************************************/
    function add_alergias($tipo)
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal" id="frm_'.$tipo.'"> ';
        $html.= '                <p>Agregue información sobre alergias al sistema.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Nombre Alergia</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_nom_aler" name="txt_nom_aler">  ';
        $html.= '               <span class="help-block m-b-none">Nombre de alergia detectada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Alérgeno detectado</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_aler_det" name="txt_aler_det">  ';
        $html.= '               <span class="help-block m-b-none">Nombre del alérgeno detectado.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Zona afectada</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_zona_afec" name="txt_zona_afec">  ';
        $html.= '               <span class="help-block m-b-none">Indique cual es la zona afectada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Sintomatología</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_sintom" name="txt_sintom">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese los síntomas asociados.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Indicaciones</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_ind" name="txt_ind">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese indicaciones asociadas.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';      
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="button" onclick="ingresar_datos('.$tipo.')">Agregar</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }

    function add_patologias($tipo)
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal" id="frm_'.$tipo.'"> ';
        $html.= '                <p>Agregue información sobre patologías al sistema.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Descripcion</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_desc" name="txt_desc">  ';
        $html.= '               <span class="help-block m-b-none">Descripcion de la patologia.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Sintomatiologia</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_sintom" name="txt_sintom">  ';
        $html.= '               <span class="help-block m-b-none">Sintomatologia asociada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Indicaciones Preliminares</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_ind" name="txt_ind">  ';
        $html.= '               <span class="help-block m-b-none">Indicaciones preliminares sugeridas</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="button" onclick="ingresar_datos('.$tipo.')">Agregar</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';                   
        return $html;
    }


    function add_medicamentos($tipo)
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal" id="frm_'.$tipo.'"> ';
        $html.= '                <p>Agregue información sobre medicamentos al sistema.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Nombre Meciamento</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_nom_med" name="txt_nom_med">  ';
        $html.= '               <span class="help-block m-b-none">Nombre de mecdicamento.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Fecha de Vencimiento</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_fec_venc" name="txt_fec_venc">  ';
        $html.= '               <span class="help-block m-b-none">Fecha de vencimeinto asociada formato dd/mm/yyyy.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Presentacion comercial</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_pres" name="txt_pres">  ';
        $html.= '               <span class="help-block m-b-none">Indique formato comercial del producto.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Via de administración</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_via" name="txt_via">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese la via de administracion del producto.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Principio activo</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_princ" name="txt_princ">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese el principio activo del producto.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Unidad de Medida</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_uni" name="txt_uni">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese la unidad de medida del producto.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Cantidad</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_cant" name="txt_cant">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese la cantidad asociada al producto.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Unidad de referencia</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_uni_ref" name="txt_uni_ref">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese la unidad de referencia del producto.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Nombre laboratorio</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_lab" name="txt_lab">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese el nombre del laboratorio.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';              
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="button" onclick="ingresar_datos('.$tipo.')">Agregar</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }

    function add_vacunas($tipo)
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal" id="frm_'.$tipo.'"> ';
        $html.= '                <p>Agregue información sobre vacunas al sistema.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Nombre Alergia</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_nom_aler" name="txt_nom_aler">  ';
        $html.= '               <span class="help-block m-b-none">Nombre de alergia detectada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Alérgeno detectado</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_aler_det" name="txt_aler_det">  ';
        $html.= '               <span class="help-block m-b-none">Nombre del alérgeno detectado.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Zona afectada</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_zona_afec" name="txt_zona_afec">  ';
        $html.= '               <span class="help-block m-b-none">Indique cual es la zona afectada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Sintomatología</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_sintom" name="txt_sintom">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese los síntomas asociados.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Indicaciones</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_ind" name="txt_ind">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese indicaciones asociadas.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';      
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="button" onclick="ingresar_datos('.$tipo.')">Agregar</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }

    function add_tratamientos($tipo)
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal" id="frm_'.$tipo.'"> ';
        $html.= '                <p>Agregue información sobre tratamientos al sistema.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Nombre Alergia</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_nom_aler" name="txt_nom_aler">  ';
        $html.= '               <span class="help-block m-b-none">Nombre de alergia detectada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Alérgeno detectado</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_aler_det" name="txt_aler_det">  ';
        $html.= '               <span class="help-block m-b-none">Nombre del alérgeno detectado.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Zona afectada</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_zona_afec" name="txt_zona_afec">  ';
        $html.= '               <span class="help-block m-b-none">Indique cual es la zona afectada.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Sintomatología</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_sintom" name="txt_sintom">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese los síntomas asociados.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Indicaciones</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_ind" name="txt_ind">  ';
        $html.= '               <span class="help-block m-b-none">Ingrese indicaciones asociadas.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';      
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="button" onclick="ingresar_datos('.$tipo.')">Agregar</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }
    
    function add_diagnosticos($tipo)
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal" id="frm_'.$tipo.'"> ';
        $html.= '                <p>Agregue información sobre diagnosticos al sistema.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Sistema afectado</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_sis" name="txt_sis">  ';
        $html.= '               <span class="help-block m-b-none">Indique sistema afectado.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Descripcion Diagnóstico</label> ';
        $html.= '            <div class="col-lg-10"><input type="text" class="form-control" id="txt_desc" name="txt_desc">  ';
        $html.= '               <span class="help-block m-b-none">Descripcion del diagnóstico referido.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Reposo / Indicaciones</label> ';
        $html.= '            <div class="col-lg-10"><input type="text"  class="form-control" id="txt_ind" name="txt_ind">  ';
        $html.= '               <span class="help-block m-b-none">Indicaciones o reposo sugerido.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';              
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="button" onclick="ingresar_datos('.$tipo.')">Agregar</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }
    /******************************************************************/
    /** @Function que dibuja HTML y muestra data
    /******************************************************************/

    function show_datos_byID( $param , $opt){     
        $html= '<table class="table table-bordered">';
        $html.= '<thead>';        
        $html.= '</thead>';
        $html.= '<tbody>';
        if($opt == 1){
            foreach ($param as $key_obj => $val_obj) {            
                $html.= '<tr>';                         
                $html.= '  <td align="right">'.$key_obj.'</td>';
                $html.= '  <td align="left" >'.$val_obj.'</td>';
                $html.= '</tr>'; 
            }                            
        }else if($opt == 2){
            foreach ($param as $key_obj => $val_obj) {                            
                $html.= '<tr>';                         
                $html.= '  <td align="right">';
                $html.= '    <label class="col-lg-2 control-label">'.$key_obj.'</label> ';
                $html.= '  </td>';
                $html.= '  <td align="left" >';
                if (preg_match('/id_/',$key_obj) || preg_match('/cod_/',$key_obj)){
                    $html.= '    <label class="col-lg-2 control-label">'.$val_obj.'</label>
                                    <input type="hidden" class="form-control" id="txt_'.$key_obj.'" 
                                    name="txt_'.$key_obj.'" value="'.$val_obj.'">';                   
                }else{
                    $html.= '    <input type="text" class="form-control" id="txt_'.$key_obj.'" 
                                    name="txt_'.$key_obj.'" value="'.$val_obj.'">';
                }
                $html.= '  </td>';
                $html.= '</tr>'; 
            }
        }
        $html.= '</tbody>';
        $html.= '</table>';

        return $html;

    }
    function header_repo(){
        $html = '<html><head>';
        $html.= '<style>
                    .tbl_repo {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                        //padding:6px 4px 6px 4px;
                    }

                    .tbl_repo td, .tbl_repo th {
                        border: 1px solid #dddddd;
                        text-align: left;                        
                    }

                    .tbl_repo tr:nth-child(even) {
                        background-color: #dddddd;
                    }

                    .title-repo{
                        background-color: silver;
                    }
                </style>';
        $html.= '</head></html>';

        return $html;

    }

    /******************************************************************/
    /** @Function que permiten generar reportes
    /******************************************************************/

    function tmp_reporte_medicamentos($param){
        $html = '';
        $html.= $this->header_repo();
        $html.= '<table class="tbl_repo" text-align="left">';
        $html.= '<thead>';
        $html.= '<tr>';                                                    
        $html.= '    <th>Nombre</th>';
        $html.= '    <th>Fecha Venc.</th>';
        $html.= '    <th>Pres. Comerc.</th>';
        $html.= '    <th>Via Adm.</th>';
        $html.= '    <th>Princ. Activo</th>';        
        $html.= '    <th>Laboratorio</th>';           
        $html.= '</tr>';
        $html.= '</thead>';
        $html.= '<tbody>';
        foreach ($param as $key_meds => $val_meds) {
            $html.= '<tr>'; 
            $html.= '  <td>'.$val_meds['nombre_medicamento'].'</td>';
            $html.= '  <td>'.$val_meds['fecha_vencimiento'].'</td>';
            $html.= '  <td>'.$val_meds['presentacion_comercial'].'</td>';
            $html.= '  <td>'.$val_meds['via_administracion'].'</td>';
            $html.= '  <td>'.$val_meds['principio_activo'].'</td>';            
            $html.= '  <td>'.$val_meds['nombre_laboratorio'].'</td>'; 
            $html.= '</tr>'; 
        }                            
        $html.= '</tbody>';
        $html.= '</table>';  
        return $html;
    }

    function tmp_reporte_alergias($param){        
        $html = '';
        $html.= $this->header_repo();
        $html.= '<table class="tbl_repo" text-align="left">';
        $html.= '<thead>';
        $html.= '<tr>';                                                    
        $html.= '    <th>Nombre</th>';
        $html.= '    <th>Alérgeno Detectado</th>';
        $html.= '    <th>Zona Afectada</th>';        
        $html.= '    <th>Sintomatología</th>';        
        $html.= '    <th>Indicaciones</th>';           
        $html.= '</tr>';
        $html.= '</thead>';
        $html.= '<tbody>';
        foreach ($param as $key_meds => $val_aler) {
            $html.= '<tr>'; 
            $html.= '  <td>'.$val_aler['nombre_alergia'].'</td>';
            $html.= '  <td>'.$val_aler['alergeno_detectado'].'</td>';
            $html.= '  <td>'.$val_aler['zona_afectada'].'</td>';
            $html.= '  <td>'.$val_aler['sintomatologia'].'</td>';
            $html.= '  <td>'.$val_aler['indicaciones'].'</td>';                       
            $html.= '</tr>'; 
        }                            
        $html.= '</tbody>';
        $html.= '</table>';  
        return $html;
    }

    function tmp_reporte_diagnosticos($param){
        $html = '';
        $html.= $this->header_repo();
        $html.= '<table class="tbl_repo" text-align="left">';
        $html.= '<thead>';
        $html.= '<tr>';                                                    
        $html.= '    <th>Sistema afectado</th>';
        $html.= '    <th>Descripción</th>';
        $html.= '    <th>Reposo Indicado</th>';               
        $html.= '</tr>';
        $html.= '</thead>';
        $html.= '<tbody>';
        foreach ($param as $key_meds => $val_diag) {
            $html.= '<tr>'; 
            $html.= '  <td>'.$val_diag['sistema_afectado'].'</td>';
            $html.= '  <td>'.$val_diag['desc_diagnostico'].'</td>';
            $html.= '  <td>'.$val_diag['reposo_indicado'].'</td>';             
            $html.= '</tr>'; 
        }                            
        $html.= '</tbody>';
        $html.= '</table>';  
        return $html;
    }

    function tmp_reporte_patologias($param){        
        $html = '';
        $html.= $this->header_repo();
        $html.= '<table class="tbl_repo" text-align="left">';
        $html.= '<thead>';
        $html.= '<tr>';                                                    
        $html.= '    <th>Descripción</th>';
        $html.= '    <th>Sintomatología</th>';
        $html.= '    <th>Indicaciones Preliminares</th>';
        $html.= '</tr>';
        $html.= '</thead>';
        $html.= '<tbody>';
        foreach ($param as $key_meds => $val_pat) {
            $html.= '<tr>'; 
            $html.= '  <td>'.$val_pat['descripcion'].'</td>';
            $html.= '  <td>'.$val_pat['sintomatologia'].'</td>';
            $html.= '  <td>'.$val_pat['indicaciones_preliminares'].'</td>';
            $html.= '</tr>'; 
        }                            
        $html.= '</tbody>';
        $html.= '</table>';  
        return $html;
    }

    function tmp_reporte_pacientes($param){    

        $html = '';
        $html.= $this->header_repo();
        $html.= '<table class="tbl_repo" text-align="left">';
        $html.= '<thead>';
        $html.= '<tr>';                                                    
        $html.= '    <th>Rut</th>';
        $html.= '    <th>Nombres</th>';
        $html.= '    <th>Apellidos</th>';
        $html.= '    <th>Teléfono</th>';
        $html.= '    <th>Celular</th>';
        $html.= '    <th>Email</th>';
        $html.= '    <th>Fecha Nacimiento</th>';
        $html.= '</tr>';
        $html.= '</thead>';
        $html.= '<tbody>';
        foreach ($param as $key_meds => $val_pac) {
            $html.= '<tr>'; 
            $html.= '  <td>'.$val_pac['rut'].'</td>';
            $html.= '  <td>'.ucfirst($val_pac['primer_nombre']).' '.ucfirst($val_pac['segundo_nombre']).'</td>';
            $html.= '  <td>'.ucfirst($val_pac['apellido_paterno']).' '.ucfirst($val_pac['apellido_materno']).'</td>';
            $html.= '  <td>'.$val_pac['telefono'].'</td>';
            $html.= '  <td>'.$val_pac['celular'].'</td>';
            $html.= '  <td>'.$val_pac['email'].'</td>';
            $html.= '  <td>'.$val_pac['fecha_nac'].'</td>';
            $html.= '</tr>'; 
        }                            
        $html.= '</tbody>';
        $html.= '</table>';  
        return $html;
    }

    function tmp_reporte_consultas($param){    
        $html = '';
        $html.= $this->header_repo();
        $html.= '<table class="tbl_repo" text-align="left">';
        $html.= '<thead>';
        $html.= '<tr>';                                                    
        $html.= '    <th>Rut</th>';
        $html.= '    <th>Nombres</th>';
        $html.= '    <th>Apellidos</th>';
        $html.= '    <th>Motivo Consulta</th>';
        $html.= '    <th>Anamnésis</th>';
        $html.= '    <th>Diagnóstico</th>';
        $html.= '    <th>Tratamiento</th>';
        $html.= '    <th>Observaciones</th>';
        $html.= '    <th>Fecha Consulta</th>';
        $html.= '</tr>';
        $html.= '</thead>';
        $html.= '<tbody>';
        foreach ($param as $key_meds => $val_cons) {
            $html.= '<tr>'; 
            $html.= '  <td>'.$val_cons['rut'].'</td>';
            $html.= '  <td>'.ucfirst($val_cons['primer_nombre']).' '.ucfirst($val_cons['segundo_nombre']).'</td>';
            $html.= '  <td>'.ucfirst($val_cons['apellido_paterno']).' '.ucfirst($val_cons['apellido_materno']).'</td>';
            $html.= '  <td>'.$val_cons['motivo_consulta'].'</td>';
            $html.= '  <td>'.$val_cons['anamnesis_proxima'].'</td>';
            $html.= '  <td>'.$val_cons['hipotesis_diagnostica'].'</td>';
            $html.= '  <td>'.$val_cons['tratamiento'].'</td>';
            $html.= '  <td>'.$val_cons['observaciones'].'</td>';
            $html.= '  <td>'.$val_cons['fecha_consulta'].'</td>';
            $html.= '</tr>'; 
        }                            
        $html.= '</tbody>';
        $html.= '</table>';  
        return $html;
    }

    /// Reportes por Paciente ///

    function tmp_reporte_ficha_clinica($param){        
        $html = '';
        $html.= $this->header_repo();
        if($param != 'e'){
            $nc  =  strtoupper($param['ficha_medica']['primer_nombre']).' '.
                    strtoupper($param['ficha_medica']['segundo_nombre']).' '.
                    strtoupper($param['ficha_medica']['apellido_paterno']).' '.
                    strtoupper($param['ficha_medica']['apellido_materno']);
            $img = base_url().'/img/foto_perfil/'.$param['ficha_medica']['imagen']; 
            // Antecedentes Generales
            $html.= '<table class="tbl_repo" text-align="left">';
            $html.= '<thead>';
            $html.= '<tr>';
            $html.= '    <th colspan="3" class="title-repo"><h3> HISTORIA CLINICA PACIENTE : '.$nc.'</h3></th>';
            $html.= '</tr>';
            $html.= '<tr>';
            $html.= '    <th><b>Rut</b></th>';
            $html.= '    <th><b>Nombres</b></th>';
            $html.= '    <th><b>Apellidos</b></th>';
            $html.= '</tr>';
            $html.= '</thead>';
            $html.= '<tbody>';
            $html.= '<tr>';             
            $html.= '  <td>'.$param['ficha_medica']['rut'].'</td>';
            $html.= '  <td>'.ucfirst($param['ficha_medica']['primer_nombre']).' '.ucfirst($param['ficha_medica']['segundo_nombre']).'</td>';
            $html.= '  <td>'.ucfirst($param['ficha_medica']['apellido_paterno']).' '.ucfirst($param['ficha_medica']['apellido_materno']).'</td>';            
            $html.= '</tr>';                            
            $html.= '<tr>';
            $html.= '    <th><b>Género</b></th>';
            $html.= '    <th><b>Fecha de Nacimiento</b></th>';
            $html.= '    <th><b>Estado Civil</b></th>';
            $html.= '    <th><b>Ocupacion</b></th>';
            $html.= '</tr>';
            $html.= '<tr>';
            if($param['ficha_medica']['genero'] == 'M'){
                $html.= '  <td>MASCULINO</td>';
            }else if($param['ficha_medica']['genero'] == 'F'){
                $html.= '  <td>FEMENINO</td>';
            }else{
                $html.= '  <td>SIN DEFINIR</td>';
            }             
            $html.= '  <td>'.$param['ficha_medica']['fecha_nac'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['estado_civil'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['descripcion'].'</td>';            
            $html.= '</tr>';            
            $html.= '<tr>';
            $html.= '    <th><b>Teléfono</b></th>';
            $html.= '    <th><b>Celular</b></th>';
            $html.= '    <th><b>Email</b></th>';
            $html.= '    <th><b>Lugar de Nacimiento</b></th>';
            $html.= '</tr>';            
            $html.= '<tr>';                   
            $html.= '  <td>'.$param['ficha_medica']['telefono'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['celular'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['email'].'</td>';            
            $html.= '  <td>'.$param['ficha_medica']['lugar_nac'].'</td>';            
            $html.= '</tr>';          
            $html.= '<tr>';
            $html.= '    <th><b>Nacionalidad</b></th>';
            $html.= '    <th><b>Region</b></th>';
            $html.= '    <th><b>Provincia</b></th>';
            $html.= '    <th><b>Comuna</b></th>';
            $html.= '    <th><b>Calle</b></th>';
            $html.= '</tr>';           
            $html.= '<tr>';                   
            $html.= '  <td>'.$param['ficha_medica']['nombre'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['REGION_NOMBRE'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['PROVINCIA_NOMBRE'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['COMUNA_NOMBRE'].'</td>';            
            $html.= '  <td>'.$param['ficha_medica']['calle'].'</td>';            
            $html.= '</tr>';
            $html.= '</tbody>';
            $html.= '</table>'; 
            $html.= '<p><hr></p>';
            // Antecedentes Específicos
            $html.= '<table class="tbl_repo" text-align="left">';
            $html.= '<thead>';
            $html.= '<tr>';
            $html.= '    <th colspan="3" class="title-repo"><h3> ANTECEDENTES GENERALES</h3></th>';
            $html.= '</tr>';
            $html.= '<tr>';
            $html.= '    <th><b>Religión</b></th>';
            $html.= '    <th><b>Previsión</b></th>';            
            $html.= '</tr>';
            $html.= '</thead>';
            $html.= '<tbody>';
            $html.= '<tr>';             
            $html.= '  <td>'.$param['ficha_medica']['religion'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['prevision_medica'].'</td>';                                    
            $html.= '</tr>';                            
            $html.= '<tr>';
            $html.= '    <th><b>Nivel de Estudios</b></th>';
            $html.= '    <th><b>Grupo Sanguíneo</b></th>';
            $html.= '    <th><b>Factor RH</b></th>';            
            $html.= '</tr>';
            $html.= '</thead>';
            $html.= '<tbody>';
            $html.= '<tr>';
            $html.= '  <td>'.$param['ficha_medica']['nivel_estudio'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['grupo_sanguineo'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['factor_rh'].'</td>';
            $html.= '</tr>';
            $html.= '</tbody>';
            $html.= '</table>'; 
            $html.= '<p><hr></p>';     
            // Antecedentes Medicos
            $html.= '<table class="tbl_repo" text-align="left">';
            $html.= '<thead>';
            $html.= '<tr>';
            $html.= '    <th colspan="3" class="title-repo"><h3> ANTECEDENTES MEDICOS</h3></th>';
            $html.= '</tr>';
            $html.= '<tr>';
            $html.= '    <th><b>ID Paciente</b></th>';
            $html.= '    <th><b>ID Historia Médica</b></th>';
            $html.= '    <th><b>ID Médico Tratane</b></th>';            
            $html.= '</tr>';
            $html.= '</thead>';
            $html.= '<tbody>'; 
            $html.= '<tbody>';
            $html.= '<tr>';
            $html.= '  <td>'.$param['ficha_medica']['id_paciente'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['id_historia_medica'].'</td>'; 
            $html.= '  <td>'.$param['ficha_medica']['modificado_por'].'</td>';        
            $html.= '</tr>';
            $html.= '<tr>';
            $html.= '    <th colspan="3"><b>Antecedentes Clínicos</b></th>';
            $html.= '</tr>';
            $html.= '<tr>';
            $html.= '  <td>'.$param['ficha_medica']['id_paciente'].'</td>';
            $html.= '  <td>'.$param['ficha_medica']['id_historia_medica'].'</td>'; 
            $html.= '  <td>'.$param['ficha_medica']['modificado_por'].'</td>';        
            $html.= '</tr>';            
            $html.= '</tbody>';
            $html.= '</table>'; 
            $html.= '<p><hr></p>';

        }else{
            $html.= 'No hay datos para mostrar';
        }
        return $html;
    }

        
}
