<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        //Cargar modelo utilizado en este CI
        $this->load->model('Gestion_model', 'gestion');
        
        //Cargamos todas las librerias que utilizaremos
         $this->load->library(array(
            'form_validation',//funciones para los formularios
            'session',//iniciar session
            'fileclass',//control css y js para cada pagina
            'general_sessions',//Validar datos de session
            'data_empresa',//informacion de la empresa
            'gestion_view',//controlar vistas
            'templates'//Carga vistas por ajax
            ));
            
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html','funciones_system'));
    }
    
    public function index()
    {
        $this->gestion();
    }
    
    /**************************************************************************/
    /** @Function que permite retornar pagina de inicio
    /**************************************************************************/
    public function gestion(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']  = $this->fileclass->files_gestion();
        
        $data["menu"]   = "Gestión de Datos";
        
        $data["active"] = activeMenu("gestion");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("gestion_view",$data);
    }

   
    function ajax()
        {   

            switch(@$_POST['case'])
            {
                case 1: // Ver / Editar Informacion
                    switch (@$_POST['tipo']) {
                        case '1': 
                            # Alergias
                            $r = $this->gestion->get_alergias();
                            
                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                            
                            $html.= '    <th>Nombre</th>';
                            $html.= '    <th>Alergeno Detectado</th>';               
                            $html.= '    <th>Zona Afectada</th>';  
                            $html.= '    <th>Sintomatología</th>';
                            $html.= '    <th>Indicaciones</th>';
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_alergia => $val_alergia) {
                                $html.= '<tr>';
                                $html.= '  <td>'.$val_alergia['nombre_alergia'].'</td>';
                                $html.= '  <td>'.$val_alergia['alergeno_detectado'].'</td>';
                                $html.= '  <td>'.$val_alergia['zona_afectada'].'</td>';
                                $html.= '  <td>'.$val_alergia['sintomatologia'].'</td>';
                                $html.= '  <td>'.$val_alergia['indicaciones'].'</td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                            onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_alergia['cod_alergia'].',1)">
                                            <i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                            onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_alergia['cod_alergia'].',2)">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  

                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));

                            break;
                        case '2': 
                            # Patologías
                            $r = $this->gestion->get_patologias();                         

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                           
                            $html.= '    <th>Descripción</th>';
                            $html.= '    <th>Sintomatología</th>';
                            $html.= '    <th>Indicaciones Preliminares</th>';
                            $html.= '    <th>Ver</th>';   
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_patologia => $val_patologia) {                               
                                $html.= '<tr>';
                                $html.= '  <td>'.$val_patologia['descripcion'].'</td>';  
                                $html.= '  <td>'.$val_patologia['sintomatologia'].'</td>';  
                                $html.= '  <td>'.$val_patologia['indicaciones_preliminares'].'</td>';                                
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                            onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_patologia['id_patologia'].',1)">
                                            <i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                            onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_patologia['id_patologia'].',2)">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>';  
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                   
                            break;
                        case '3': 
                            # Medicamentos
                            $r = $this->gestion->get_medicamentos();

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                    
                            $html.= '    <th>Nombre</th>';
                            $html.= '    <th>Fecha Venc.</th>';
                            $html.= '    <th>Pres. Comerc.</th>';
                            $html.= '    <th>Via Adm.</th>';
                            $html.= '    <th>Princ. Activo</th>';
                            $html.= '    <th>U. M.</th>';
                            $html.= '    <th>Cant.</th>';
                            $html.= '    <th>U. R.</th>';
                            $html.= '    <th>Laboratorio</th>';
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_meds => $val_meds) {
                                $html.= '<tr>'; 
                                $html.= '  <td>'.$val_meds['nombre_medicamento'].'</td>';
                                $html.= '  <td>'.$val_meds['fecha_vencimiento'].'</td>';
                                $html.= '  <td>'.$val_meds['presentacion_comercial'].'</td>';
                                $html.= '  <td>'.$val_meds['via_administracion'].'</td>';
                                $html.= '  <td>'.$val_meds['principio_activo'].'</td>';
                                $html.= '  <td>'.$val_meds['unidad_medida'].'</td>';
                                $html.= '  <td>'.$val_meds['cantidad'].'</td>';
                                $html.= '  <td>'.$val_meds['unidad_referencia'].'</td>';
                                $html.= '  <td>'.$val_meds['nombre_laboratorio'].'</td>'; 
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                            onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_meds['cod_medicamento'].',1)">
                                            <i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                            onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_meds['cod_medicamento'].',2)">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '4': 
                            # Vacunas
                            $r = $this->gestion->get_vacunas(); //Falta tabla

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                    
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_vacunas => $val_vacunas) {
                                $html.= '<tr>';                         
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                        onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_vacunas['cod_alergia'].',1)">
                                        <i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"
                                        onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_vacunas['cod_alergia'].',2)">
                                        <i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>';  
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '5': 
                            # Tratamientos
                            $r = $this->gestion->get_tratamientos(); // Falta tabla

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                     
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_tratamientos => $val_tratamientos) {
                                $html.= '<tr>';                            
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                        onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_tratamientos['cod_alergia'].'.1)">
                                        <i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                        onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_tratamientos['cod_alergia'].',2)">
                                        <i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>';  
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                           echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '6': 
                            # Diagnósticos
                            $r = $this->gestion->get_diagnosticos();

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                 
                            $html.= '    <th>Sistema Afectado</th>';
                            $html.= '    <th>Descripción Diagnóstico</th>';
                            $html.= '    <th>Reposo Indicado</th>';
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_diag => $val_diag) {

                                $html.= '<tr>';                            
                                $html.= '  <td>'.$val_diag['sistema_afectado'].'</td>'; 
                                $html.= '  <td>'.$val_diag['desc_diagnostico'].'</td>'; 
                                $html.= '  <td>'.$val_diag['reposo_indicado'].'</td>'; 
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                        onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_diag['cod_diagnostico'].',1)">
                                        <i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" 
                                        onclick="ver_dato('.intval(@$_POST['tipo']).','.$val_diag['cod_diagnostico'].',2)">
                                        <i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        default:
                            # Error
                            echo json_encode(array("html" => "Error", "tipo" => @$_POST['tipo']));
                            break;
                    };                    
                break;
                case 2: // Ingreso de Informacion
                    $tipo = intval(@$_POST['tipo']);
                    switch ($tipo) {
                       case '1':
                            # Alergias
                            $html = $this->templates->add_alergias($tipo);
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                           break;
                        case '2':
                            # Patologías
                            $html = $this->templates->add_patologias($tipo);
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '3':
                            # Medicamentos
                            $html = $this->templates->add_medicamentos($tipo);
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '4':
                            # Vacunas
                            $html = $this->templates->add_vacunas($tipo);
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '5':
                            # Tratamientos
                            $html = $this->templates->add_tratamientos($tipo);
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));    
                            break;
                        case '6':
                            # Diagnosticos
                            $html = $this->templates->add_diagnosticos($tipo);
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));    
                            break;
                       default:
                           echo json_encode(array("html" => "Error", "tipo" => @$_POST['tipo']));
                           break;
                    }   
                    break;
                case 3: // Eliminacion de Informacion
                    switch (@$_POST['tipo']) {
                        case '1': 
                            # Alergias
                            $r = $this->gestion->get_alergias();
                            
                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                            
                            $html.= '    <th>Nombre</th>';
                            $html.= '    <th>Alergeno Detectado</th>';               
                            $html.= '    <th>Zona Afectada</th>';  
                            $html.= '    <th>Sintomatología</th>';
                            $html.= '    <th>Indicaciones</th>';                            
                            $html.= '    <th>Eliminar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_alergia => $val_alergia) {
                                $html.= '<tr>';
                                $html.= '  <td>'.$val_alergia['nombre_alergia'].'</td>';
                                $html.= '  <td>'.$val_alergia['alergeno_detectado'].'</td>';
                                $html.= '  <td>'.$val_alergia['zona_afectada'].'</td>';
                                $html.= '  <td>'.$val_alergia['sintomatologia'].'</td>';
                                $html.= '  <td>'.$val_alergia['indicaciones'].'</td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" onclick="eliminar_dato('.intval(@$_POST['tipo']).','.$val_alergia['cod_alergia'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
                                
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  

                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));

                            break;
                        case '2': 
                            # Patologías
                            $r = $this->gestion->get_patologias();                         

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                           
                            $html.= '    <th>Descripción</th>';
                            $html.= '    <th>Sintomatología</th>';
                            $html.= '    <th>Indicaciones Preliminares</th>';
                            $html.= '    <th>Eliminar</th>';     
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_patologia => $val_patologia) {                               
                                $html.= '<tr>';
                                $html.= '  <td>'.$val_patologia['descripcion'].'</td>';  
                                $html.= '  <td>'.$val_patologia['sintomatologia'].'</td>';  
                                $html.= '  <td>'.$val_patologia['indicaciones_preliminares'].'</td>';                                
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" onclick="eliminar_dato('.intval(@$_POST['tipo']).','.$val_patologia['id_patologia'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                   
                            break;
                        case '3': 
                            # Medicamentos
                            $r = $this->gestion->get_medicamentos();

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                    
                            $html.= '    <th>Nombre</th>';
                            $html.= '    <th>Fecha Venc.</th>';
                            $html.= '    <th>Pres. Comerc.</th>';
                            $html.= '    <th>Via Adm.</th>';
                            $html.= '    <th>Princ. Activo</th>';
                            $html.= '    <th>U. M.</th>';
                            $html.= '    <th>Cant.</th>';
                            $html.= '    <th>U. R.</th>';
                            $html.= '    <th>Laboratorio</th>';
                            $html.= '    <th>Eliminar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_meds => $val_meds) {
                                $html.= '<tr>'; 
                                $html.= '  <td>'.$val_meds['nombre_medicamento'].'</td>';
                                $html.= '  <td>'.$val_meds['fecha_vencimiento'].'</td>';
                                $html.= '  <td>'.$val_meds['presentacion_comercial'].'</td>';
                                $html.= '  <td>'.$val_meds['via_administracion'].'</td>';
                                $html.= '  <td>'.$val_meds['principio_activo'].'</td>';
                                $html.= '  <td>'.$val_meds['unidad_medida'].'</td>';
                                $html.= '  <td>'.$val_meds['cantidad'].'</td>';
                                $html.= '  <td>'.$val_meds['unidad_referencia'].'</td>';
                                $html.= '  <td>'.$val_meds['nombre_laboratorio'].'</td>'; 
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" onclick="eliminar_dato('.intval(@$_POST['tipo']).','.$val_meds['cod_medicamento'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '4': 
                            # Vacunas
                            $r = $this->gestion->get_vacunas(); //Falta tabla

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                    
                            $html.= '    <th>Eliminar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_vacunas => $val_vacunas) {
                                $html.= '<tr>';                         
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" onclick="eliminar_dato('.intval(@$_POST['tipo']).','.$val_vacunas['cod_alergia'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '5': 
                            # Tratamientos
                            $r = $this->gestion->get_tratamientos(); // Falta tabla

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                     
                            $html.= '    <th>Eliminar</th>';     
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_tratamientos => $val_tratamientos) {
                                $html.= '<tr>';                            
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" onclick="eliminar_dato('.intval(@$_POST['tipo']).','.$val_tratamientos['cod_alergia'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                           echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '6': 
                            # Diagnósticos
                            $r = $this->gestion->get_diagnosticos();

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                 
                            $html.= '    <th>Sistema Afectado</th>';
                            $html.= '    <th>Descripción Diagnóstico</th>';
                            $html.= '    <th>Reposo Indicado</th>';
                            $html.= '    <th>Eliminar</th>';   
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_diag => $val_diag) {

                                $html.= '<tr>';                            
                                $html.= '  <td>'.$val_diag['sistema_afectado'].'</td>'; 
                                $html.= '  <td>'.$val_diag['desc_diagnostico'].'</td>'; 
                                $html.= '  <td>'.$val_diag['reposo_indicado'].'</td>'; 
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary" onclick="eliminar_dato('.intval(@$_POST['tipo']).','.$val_diag['cod_diagnostico'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        default:
                            # Error
                            echo json_encode(array("html" => "Error", "tipo" => @$_POST['tipo']));
                            break;
                    };                    
                break;
                case 4: // Eliminar datos desde BD
                    $r = $this->gestion->eliminar_datos($_POST);
                    echo json_encode($_POST);
                    break;
                case 5: // Ingresar Datos a la BD
                    $tipo = @$_POST['tipo'];
                    switch ($tipo) {
                        case '1':
                            $r = $this->gestion->agregar_alergia($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '2':
                            $r = $this->gestion->agregar_patologia($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '3':
                            $r = $this->gestion->agregar_medicamento($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }                            
                            break;
                        case '4':
                            $r = $this->gestion->agregar_vacuna($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '5':
                            $r = $this->gestion->agregar_tratamiento($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '6':
                            $r = $this->gestion->agregar_diagnostico($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        default:
                            echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            break;
                    }
                break;
                case 6: 
                    # Obtener datos por ID
                    $r = $this->gestion->get_datos_byID($_POST);                    
                    $html = $this->templates->show_datos_byID($r[0], $_POST['opt']);
                    echo json_encode(array("html" => $html));
                    break;
                case 7:
                    # Update data por ID
                    $tipo = $_POST['tipo'];
                    switch ($tipo) {
                        case '1':
                            $r = $this->gestion->actualizar_alergia($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '2':
                            $r = $this->gestion->actualizar_patologia($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '3':
                            $r = $this->gestion->actualizar_medicamento($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }                            
                            break;
                        case '4':
                            $r = $this->gestion->actualizar_vacuna($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '5':
                            $r = $this->gestion->actualizar_tratamiento($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        case '6':
                            $r = $this->gestion->actualizar_diagnostico($_POST);
                            if($r == true){
                                echo json_encode(array("estado" => TRUE, "tipo" => $tipo));                                
                            }else{
                                echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            }
                            break;
                        default:
                            echo json_encode(array("estado" => FLASE, "tipo" => $tipo));
                            break;
                    }
                break;
                    break;
                default:
                    # Error
                echo json_encode("Error al procesar su solicitud");
                    break;
            }
            
        }
}
