<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('perfil_model');
        $this->load->model('dropdown_model');
        
        //Cargamos todas las librerias utilizadas en es CI
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
        $this->perfil();
    }
        
    /**************************************************************************/
    /** @Function que permite retornar pagina perfil
    /**************************************************************************/
    public function perfil(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =  $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_miperfil();        
        
        $data["menu"]       = "Mi Perfil";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("perfil");//(HELPERS)marca menu (active)
        
        //Obtener informacion personal del usuario
        $data["info"]       = $this->perfil_model->info_personal($data["session"]["id_usuario"]);
        
        //Cargamos todos los paises
        $data["paises"]     = $this->dropdown_model->cargarPaises();
        
        //Cargamos todas las regiones
        $data["regiones"]   = $this->dropdown_model->cargarRegiones();
        
        //Cargamos todas las provincias
        $data["provincias"] = $this->dropdown_model->cargarProvincias();
        
        //Cargamos todas las comunas
        $data["comunas"]    = $this->dropdown_model->cargarComunas();
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("perfil_view",$data);
    }
    
    
    /**************************************************************************/
    /** @Funcion que permite recibir los datos del form de perfil
    /**************************************************************************/
    public function  recibirDatos(){
       
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        $this->form_validation->set_rules('rut','R.U.T.','required|trim');
        $this->form_validation->set_rules('p_nombre','primer nombre','required|trim');
        $this->form_validation->set_rules('s_nombre','segundo nombre','required|trim');
        $this->form_validation->set_rules('a_paterno','apellido paterno','required|trim');
        $this->form_validation->set_rules('a_materno','apellido materno','required|trim');
        $this->form_validation->set_rules('genero','genero','required|trim');
        $this->form_validation->set_rules('telefono_f','telefono fijo','required|trim');
        $this->form_validation->set_rules('celular','celular','required|trim');
        $this->form_validation->set_rules('correo','correo electronico','required|trim|valid_email');
        $this->form_validation->set_rules('username','nombre de usuario','required|trim');
        $this->form_validation->set_rules('fecha_nac','fecha de nacimiento','required|trim');
        $this->form_validation->set_rules('pais_res','pais de referencia','required|trim');
        $this->form_validation->set_rules('region','region', 'required|trim');
        $this->form_validation->set_rules('provincia','provincia','required|trim');
        $this->form_validation->set_rules('comuna','comuna','required|trim');
        $this->form_validation->set_rules('calle','calle','required|trim');
        $this->form_validation->set_rules('password','contraseña','callback_confpassword_check');
        $this->form_validation->set_rules('confpassword','confirmar contraseña','callback_password_check');
        
        if($this->form_validation->run() == FALSE) {
                
            //Muestra los errores en la vista
            $this->perfil();
                
         } else {
                
            $dataMod = array(//Nuestro arreglo con los datos del usuario
            "id_usuario"    => $data["session"]["id_usuario"],
            "rut"           => $this->input->post('rut'),
            "p_nombre"      => $this->input->post('p_nombre'),
            "s_nombre"      => $this->input->post('s_nombre'),
            "a_paterno"     => $this->input->post('a_paterno'),
            "a_materno"     => $this->input->post('a_materno'),
            "genero"        => $this->input->post('genero'),
            "telefono_f"    => $this->input->post('telefono_f'),
            "celular"       => $this->input->post('celular'),
            "correo"        => $this->input->post('correo'),
            "username"      => $this->input->post('username'),
            "fecha_nac"     => cambiaf_a_mysql($this->input->post('fecha_nac')),
            "pais_res"      => $this->input->post('pais_res'),
            "region"        => $this->input->post('region'),
            "provincia"     => $this->input->post('provincia'),
            "comuna"        => $this->input->post('comuna'),
            "calle"         => $this->input->post('calle'),
            "password"      => $this->input->post('password')
            );
            
            $this->perfil_model->editarPerfil($dataMod);//Cambia los datos

            $this->perfil_succes();//Muestra html de exito
         }       
        
    }
    
    /**************************************************************************/
    /** @Validacion especial formulario mi perfil
    /**************************************************************************/
    public function confpassword_check($str)
    {
        $passconf = $this->input->post("confpassword");
        
        if ($str != '') // Ingreso una nueva password
        {
            if($str != $passconf){ // validar si conf. password es igual a la ingresada
                
                $this->form_validation->set_message('confpassword_check', 'El campo contraseña no coincide con el campo confirmar contraseña.');
                return FALSE;
                
            }elseif ($str == $passconf) {
                
                return TRUE;
                
            }  else {
            
                return FALSE;
            }
            
        }else{
            
            return TRUE;
        }
    }
    
    public function password_check($str)
    {
        $password = $this->input->post("password");
        
        if ($str != '')//Ingreso una nueva password
        {
            if($str != $password){//validar si password es igual a conf. password
                
                $this->form_validation->set_message('password_check', 'El campo confirmar contraseña no coincide con el campo contraseña.');
                return FALSE;
                
            }elseif ($str == $password){
                
                return TRUE;
                
            }  else {
            
                return FALSE;
            }
            
        }else{
            
            return TRUE;
        }
    }
    
    /**************************************************************************/
    /** @Funcion que permite retornar vista de exista cambio info mi perfil
    /**************************************************************************/
    public function perfil_succes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =  $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_dashboard();
        
        $data["menu"]       = "Mi Perfil";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("perfil");//(HELPERS)marca menu (active)
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("perfil_succes_view",$data);
    }
    
    /**************************************************************************/
    /** @Funcion que permite cargar las provincias segun 
    /** region seleccionada
    /**************************************************************************/    
    public function llena_provincias(){
        
        $options = "";
        
        if($this->input->post('region'))
        {
            $region = $this->input->post('region');
            
            $provincias   = $this->dropdown_model->provincias($region);
            
            foreach($provincias as $fila)
            {
            ?>
            <option value="<?=$fila->PROVINCIA_ID;?>">
                <?=$fila->PROVINCIA_NOMBRE;?>
            </option>
            <?php
            }
        }
    }
    
    /**************************************************************************/
    /** @Funcion que permite cargar las comunas segun 
    /** provincia seleccionada
    /**************************************************************************/
    public function llena_comunas(){
        
        $options = "";
        
        if($this->input->post('provincia'))
        {
            $provincia = $this->input->post('provincia');
            
            $comunas   = $this->dropdown_model->comunas($provincia);
            
            foreach($comunas as $fila)
            {
            ?>
            <option value="<?=$fila->COMUNA_ID;?>">
                <?=$fila->COMUNA_NOMBRE;?>
            </option>
            <?php
            }
        }
    }

    
    function ajax()
        {   
            switch(@$_POST['case'])
            {
                case 1:
                    $data["session"] = $this->general_sessions->validarSessionAdmin();
                    $param = array();
                    $respuesta = array();
                    // Sube archvio a servidor
                    if( count($_FILES) > 0 )                    {
                        
                        $nombre_file = $_FILES['foto_perfil']['name'];                        
                        
                        $array_nombre_file = explode( ".", $nombre_file );                        
                        
                        $nombre_file = date('Ymd').time().".".array_pop( $array_nombre_file );
                        
                        $ruta_temp = $_FILES['foto_perfil']['tmp_name'];
                        
                        //Validar tipo de usuario
                        if($data["session"]["id_perfil"] == 4){//Paciente
                            
                            $ruta_file = getcwd()."/img/pacientes/".$nombre_file;                        
                            
                        }else{
                            
                            $ruta_file = getcwd()."/img/foto_perfil/".$nombre_file;                        
                        }
                        
                        move_uploaded_file($ruta_temp, $ruta_file);

                        $param["id_usuario"]    = $data["session"]["id_usuario"];

                        $param["foto"]          = $nombre_file;                                                

                        $resp = $this->perfil_model->update_img( $param ); 
                        
                        if( $resp )
                        {
                            $respuesta = array( "estado" => 'true', "imagen" => $resp[0]['imagen'] );
                            $this->session->set_userdata('imagen', $resp[0]['imagen']);
                        }                        
                    }else{
                        $respuesta = array( "estado" => 'false' , "imagen" => "");
                    }
                    echo json_encode( $respuesta );                  

                break;
            }
            
        }

}


