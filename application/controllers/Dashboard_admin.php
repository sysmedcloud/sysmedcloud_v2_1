<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        //Cargar modelo utilizado en este CI
        $this->load->model('dashboard_model');
        
        //Cargamos todas las librerias que utilizaremos
         $this->load->library(array(
            'form_validation',//funciones para los formularios
            'session',//iniciar session
            'fileclass',//control css y js para cada pagina
            'general_sessions',//Validar datos de session
            'data_empresa',//informacion de la empresa
            'gestion_view'));//controlar vistas
            
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html','funciones_system'));
    }
    
    public function index()
    {
        $this->dashboard();
    }
    
    /**************************************************************************/
    /** @Function que permite retornar pagina de inicio
    /**************************************************************************/
    public function dashboard(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        //echo "<pre>";print_r($data["session"]);exit();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_dashboard();
        
        $data["menu"]       = "Dashboard";
        
        $data["active"]     = activeMenu("inicio");//(HELPERS)marca menu (active)
                
        //Obtenemos cantidad de pacientes activos registrados en el sistema
        $data["cant_p"]     = $this->dashboard_model->cantidad_paciente($data["session"]["id_empresa"]);
        
        //Obtenemos cantidad de consultas medicas registradas en el sistema
        $data["cant_cm"]    = $this->dashboard_model->cantidad_cons_medicas($data["session"]["id_empresa"]);
        
        //Obtenemos cantidad de citas registradas en el sistema
        $data["cant_c"]     = $this->dashboard_model->cantidad_citas($data["session"]["id_empresa"]);
        
        //Obtenemos cantidad de usuarios de la cuenta registrados en el sistema
        $data["cant_u"]     = $this->dashboard_model->cantidad_users($data["session"]["id_empresa"]);
        
        //Cantidad de consultas medicas realizadas por pacientes hombres y mujeres
        $data['dist_hm']    = $this->dashboard_model->dist_cm_hm($data["session"]["id_empresa"]);
        
        //Actividades recientes agenda medicas
        $data['act_agenda'] = $this->dashboard_model->act_recientes_agenda($data["session"]["id_empresa"]);
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("dashboard_view",$data);
    }
    
    
    public function paciente_genero_ajax(){
        
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        $this->dashboard_model->paciente_genero($data["session"]["id_empresa"]);
    }
}
