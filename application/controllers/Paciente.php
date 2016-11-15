<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paciente extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('gestion_model', 'gestion');
        $this->load->model('paciente_model', 'paciente');
        $this->load->model('consulta_model', 'consulta');
        $this->load->model('reportes_model', 'reportes');
        //Cargamos todas las librerias que utilizaremos
         $this->load->library(array(
            'form_validation',  //funciones para los formularios
            'session',          //iniciar session
            'fileclass',        //control css y js para cada pagina
            'general_sessions', //Validar datos de session
            'data_empresa',     //informacion de la empresa
            'gestion_view',     //controlar vistas
            'templates',        //libreria de plantillas
            'pdf'));            //Libreria PDF
            
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url','form','html','funciones_system'));
    }
    
    public function index()
    {
        $this->index_view();
    }
    
    /**************************************************************************/
    /** @Function que permite retornar pagina de inicio
    /**************************************************************************/
    public function index_view(){
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        $data["imagen"]     =   $this->paciente->get_img($data["session"]['id_usuario']);   
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']  = $this->fileclass->files_reportes();
        $data["menu"]   = "Pacientes";
        $data["active"] = activeMenu("inicio");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("pacientes_profile_view",$data);
    }
}