<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_app extends CI_Controller {
    
    public function __construct() {

        parent::__construct();
        
        //Cargar modelo utilizado por este CI
        $this->load->model('login_app_model');
        //Cargamos todas las librerias que utilizaremos en este controlador
        $this->load->library(array('fileclass','form_validation','session','email'));
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html'));
    }
    
    /***************************************************************************
    * @Funcion por defecto del controlador
    ***************************************************************************/
    public function index() {
        
        //Validar inicio de session -  redireccionamiento usuario
        switch ((int)$this->session->userdata('id_perfil')) {
            
            //Usuario tipo administrador (dueño de la cuenta o clinica)
            case 1: redirect(base_url().'dashboard_admin');break;
            
            //Usuario tipo profesional (no puede ver panel de administracion)
            case 5: redirect(base_url().'dashboard_admin');break;
            
            //Usuario tipo asistente (Secretaria o ayudantes (Agenda - citas))
            case 2: redirect(base_url().'dashboard_admin');break;
            
            //Usuario tipo solo de lectura (solo puede ver informacion)
            case 3: redirect(base_url().'dashboard_admin');break;
            
            //Usuario tipo paciente (paciente de alguna clinica)
            case 4: redirect(base_url().'dashboard_paciente');break;
            
            //Mostrar por defecto pagina de inicio de sesion
            default: $this->signIn();
        }
    }
    
    /***************************************************************************
    * @Funcion que permite mostrar pagina por defecto
    ***************************************************************************/
    public function signIn(){
        
        //Instanciamos libreria con los archivos css y js
        $data['files'] = $this->fileclass->files_login();  
        
        //Titulo para la pestaña en la pagina
        $data["titulo"]='Inicio de sesion | SysMedCloud.cl | Sistema de gestion medica online';
        
        //Crear token clave de sesion
        $data['token'] = $this->token();
        
        //Cargar vistas
	$this->load->view('login/header_login_view',$data);
        $this->load->view('login/login_view');
        $this->load->view('login/footer_login_view');
    }
    
    /***************************************************************************
    * @Funcion que permite crear clave aleatoria de sesion
    ***************************************************************************/
    public function token() {

        $token = md5(uniqid(rand(), true)); // crear clave aleatoria de sesion
        
        $this->session->set_userdata('token', $token); //clave de sesion
        
        return $token; // retorna clave de sesion
    }
    
    /***************************************************************************
     * @Funcion que permite iniciar sesion
     **************************************************************************/
    public function inicio_sesion() {
        
        //recibimos los datos del formulario y sacamos los espacios en blanco y 
        //convertimos el texto a minuscula
        $token = $this->input->post('token');
        
        //Cargamos valor de session token
        $token_session = $this->session->userdata('token');
        
        //Validar token formulario con el de session
        if ($token == $token_session) {
            
            //Validar los datos del formularios username -  password
            $this->form_validation->set_rules('username', 'nombre de usuario','required|trim');
            $this->form_validation->set_rules('password','password','required|trim|min_length[3]|max_length[150]');
            
            //Validar Formulario
            if ($this->form_validation->run() == FALSE) {
                
                //Mostrar los errores en la vista
                $this->index();
                
            } else { //Formulario sin errores
                
                //Crear arreglo con los datos del ingresados en el formulario de login
                $data_acceso["username"] = $this->input->post('username');
                $data_acceso["password"] = md5($this->input->post('password'));
                $check_user = $this->login_app_model->login_user($data_acceso);
                
                // si existe el usuario se crean su datos de sesion
                if ($check_user == TRUE) {
                    
                    //Creamos un arreglo con las variables de sesion.
                    $data["is_logued_in"]   = TRUE;
                    $data["id_usuario"]     = $check_user["id_usuario"];
                    $data["username"]       = $check_user["username"];
                    $data["id_empresa"]     = $check_user["id_empresa"];
                    $data["empresa"]        = $check_user["empresa"];
                    $data["id_perfil"]      = $check_user["id_perfil"];
                    $data["perfil"]         = $check_user["perfil"];
                    //$data["last_login"]     = $check_user->last_login;
                    $data["rut"]            = $check_user["rut"];
                    $data["primer_nom"]     = $check_user["primer_nombre"];
                    $data["segundo_nom"]    = $check_user["segundo_nombre"];
                    $data["apellido_pat"]   = $check_user["apellido_paterno"];
                    $data["apellido_mat"]   = $check_user["apellido_materno"];
                    $data["imagen"]         = $check_user["imagen"];
                    
                    //set_userdata() es usado para agregar información en la sesión, en este caso agregamos
                    //Nuestro arreglo recien creado con lo datos del usuario.
                    $this->session->set_userdata($data);
                    
                    //Registrar log inicio de session
                    $this->accion("login");
                    
                    //redireccionar
                    $this->index();
                }
            }
            
        }else{
            
            redirect(base_url().'login_app');
        }
    }
    
    /***************************************************************************
    * @Funcion que permite ingresar log de inicio o cierre de session
    ***************************************************************************/
    public function accion($accion){
        
        if($this->session->userdata('is_logued_in')){
            
            $log_session["id_usuario"]  = $this->session->userdata('id_usuario');
            $log_session["accion"]      = $accion;
            $log_session["ip_address"]  = $this->input->ip_address();
            $log_session["user_agent"]  = $this->input->user_agent();

            //Registrar log inicio de session
            switch ($accion) {

                case "login":   

                    //ingresar log
                    return $this->login_app_model->log_login_out($log_session); 

                break;

                case "logout":   

                    //ingresar log
                    $this->login_app_model->log_login_out($log_session); 
                    $this->session->sess_destroy();        
                    //Redireccionar
                    redirect(base_url().'login_app','refresh');

                break;

                default:break;
            }
            
        }else{
            
            redirect(base_url()."login_app");
        }
        
    }
}
/* End of file login_app.php */
/* Location: ./application/controllers/login_app.php */