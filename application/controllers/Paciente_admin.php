<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_admin extends CI_Controller {
    
    /**************************************************************************/
    /** CONSTRUCTOR DE LA CLASE
    /**************************************************************************/
    public function __construct() {

        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('paciente_model');
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
    
    public function index(){
        
        $this->listadoPacientes();
    }
        
    /**************************************************************************/
    /** @Function que permite retornar pagina paciente
    /**************************************************************************/
    public function RegistrarPaciente(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_crearpacientes();
        
        $data["menu"]       = "Registrar Paciente";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //Cargamos todos nuestros dropdown utilizados en la vista
        $data["prev_med"]       = $this->dropdown_model->cargarPrevisiones();
        $data["parentescos"]    = $this->dropdown_model->cargarParentescos();
        $data["est_civil"]      = $this->dropdown_model->cargarEstCivil();
        $data["ocupaciones"]    = $this->dropdown_model->cargarOcupaciones();
        $data["religiones"]     = $this->dropdown_model->cargarReligiones();
        $data["niv_estudios"]   = $this->dropdown_model->cargarNivelesEst();
        $data["paises"]         = $this->dropdown_model->cargarPaises();
        $data["regiones"]       = $this->dropdown_model->cargarRegiones();
        $data["provincias"]     = $this->dropdown_model->cargarProvincias();
        $data["comunas"]        = $this->dropdown_model->cargarComunas();
        $data["gr_sang"]        = $this->dropdown_model->cargarGrSanguineos();
        $data["factoresRH"]     = $this->dropdown_model->cargarFactoresRH();
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("paciente_view",$data);
    }
    
    /**************************************************************************/
    /** @Funcion que permite retornar listado de todos los pacientes
    /**************************************************************************/
    public function listadoPacientes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_tbl();
        
        $data["menu"]   = "Listado de Pacientes";
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("pacientes_view",$data);
    }
    
    /**************************************************************************/
    /** @Funcion que permite retornar listado de todos los pacientes JSON
    /**************************************************************************/
    public function pacientes_json(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->datosDeSession(); 
        
        $id_empresa         = $this->session->userdata('id_empresa');
        
        echo $this->paciente_model->listadoPacientes_json($id_empresa);    
    }
    
    /**************************************************************************/
    /** @Funcion que permite recibir los datos del form de perfil (Ingresar)
    /**************************************************************************/
    public function  recibirDatos(){
       
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //Datos POST formulario
        $this->form_validation->set_rules('rut','R.U.T.','required|trim');
        $this->form_validation->set_rules('p_nombre','primer nombre','required|trim');
        $this->form_validation->set_rules('s_nombre','segundo nombre','required|trim');
        $this->form_validation->set_rules('a_paterno','apellido paterno','required|trim');
        $this->form_validation->set_rules('a_materno','apellido materno','required|trim');
        $this->form_validation->set_rules('genero','genero','required|trim');
        $this->form_validation->set_rules('correo','correo electronico','required|trim|valid_email');
        $this->form_validation->set_rules('fecha_nac','fecha de nacimiento','required|trim');
        $this->form_validation->set_rules('pais_res','pais de referencia','required|trim');
        $this->form_validation->set_rules('prevision','previsión médica','required|trim');
        $this->form_validation->set_rules('region','region', 'required|trim');
        $this->form_validation->set_rules('provincia','provincia','required|trim');
        $this->form_validation->set_rules('comuna','comuna','required|trim');
        $this->form_validation->set_rules('calle','calle','required|trim');
        
        //Validar datos del formulario
        if($this->form_validation->run() == FALSE) {
                
            //Muestra los errores en la vista
            $this->RegistrarPaciente();
                
         } else {
             
            //CREAMOS NUESTRO NUEVO USUARIO
            $p_nombre       = strtolower($this->input->post('p_nombre'));
            $a_paterno      = strtolower($this->input->post('a_paterno'));
            //3 primeras letras del primer nombre
            $nom_recortado  = substr($this->input->post('p_nombre'),0,3);
            //crear username del usuario (3 primeras letas + a. paterno)
            $username       = $nom_recortado.".".$a_paterno;
            
            //Caracteres que no deseamos tener
            $caracteres = array(".", "-");
            //El password es el rut sin guiones ni puntos
            $password   = str_replace($caracteres,"",$this->input->post('rut'));
            
            //Datos de las personas de contacto que tenga el cliente
                $pc_nombre     = $this->input->post('pc_nombres');
                $pc_apellidos  = $this->input->post('pc_apellidos');
                $pc_fam        = $this->input->post('familiariodad');
                $pc_telefono   = $this->input->post('pc_telefono');
                $pc_correo     = $this->input->post('pc_correo');

                $cant_contactos = count($pc_nombre);//cantidad de contactos

                for($x = 0;$x < $cant_contactos;$x++){

                    $arr_contacto[] = array(
                        "nombre"           => $pc_nombre[$x],
                        "apellido"         => $pc_apellidos[$x],
                        "familiariodad"    => $pc_fam[$x],
                        "telefono"         => $pc_telefono[$x],
                        "correo"           => $pc_correo[$x],
                    );
                }
                
                if(!empty($_FILES['img_paciente']['name'])) {//Subio una imagen
                
                    //Subir nuevo logo
                   $config['upload_path'] = './img/pacientes/';
                   $config['allowed_types'] = 'gif|jpg|jpeg|png';
                   $config['max_size'] = '2000';
                   $config['max_width'] = '2024';
                   $config['max_height'] = '2008';
                   $this->load->library('upload', $config);

                   //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
                   if (!$this->upload->do_upload('img_paciente')){                    
                       $error      = array('error' => $this->upload->display_errors());
                       //$this->resultado($data_res);
                       //echo "error";
                       $imagen = '';

                   } else {

                       //Subimos la imagen del paciente
                       $file_info = $this->upload->data();
                       $data2 = array('upload_data' => $this->upload->data());
                       $imagen = $file_info['file_name'];
                   }

               }else{//no subio una imagen

                   $imagen = '';
               }
                
                //Crear arreglo con los datos del nuestro nuevo usuario tipo paciente
                $dataForm = array(//Nuestro arreglo con los datos del paciente
                    //datos para ingresar un nuevo usuario
                    "id_empresa"    => $data["session"]["id_empresa"],
                    "id_perfil"     => 4,
                    "rut"           => $this->input->post('rut'),
                    "username"      => $username,
                    "password"      => md5($password),
                    "estado"        => false,
                    "creado_por"    => $data["session"]["id_usuario"],
                    "rut"           => $this->input->post('rut'),
                    "p_nombre"      => $this->input->post('p_nombre'),
                    "s_nombre"      => $this->input->post('s_nombre'),
                    "a_paterno"     => $this->input->post('a_paterno'),
                    "a_materno"     => $this->input->post('a_materno'),
                    "genero"        => $this->input->post('genero'),
                    "telefono_f"    => $this->input->post('telefono_f'),
                    "celular"       => $this->input->post('celular'),
                    "correo"        => $this->input->post('correo'),
                    "estado_civil"  => $this->input->post('estado_civil'),
                    "fecha_nac"     => cambiaf_a_mysql($this->input->post('fecha_nac')),
                    "lugar_nac"     => $this->input->post('lugar_nac'),
                    "religion"      => $this->input->post('religion'),
                    "pais_res"      => $this->input->post('pais_res'),
                    "prevision"     => $this->input->post('prevision'),
                    "ocupacion"     => $this->input->post('ocupacion'),
                    "niv_estudios"  => $this->input->post('niv_estudios'),
                    "region"        => $this->input->post('region'),
                    "provincia"     => $this->input->post('provincia'),
                    "comuna"        => $this->input->post('comuna'),
                    "calle"         => $this->input->post('calle'),
                    "grupo_sang"    => $this->input->post('grupo_sang'),
                    "factorn_rh"    => $this->input->post('factorn_rh'),
                    //informacion de las personas de contacto
                    "p_contactos"   => $arr_contacto,
                    "imagen"        => $imagen
                    
                );
                
                //Registrar los datos del nuevo paciente
                //Ademas se creara una nueva historia medica para el paciente
                $this->paciente_model->registrarPaciente($dataForm);
                
                //Muestra vista de exito
                $this->pacienteAdd_succes();
            
            return false;
        }       
        
    }
    
    /**************************************************************************/
    /** @Funcion que permite recibir los datos del form de perfil (Edicion)
    /**************************************************************************/
    public function recibirDatosEdit(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //Datos POST formulario
        $this->form_validation->set_rules('rut','R.U.T.','required|trim');
        $this->form_validation->set_rules('p_nombre','primer nombre','required|trim');
        $this->form_validation->set_rules('s_nombre','segundo nombre','required|trim');
        $this->form_validation->set_rules('a_paterno','apellido paterno','required|trim');
        $this->form_validation->set_rules('a_materno','apellido materno','required|trim');
        $this->form_validation->set_rules('genero','genero','required|trim');
        $this->form_validation->set_rules('correo','correo electronico','required|trim|valid_email');
        $this->form_validation->set_rules('fecha_nac','fecha de nacimiento','required|trim');
        $this->form_validation->set_rules('pais_res','pais de referencia','required|trim');
        $this->form_validation->set_rules('prevision','previsión médica','required|trim');
        $this->form_validation->set_rules('region','region', 'required|trim');
        $this->form_validation->set_rules('provincia','provincia','required|trim');
        $this->form_validation->set_rules('comuna','comuna','required|trim');
        $this->form_validation->set_rules('calle','calle','required|trim');
        
        //Validar datos del formulario
        if($this->form_validation->run() == FALSE) {
                
            //Muestra los errores en la vista
            $this->editarPaciente($this->input->post('id_paciente'));
                
        } else {
            
            //Datos de las personas de contacto que tenga el cliente
            $pc_ids        = $this->input->post('pc_ids');
            $pc_nombre     = $this->input->post('pc_nombres');
            $pc_apellidos  = $this->input->post('pc_apellidos');
            $pc_fam        = $this->input->post('familiariodad');
            $pc_telefono   = $this->input->post('pc_telefono');
            $pc_correo     = $this->input->post('pc_correo');

            $cant_contactos = count($pc_nombre);//cantidad de contactos

            for($x = 0;$x < $cant_contactos;$x++){
                
                $arr_contacto[] = array(
                    "pc_ids"           => $pc_ids[$x],
                    "nombre"           => $pc_nombre[$x],
                    "apellido"         => $pc_apellidos[$x],
                    "familiariodad"    => $pc_fam[$x],
                    "telefono"         => $pc_telefono[$x],
                    "correo"           => $pc_correo[$x],
                );
            }
            
            //Script para la edicion de imagen de un paciente
            $imagen_paciente =  $this->input->post('imagen_paciente');
            if(!empty($_FILES['new_img_paciente']['name'])) {//Subio una imagen
                
                $path = './img/pacientes/'.$imagen_paciente;
                
                //Eliminar imagen paciente
                if(is_file($path)){
                    //Eliminamos la imagen
                    unlink($path);
                }
                
                 //Subir nuevo logo
                $config['upload_path'] = './img/pacientes/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2000';
                $config['max_width'] = '2024';
                $config['max_height'] = '2008';
                $this->load->library('upload', $config);
                
                //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
                if (!$this->upload->do_upload('new_img_paciente')){                    
                    
                    $error      = array('error' => $this->upload->display_errors());
                    //$this->resultado($data_res);
                    //echo "error";
                    $imagen = $imagen_paciente;
                } else {
                        
                    //Subimos la imagen del paciente
                    $file_info = $this->upload->data();
                    $data2 = array('upload_data' => $this->upload->data());
                    $imagen = $file_info['file_name'];
                }
                
            }else{//no subio una imagen
                
                $imagen = $imagen_paciente;
            }
            
            //Crear arreglo con los datos del nuestro nuevo usuario tipo paciente
            $dataForm = array(//Nuestro arreglo con los datos del paciente
                "id_usuario"    => $this->input->post('id_usuario'),
                "rut"           => $this->input->post('rut'),
                "p_nombre"      => $this->input->post('p_nombre'),
                "s_nombre"      => $this->input->post('s_nombre'),
                "a_paterno"     => $this->input->post('a_paterno'),
                "a_materno"     => $this->input->post('a_materno'),
                "genero"        => $this->input->post('genero'),
                "telefono_f"    => $this->input->post('telefono_f'),
                "celular"       => $this->input->post('celular'),
                "correo"        => $this->input->post('correo'),
                "estado_civil"  => $this->input->post('estado_civil'),
                "fecha_nac"     => cambiaf_a_mysql($this->input->post('fecha_nac')),
                "lugar_nac"     => $this->input->post('lugar_nac'),
                "religion"      => $this->input->post('religion'),
                "pais_res"      => $this->input->post('pais_res'),
                "prevision"     => $this->input->post('prevision'),
                "ocupacion"     => $this->input->post('ocupacion'),
                "niv_estudios"  => $this->input->post('niv_estudios'),
                "region"        => $this->input->post('region'),
                "provincia"     => $this->input->post('provincia'),
                "comuna"        => $this->input->post('comuna'),
                "calle"         => $this->input->post('calle'),
                "grupo_sang"    => $this->input->post('grupo_sang'),
                "factorn_rh"    => $this->input->post('factorn_rh'),
                //informacion de las personas de contacto
                "p_contactos"   => $arr_contacto,
                "imagen"        => $imagen
            );
            //echo "<pre>";print_r($dataForm);exit();
            //Registrar los datos del nuevo paciente
            //Ademas se creara una nueva historia medica para el paciente
            $this->paciente_model->editarPaciente($dataForm);
            
            //Muestra vista de exito
            $this->pacienteEdit_succes();
        }
    }
    
    /**************************************************************************/
    /** @Funcion que permite retornar vista para editar paciente
    /**************************************************************************/
    public function editarPaciente($id_paciente){
               
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_crearpacientes();
        
        $data["menu"]       = "Editar Paciente";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //Id del paciente
        $data["id_paciente"]=$id_paciente;
        
        //Cargamos datos del paciente seleccionado
        $data["paciente"]   = $this->paciente_model->info_paciente($id_paciente);    
        
        //Cargamos todos nuestros dropdown utilizados en la vista
        $data["prev_med"]       = $this->dropdown_model->cargarPrevisiones();
        $data["parentescos"]    = $this->dropdown_model->cargarParentescos();
        $data["est_civil"]      = $this->dropdown_model->cargarEstCivil();
        $data["ocupaciones"]    = $this->dropdown_model->cargarOcupaciones();
        $data["religiones"]     = $this->dropdown_model->cargarReligiones();
        $data["niv_estudios"]   = $this->dropdown_model->cargarNivelesEst();
        $data["paises"]         = $this->dropdown_model->cargarPaises();
        $data["regiones"]       = $this->dropdown_model->cargarRegiones();
        $data["provincias"]     = $this->dropdown_model->cargarProvincias();
        $data["comunas"]        = $this->dropdown_model->cargarComunas();
        $data["gr_sang"]        = $this->dropdown_model->cargarGrSanguineos();
        $data["factoresRH"]     = $this->dropdown_model->cargarFactoresRH();
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("paciente_edit_view",$data);
    }
    
    /**************************************************************************/
    /** @Funcion que permite retornar vista de exista cambio info mi perfil
    /**************************************************************************/
    public function pacienteAdd_succes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_dashboard();
        
        $data["menu"]       = "Mi Perfil";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("paciente_succes_view",$data);
    }
    
    public function pacienteEdit_succes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_dashboard();
        
        $data["menu"]       = "Editar Paciente";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("paciente_edit_succes_view",$data);
    }
    
    public function dataPaciente(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->datosDeSession(); 
        
        $id_paciente = $this->input->post('id_paciente');
        
        //Obtener informacion personal del paciente
        echo $this->paciente_model->datos_paciente($id_paciente);
        
        
    }
    
    /**************************************************************************/
    /** @Funcion que permite eliminar un paciente
    /**************************************************************************/
    public function eliminarPaciente(){
        
        $id_paciente = $this->input->post("id_paciente");
        //Eliminamos al paciente
        echo $this->paciente_model->removePaciente($id_paciente);
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
    
    /**************************************************************************/
    /** @Funcion que permite buscar nombre y id de un paciente
    /**************************************************************************/
    public function nombre_y_id_del_paciente(){
        
        //Cargamos las variables de session (LIBRERIA)
        $session        = $this->general_sessions->datosDeSession(); 
        $id_empresa     = $session["id_empresa"];
        $rut_paciente   = trim($this->input->post("rut"));
        
        //Retornar id y nombre del paciente
        echo $this->paciente_model->datos_agenda_paciente($rut_paciente,$id_empresa);
    }
}
