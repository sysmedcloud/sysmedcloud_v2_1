<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paciente_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }    
    /***************************************************************************
    /** @Funtion que permite validar la existencia de un usuario tipo paciente
    /**************************************************************************/
    public function validarUsuario($id_empresa,$rut){
        
        //Query para validar existencia del usuario perfil paciente
        $this->db->select("du.id_usuario");
        $this->db->from('tbl_usuarios du');
        $this->db->where('du.id_perfil',4);
        $this->db->where('du.id_empresa',$id_empresa);
        $this->db->where('du.rut',$rut);
        $datos = $this->db->get();
        
        return $datos->num_rows();
    }
    
    public function info_basica($id_paciente){
    
        $this->db->select("u.rut, u.imagen, u.primer_nombre, u.segundo_nombre, u.apellido_paterno, u.apellido_materno, u.fecha_nac, e.estado_civil, p.nombre as pais");
        $this->db->from('tbl_usuarios u');
        $this->db->join('tbl_estado_civil e','u.id_estado_civil = e.id_estado_civil');
        $this->db->join('tbl_paises p','u.nacionalidad = p.cod_pais');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.id_usuario',$id_paciente);
        $datos = $this->db->get();
        //echo $this->db->last_query();exit();
        
        if($datos->num_rows() > 0){
            
            
            //Obtener y parsear datos basico del paciente
            $rut            = $datos->row()->rut                == "" ? "no informado"  :$datos->row()->rut;
            $p_nombre       = $datos->row()->primer_nombre      == "" ? "no informado" : $datos->row()->primer_nombre;
            $s_nombre       = $datos->row()->segundo_nombre     == "" ? "no informado" : $datos->row()->segundo_nombre;
            $a_peterno      = $datos->row()->apellido_paterno   == "" ? "no informado" : $datos->row()->apellido_paterno;
            $a_materno      = $datos->row()->apellido_materno   == "" ? "no informado" : $datos->row()->apellido_materno;
            $fecha_nac      = $datos->row()->fecha_nac          == "" ? "no informado" : $datos->row()->fecha_nac;
            $estado_civil   = $datos->row()->estado_civil       == "" ? "no informado" : $datos->row()->estado_civil;
            $pais           = $datos->row()->pais               == "" ? "no informado" : $datos->row()->pais;
            
            return array(
                "imagen"        => $datos->row()->imagen,
                "rut"           => $rut,
                "nombre"        => $p_nombre." ".$s_nombre." ".$a_peterno." ".$a_materno,
                "fecha_nac"     => $fecha_nac,
                "estado_civil"  => $estado_civil,
                "nacionalidad"  => $pais);
            
        }else{
            
            array(
                "imagen"        => "sin-foto.png",
                "rut"           => "",
                "nombre"        => "",
                "fecha_nac"     => "",
                "estado_civil"  => "",
                "nacionalidad"  => "");
        }        

    }
    
    /***************************************************************************
    /** @Funtion que permite ingresar un nuevo usuario perfil paciente
    /**************************************************************************/
    public function anadirUsuario($data){
        
        //VALIDAR SI EXISTE UN USUARIO TIPO PACIENTE CON EL MISMO RUT
        $validaUser = $this->validarUsuario($data["id_empresa"],$data["rut"]);
        
        if ($validaUser > 0){
            
            //Este rut (paciente) ya ha sido ingresado al sistema
            $mensaje = 'El R.U.T. ingresado ya se encuentra registrado en el sistema.
                        <br>
                        Asegúrate de verificar bien los datos ingresados.
                        <br>
                        Valida la existencia de el usuario recientemente ingresado
                        desde este link <a href="'.base_url().'/paciente_admin/listadoPacientes">Ver Mis Pacientes</a>.
                        <br>
                        <a class="alert-link" href="#">¡Inténtelo otra vez!</a>.';
            
            $this->session->set_flashdata('usuario_existe',$mensaje);
            
            redirect(base_url().'paciente_admin/RegistrarPaciente');
            
        }
        
        return true;
        
    }
    /***************************************************************************
    /** @Funtion que permite registrar a un nuevo paciente
    /**************************************************************************/
    public function registrarPaciente($dataForm){
        
        //VALIDAR SI EXISTE UN USUARIO TIPO PACIENTE CON EL MISMO RUT
        $this->anadirUsuario($dataForm);
        
        @date_default_timezone_set("Chile/Continental");
        $fecha = @date("Y-m-d G:i:s");
            
        $data["id_empresa"]          = $dataForm["id_empresa"];
        $data["id_perfil"]           = $dataForm["id_perfil"];
        $data["username"]            = $dataForm["username"];
        $data["password"]            = $dataForm["password"];
        $data["estado"]              = $dataForm["estado"];
        $data["creado_por"]          = $dataForm["creado_por"];
        $data["fecha_creacion"]      = $fecha;
        $data['rut']                 = $dataForm["rut"];
        $data['primer_nombre']       = $dataForm["p_nombre"];
        $data['segundo_nombre']      = $dataForm["s_nombre"];
        $data['apellido_paterno']    = $dataForm["a_paterno"];
        $data['apellido_materno']    = $dataForm["a_materno"];
        $data['telefono']            = $dataForm["telefono_f"];
        $data['celular']             = $dataForm["celular"];
        $data['genero']              = $dataForm["genero"];
        $data['email']               = $dataForm["correo"];
        $data['nacionalidad']        = $dataForm["pais_res"];
        $data['id_region']           = $dataForm["region"];
        $data['id_provincia']        = $dataForm["provincia"];
        $data['id_comuna']           = $dataForm["comuna"];
        $data['calle']               = $dataForm["calle"];
        $data['imagen']              = "";//esto esta pendiente
        $data['fecha_nac']           = $dataForm["fecha_nac"];
        $data['id_estado_civil']     = $dataForm["estado_civil"];             
        $data['lugar_nac']           = $dataForm["lugar_nac"];
        $data['id_religion']         = $dataForm["religion"];
        $data['id_prevision']        = $dataForm["prevision"];
        $data['id_ocupacion']        = $dataForm["ocupacion"];
        $data['id_nivel_estudio']    = $dataForm["niv_estudios"];
        $data['id_grupo_sang']       = $dataForm["grupo_sang"];
        $data['id_factorn_rh']       = $dataForm["factorn_rh"];
        
        //registrar nuevo paciente
        $insert_paciente = $this->db->insert('tbl_usuarios',$data);
        
        //ultimo id ingresado
        $id_paciente = $this->db->insert_id();
        
        //Validar ingreso de nuevo paciente
        $res = $insert_paciente == true ? true : redirect(base_url()."errors");
        
        //Validar ingreso del nuevo paciente
        if($res){
            
            //AGREGAR PERSONAS DE CONTACTO
            foreach ($dataForm['p_contactos'] as $contacto) {
                
                //Persona de contacto debe tener como minimo nombres, apellidos y tel.
                if($contacto["nombre"]!="" && $contacto["apellido"]!="" 
                        && $contacto["telefono"]!=""){
                    
                    $arr_contacto = array(
                        "id_paciente"   => $id_paciente,
                        "nombres"       => $contacto["nombre"],
                        "apellidos"     => $contacto["apellido"],
                        "id_parentesco" => $contacto["familiariodad"],
                        "telefono"      => $contacto["telefono"],
                        "correo"        => $contacto["correo"]
                    );

                    $this->db->insert('tbl_personas_contacto',$arr_contacto);
                }
            }
            
            //CREAR  NUEVA HISTORIA MEDICA PARA EL NUEVO PACIENTE
            $res = $this->anadirHistoriaClinica($id_paciente);
            
            return $res;
            
        }else{
            
            redirect(base_url()."errors");
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite editar un paciente
    /**************************************************************************/
    public function editarPaciente($dataForm){ 

        /* Obtener datos para editar paciente */
        $data["id_usuario"]          = $dataForm["id_usuario"];
        $data['rut']                 = $dataForm["rut"];
        $data['primer_nombre']       = $dataForm["p_nombre"];
        $data['segundo_nombre']      = $dataForm["s_nombre"];
        $data['apellido_paterno']    = $dataForm["a_paterno"];
        $data['apellido_materno']    = $dataForm["a_materno"];
        $data['telefono']            = $dataForm["telefono_f"];
        $data['celular']             = $dataForm["celular"];
        $data['genero']              = $dataForm["genero"];
        $data['email']               = $dataForm["correo"];
        $data['nacionalidad']        = $dataForm["pais_res"];
        $data['id_region']           = $dataForm["region"];
        $data['id_provincia']        = $dataForm["provincia"];
        $data['id_comuna']           = $dataForm["comuna"];
        $data['calle']               = $dataForm["calle"];
        $data['imagen']              = "";//esto esta pendiente
        $data['fecha_nac']           = $dataForm["fecha_nac"];
        $data['id_estado_civil']     = $dataForm["estado_civil"];             
        $data['lugar_nac']           = $dataForm["lugar_nac"];
        $data['id_religion']         = $dataForm["religion"];
        $data['id_prevision']        = $dataForm["prevision"];
        $data['id_ocupacion']        = $dataForm["ocupacion"];
        $data['id_nivel_estudio']    = $dataForm["niv_estudios"];
        $data['id_grupo_sang']       = $dataForm["grupo_sang"];
        $data['id_factorn_rh']       = $dataForm["factorn_rh"];
        $data['imagen']              = $dataForm["imagen"];
        
        //Editar datos del paciente
        $this->db->where('id_usuario',$dataForm["id_usuario"]);
        $res = $this->db->update('tbl_usuarios',$data);
        
        //Eliminar personas de contacto
        $this->db->where('id_paciente',$dataForm["id_usuario"]);
        $this->db->delete('tbl_personas_contacto');
        
        //Crear o editar persona de contacto segun sea el caso
        foreach ($dataForm['p_contactos'] as $contacto) {
            
            //Persona de contacto debe tener como minimo nombres, apellidos y tel.
            if($contacto["nombre"]!="" && $contacto["apellido"]!="" 
                    && $contacto["telefono"]!=""){

                $arr_contacto = array(
                    "id_paciente"   => $dataForm["id_usuario"],
                    "nombres"       => $contacto["nombre"],
                    "apellidos"     => $contacto["apellido"],
                    "id_parentesco" => $contacto["familiariodad"],
                    "telefono"      => $contacto["telefono"],
                    "correo"        => $contacto["correo"]
                );

                $this->db->insert('tbl_personas_contacto',$arr_contacto);
            }
        }
        
        return $res;
        
    }
    /***************************************************************************
    /** @Funtion que permite crear una nueva historia medica
    /**************************************************************************/
    public function anadirHistoriaClinica($id_paciente){
                
        //obtiene fecha y hora segun zona horaria
        @date_default_timezone_set("Chile/Continental");
        $fecha = @date("Y-m-d G:i:s");
        
        //datos a ingresar
        $data['id_paciente']        = $id_paciente;       
        $data["fecha_creacion"]     = $fecha;
        
        //registrar nueva historia medica
        return $insert_paciente = $this->db->insert('tbl_historias_medicas',$data);
        
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar los datos de un paciente
    /**************************************************************************/
    function datos_paciente($id_paciente){
        
        //cargamos los datos del usuario
        $this->db->select('du.id_usuario,
            du.rut,
            du.primer_nombre,
            du.segundo_nombre,
            du.apellido_paterno,
            du.apellido_materno,
            du.fecha_nac,
            du.telefono,
            du.celular,
            du.genero,
            du.email,
            du.nacionalidad,
            du.id_region,
            du.id_provincia,
            du.id_comuna,
            du.calle,
            du.imagen,
            du.fecha_nac,
            du.lugar_nac,
            p.nombre as nacionalidad,
            r.REGION_NOMBRE as region,
            pr.PROVINCIA_NOMBRE as provincia,
            c.COMUNA_NOMBRE as comuna,
            e.estado_civil,
            rg.religion,
            pm.prevision_medica,
            o.descripcion as ocupacion,
            ne.nivel_estudio,
            gr.grupo_sanguineo,
            rh.factor_rh
            ');
        $this->db->from('tbl_usuarios du');
        $this->db->join('tbl_paises p','p.cod_pais = du.nacionalidad','left');
        $this->db->join('tbl_region r','r.REGION_ID = du.id_region','left');
        $this->db->join('tbl_provincia pr','pr.PROVINCIA_ID = du.id_provincia','left');
        $this->db->join('tbl_comuna c','c.COMUNA_ID = du.id_comuna','left');
        $this->db->join('tbl_estado_civil e','e.id_estado_civil = du.id_estado_civil','left');
        $this->db->join('tbl_religiones rg','rg.id_religion = du.id_religion','left');
        $this->db->join('tbl_previsiones_medicas pm','pm.id_prevision_medica = du.id_prevision','left');
        $this->db->join('tbl_ocupaciones o','o.cod_ocupacion = du.id_ocupacion','left');
        $this->db->join('tbl_niveles_estudios ne','ne.id_nivel_estudio = du.id_nivel_estudio','left');
        $this->db->join('tbl_grupos_sanguineos gr','gr.id_grupo_sanguineo = du.id_grupo_sang','left');
        $this->db->join('tbl_factores_rh rh','rh.id_factor_rh = du.id_factorn_rh','left');
        $this->db->where('du.id_usuario',$id_paciente);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0){
            
            //calcular edad del paciente
            $fecha_nac  = $datos->row()->fecha_nac;
            $fecha_nac  = explode(" ",$fecha_nac);
            $fecha_nac  = @$fecha_nac[0];//Fecha de nacimiento
            $edad       = calcularEdad($fecha_nac) == "2015" ? "no informado" : calcularEdad($fecha_nac); 

            //Validar otras variables
            $rut            = $datos->row()->rut == "" ? "no informado": $datos->row()->rut;
            $p_nombre       = $datos->row()->primer_nombre == "" ? "no informado" : $datos->row()->primer_nombre;
            $s_nombre       = $datos->row()->segundo_nombre == "" ? "no informado" : $datos->row()->segundo_nombre;
            $a_peterno      = $datos->row()->apellido_paterno == "" ? "no informado" : $datos->row()->apellido_paterno;
            $a_materno      = $datos->row()->apellido_materno == "" ? "no informado" : $datos->row()->apellido_materno;
            $genero         = $datos->row()->genero == "M" ? "Masculino" : "Femenino";
            $email          = $datos->row()->email == "" ? "no informado" : $datos->row()->email;
            $telefono       = $datos->row()->telefono == "" ? "no informado" : $datos->row()->telefono;
            $celular        = $datos->row()->celular == "" ? "no informado" : $datos->row()->celular;
            $lugar_nac      = $datos->row()->lugar_nac == "" ? "no informado" : $datos->row()->lugar_nac;
            $estado_civil   = $datos->row()->estado_civil == "" ? "no informado" : $datos->row()->estado_civil;
            $religion       = $datos->row()->religion == "" ? "no informado" : $datos->row()->religion;
            $prevision      = $datos->row()->prevision_medica == "" ? "no informado" : $datos->row()->prevision_medica;
            $nacionalidad   = $datos->row()->nacionalidad == "" ? "no informado" : $datos->row()->nacionalidad;
            $nivel_estudio  = $datos->row()->nivel_estudio == "" ? "no informado": $datos->row()->nivel_estudio;
            $ocupacion      = $datos->row()->ocupacion == "" ? "no informado" : $datos->row()->ocupacion;
            $region         = $datos->row()->region == "" ? "no informado" : $datos->row()->region;
            $provincia      = $datos->row()->provincia == "" ? "no informado" : $datos->row()->provincia;
            $comuna         = $datos->row()->comuna == "" ? "no informado" : $datos->row()->comuna;
            $calle          = $datos->row()->calle  == "" ? "no informado" : $datos->row()->calle;
            $gr_sang        = $datos->row()->grupo_sanguineo == "" ? "no informado" : $datos->row()->grupo_sanguineo;
            $factor_rh      = $datos->row()->factor_rh == "" ? "no informado" : $datos->row()->factor_rh;
            $imagen         = $datos->row()->imagen == "" ? "sin-foto.png" : $datos->row()->imagen;
            
            //Buscar personas de contacto
            $this->db->select('pc.id_persona_contacto,pc.nombres,pc.apellidos,p.parentesco,pc.telefono,pc.correo');
            $this->db->from('tbl_personas_contacto pc');
            $this->db->join('tbl_parentescos p','p.id_parentesco = pc.id_parentesco');
            $this->db->where('pc.id_paciente',$datos->row()->id_usuario);
            $personas_contacto = $this->db->get()->result_array();
            
            $arr_paciente = array(
                "rut"               => $rut,
                "primer_nombre"     => ucfirst($p_nombre),
                "segundo_nombre"    => ucfirst($s_nombre),
                "apellido_paterno"  => ucfirst($a_peterno),
                "apellido_materno"  => ucfirst($a_materno),
                "genero"            => $genero,
                "edad"              => $edad,
                "email"             => $email,
                "estado_civil"      => ucfirst($estado_civil),
                "telefono"          => $telefono,
                "celular"           => $celular,
                "religion"          => ucfirst($religion),
                "prevision"         => ucfirst($prevision),
                "nacionalidad"      => ucfirst($nacionalidad),
                "nivel_estudio"     => ucfirst($nivel_estudio),
                "lugar_nac"         => $lugar_nac,
                "fecha_nac"         => cambiaf_a_normal($fecha_nac), 
                "ocupacion"         => ucfirst($ocupacion),
                "region"            => ucfirst($region),
                "provincia"         => ucfirst($provincia),
                "comuna"            => ucfirst($comuna),
                "calle"             => ucfirst($calle),
                "grupo_sang"        => ucfirst($gr_sang),
                "factor_rh"         => ucfirst($factor_rh),
                "personas_contacto" => $personas_contacto,
                "imagen"            => $imagen,
            );
            
            echo json_encode($arr_paciente); 
            
        }else{
            
            $arr_paciente = array(); 
            echo json_encode($arr_paciente);
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar un json con info de los pacientes
    /**************************************************************************/

    public function listado_pacientes(){
        $this->db->select("du.id_usuario,
        du.rut,
        du.primer_nombre,
        du.segundo_nombre,
        du.apellido_paterno,
        du.apellido_materno,
        du.telefono,
        du.celular,
        du.email,
        du.fecha_creacion,
        du.fecha_nac,
        hd.id_historia_medica,
        hd.fecha_creacion
        ");
        $this->db->from('tbl_usuarios du');
        $this->db->join('tbl_historias_medicas hd','hd.id_paciente = du.id_usuario');
        $this->db->where('du.id_perfil',4);
        $this->db->where('du.estado',0);
        $this->db->where('du.eliminado',0);        
        $this->db->order_by("du.id_usuario", "asc");
        $datos = $this->db->get();

        return $datos->result_array();
    }

    public function listadoPacientes_json($id_empresa){
        
        //Query para obtener listado de pacientes
        $this->db->select("du.id_usuario,
        du.rut,
        du.primer_nombre,
        du.segundo_nombre,
        du.apellido_paterno,
        du.apellido_materno,
        du.telefono,
        du.celular,
        du.email,
        du.fecha_creacion,
        du.fecha_nac,
        hd.id_historia_medica,
        hd.fecha_creacion
        ");
        $this->db->from('tbl_usuarios du');
        $this->db->join('tbl_historias_medicas hd','hd.id_paciente = du.id_usuario');
        $this->db->where('du.id_perfil',4);
        $this->db->where('du.estado',0);
        $this->db->where('du.eliminado',0);
        $this->db->where('du.id_empresa',$id_empresa);
        $this->db->order_by("du.id_usuario", "asc");
        $datos = $this->db->get();
        
        $arr_data   = array();//CREAR ARREGLO QUE TENDRA LA INFORMACION
        $response   = array();//CREAR ARREGLO DEL JSON
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result() as $row){
                
                //Creamos nuestras variables
                $nombres    = ucfirst($row->primer_nombre)." ".ucfirst($row->segundo_nombre);
                $apellidos  = ucfirst($row->apellido_paterno)." ".ucfirst($row->apellido_materno);
                $edad       = 22;
                $celular    = $row->celular == "" ? "no informado" :  $row->celular;
                $email      = $row->email == "" ? "no informado" : $row->email;
                
                $fecha      = explode(" ",$row->fecha_creacion);
                $fecha_c    = strtotime($fecha[0]);
                $fecha_c    = date('d/m/Y',$fecha_c);//cambiar formato de la fecha
                
                $fecha_nac  = $row->fecha_nac;
                $fecha_nac  = explode(" ",$fecha_nac);
                $fecha_nac  = @$fecha_nac[0];//Fecha de nacimiento
                $edad       = calcularEdad($fecha_nac) == "2015" ? "no informado" : calcularEdad($fecha_nac); 
                
                $fa_editar  = '<a href="'.base_url().'paciente_admin/editarPaciente/'.$row->id_usuario.'" title="Editar Información"><i class="fa fa-pencil-square-o"></i></a>';
                $fa_view    = '<a href="#" title="Ver Información" onclick="ver_datos_paciente('.$row->id_usuario.');" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>';
                $fa_delete  = '<a href="#" title="Eliminar Paciente" onclick="eliminar_paciente(\''.$row->id_usuario.'\',\''.$row->primer_nombre.' '.$row->apellido_paterno.'\',\''.$row->rut.'\');"><i class="fa fa-times"></i></a>';
                $fa_hc      = '<a href="#" title="Ver Historia Clínica" onclick="ver_HC(\''.$row->id_usuario.'\',\''.$row->id_historia_medica.'\');"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';
                

                //Crear arreglo con los datos del paciente
                $arr_paciente[] = array(
                    "fecha_creacion"    => $fecha_c,
                    "rut"               => $row->rut,
                    "nombres"           => $nombres,
                    "apellidos"         => $apellidos,
                    "edad"              => $edad,
                    "celular"           => $celular,
                    "email"             => $email,
                    "h_clinica"         => $fa_hc,
                    "editar"            => $fa_editar,
                    "view"              => $fa_view,
                    "delete"            => $fa_delete
                );
            }
            
            //RETORNAR JSON CON LA INFORMACION DEL PACIENTE
            //$response['data'] = $arr_paciente;
            $arr_data = $arr_paciente;
            echo json_encode($arr_paciente); 
            
        }else{
            
            //RETORNAR JSON VACIO
            //$response['data'] = $arr_data;
            echo json_encode($arr_data);
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar informacion completa de un paciente
    /**************************************************************************/
    public function info_paciente($id_paciente){
        
        //Query para obtener listado de pacientes
        $this->db->select("
        u.id_usuario,
        u.rut,
        u.primer_nombre,
        u.segundo_nombre,
        u.apellido_paterno,
        u.apellido_materno,
        u.telefono,
        u.genero,
        u.celular,
        u.email,
        u.nacionalidad,
        p.nombre as pais,
        u.id_region,
        rg.REGION_NOMBRE,
        u.id_provincia,
        pv.PROVINCIA_NOMBRE,
        u.id_comuna,
        cm.COMUNA_NOMBRE,
        u.calle,
        u.imagen,
        u.fecha_nac,
        u.id_estado_civil,
        e.estado_civil,
        u.lugar_nac,
        u.id_religion,
        r.religion,
        u.id_prevision,
        pm.prevision_medica,
        u.id_ocupacion,
        o.descripcion as ocupacion,
        u.id_nivel_estudio,
        ne.nivel_estudio,
        u.id_grupo_sang,
        gs.grupo_sanguineo,
        u.id_factorn_rh,
        rh.factor_rh,
        u.fecha_modificacion,
        u.fecha_creacion
        ");
        $this->db->from('tbl_usuarios u');
        $this->db->join('tbl_region rg','rg.REGION_ID = u.id_region','lefts');
        $this->db->join('tbl_provincia pv','pv.PROVINCIA_ID = u.id_provincia','left');
        $this->db->join('tbl_comuna cm','cm.COMUNA_ID = u.id_comuna','left');
        $this->db->join('tbl_estado_civil e','e.id_estado_civil = u.id_estado_civil','left');
        $this->db->join('tbl_religiones r','r.id_religion = u.id_religion','left');
        $this->db->join('tbl_paises p','p.cod_pais = u.nacionalidad','left');
        $this->db->join('tbl_previsiones_medicas pm','pm.id_prevision_medica = u.id_prevision','left');
        $this->db->join('tbl_ocupaciones o','o.cod_ocupacion = u.id_ocupacion','left');
        $this->db->join('tbl_niveles_estudios ne','ne.id_nivel_estudio = u.id_nivel_estudio','left');
        $this->db->join('tbl_grupos_sanguineos gs','gs.id_grupo_sanguineo = u.id_grupo_sang','left');
        $this->db->join('tbl_factores_rh rh','rh.id_factor_rh = u.id_factorn_rh','left');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.id_usuario',$id_paciente);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            $row = $datos->row_array();
            
            //Buscar personas de contacto
            $this->db->select("pc.id_persona_contacto,pc.nombres,pc.apellidos,p.parentesco,pc.id_parentesco,pc.telefono,pc.correo");
            $this->db->from('tbl_personas_contacto pc');
            $this->db->join('tbl_parentescos p','p.id_parentesco = pc.id_parentesco','left');
            $this->db->where('pc.id_paciente',$row["id_usuario"]);
            $contactos = $this->db->get()->result_array();
            
            $arr_info = array(
                "id_usuario"        => $row["id_usuario"],
                "rut"               => $row["rut"],
                "primer_nombre"     => $row["primer_nombre"],
                "segundo_nombre"    => $row["segundo_nombre"],
                "apellido_paterno"  => $row["apellido_paterno"],
                "apellido_materno"  => $row["apellido_materno"],
                "telefono"          => $row["telefono"],
                "genero"            => $row["genero"],
                "celular"           => $row["celular"],
                "email"             => $row["email"],
                "nacionalidad"      => $row["nacionalidad"],
                "pais"              => $row["pais"],
                "id_region"         => $row["id_region"],
                "region"            => $row["REGION_NOMBRE"],
                "id_provincia"      => $row["id_provincia"],
                "provincia"         => $row["PROVINCIA_NOMBRE"],
                "id_comuna"         => $row["id_comuna"],
                "comuna"            => $row["COMUNA_NOMBRE"],
                "calle"             => $row["calle"],
                "imagen"            => $row["imagen"],
                "fecha_nac"         => cambiaf_a_normal($row["fecha_nac"]),
                "id_estado_civil"   => $row["id_estado_civil"],
                "estado_civil"      => $row["estado_civil"],
                "lugar_nac"         => $row["lugar_nac"],
                "id_religion"       => $row["id_religion"],
                "religion"          => $row["religion"],
                "id_prevision"      => $row["id_prevision"],
                "prevision"         => $row["prevision_medica"],
                "id_ocupacion"      => $row["id_ocupacion"],
                "ocupacion"         => $row["ocupacion"],
                "id_nivel_estudio"  => $row["id_nivel_estudio"],
                "nivel_estudio"     => $row["nivel_estudio"],
                "id_grupo_sang"     => $row["id_grupo_sang"],
                "grupo_sanguineo"   => $row["grupo_sanguineo"],
                "id_factor_rh"      => $row["id_factorn_rh"],
                "factor_rh"         => $row["factor_rh"],
                "fecha_mod"         => $row["fecha_modificacion"],
                "fecha_creacion"    => $row["fecha_creacion"],
                "personas_contacto" => $contactos,
            );
            
            return $arr_info;
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite eliminar un paciente (por seguridad solo 
     * cambiaremos su estado de eliminado a true
    /**************************************************************************/
    public function removePaciente($id_paciente){
        
        //Editar estado eliminado del paciente
        $this->db->where('id_usuario',$id_paciente);
        $res = $this->db->update('tbl_usuarios',array("eliminado" => true));
        
        return $res;
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar nombre y id de un paciente
    /**************************************************************************/
    function datos_agenda_paciente($rut_paciente,$id_empresa){
        
        //cargamos los datos del usuario
        $this->db->select('
            u.id_usuario,
            u.rut,
            u.primer_nombre,
            u.segundo_nombre,
            u.apellido_paterno,
            u.apellido_materno,
            u.celular,
            u.telefono,
            u.imagen,
            u.email,u.fecha_nac,
            p.nombre as pais,
            e.estado_civil'
        );
        $this->db->from('tbl_usuarios u');
        $this->db->join('tbl_paises p','u.nacionalidad = p.cod_pais','left');
        $this->db->join('tbl_estado_civil e','u.id_estado_civil = e.id_estado_civil','left');
        $this->db->where('u.rut',$rut_paciente);
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.id_empresa',$id_empresa);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0){
            
            //Validar otras variables
            $id_paciente    = $datos->row()->id_usuario;
            $rut            = $datos->row()->rut                == "" ? "no informado"  : $datos->row()->rut;
            $p_nombre       = $datos->row()->primer_nombre      == "" ? "no informado" : $datos->row()->primer_nombre;
            $s_nombre       = $datos->row()->segundo_nombre     == "" ? "no informado" : $datos->row()->segundo_nombre;
            $a_peterno      = $datos->row()->apellido_paterno   == "" ? "no informado" : $datos->row()->apellido_paterno;
            $a_materno      = $datos->row()->apellido_materno   == "" ? "no informado" : $datos->row()->apellido_materno;
            
            $celular        = $datos->row()->celular    == "" ? "no informado" : $datos->row()->celular;
            $tel_fijo       = $datos->row()->telefono   == "" ? "no informado" : $datos->row()->telefono;
            $correo         = $datos->row()->email      == "" ? "no informado" : $datos->row()->email;
            
            $fecha_nac      = $datos->row()->fecha_nac;
            $nacionalidad   = $datos->row()->pais == "" ? "no informado" : $datos->row()->pais;
            $estado_civil   = $datos->row()->estado_civil == "" ? "no informado" : $datos->row()->estado_civil;
            $imagen         = $datos->row()->imagen == "" ? "sin-foto.png" : $datos->row()->imagen;
            
            $arr_paciente = array(
                "id_paciente"       => $id_paciente,
                "rut"               => $rut,
                "imagen"            => $imagen,
                "primer_nombre"     => ucfirst($p_nombre),
                "segundo_nombre"    => ucfirst($s_nombre),
                "apellido_paterno"  => ucfirst($a_peterno),
                "apellido_materno"  => ucfirst($a_materno),
                "celular"           => $celular,
                "tel_fijo"          => $tel_fijo,
                "correo"            => $correo,
                "nacionalidad"      => $nacionalidad,
                "estado_civil"      => $estado_civil,
                "fecha_nac"         => $fecha_nac
            );
            
            echo json_encode($arr_paciente); 
            
        }else{
            
            $arr_paciente = array(); 
            echo json_encode($arr_paciente);
        }
    }
    
    public function personas_contacto($id_paciente){
        
        $this->db->select('
            pc.id_persona_contacto,
            pc.id_paciente,
            pc.nombres,
            pc.apellidos,
            pc.id_parentesco,
            p.parentesco,
            p.grado,
            pc.telefono,
            pc.correo'
        );
        $this->db->from('tbl_personas_contacto pc');
        $this->db->join('tbl_parentescos p','pc.id_parentesco = p.id_parentesco','left');
        $this->db->where('pc.id_paciente',$id_paciente);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0){
            
            $res = $datos->result_array();
            
            foreach ($res as $persona_c){
                
                $p_contacto[] = array(
                    "id_persona_contacto" => $persona_c["id_persona_contacto"],
                    "nombres" => $persona_c["nombres"],
                    "apellidos" => $persona_c["apellidos"],
                    "parentesco" => $persona_c["parentesco"],
                    "telefono" => $persona_c["telefono"],
                    "correo" => $persona_c["correo"]
                );
            }
            
            echo json_encode($p_contacto); 
            
        }else{
            
            return json_encode(array());
        }
    }
    
    function get_img($idperfil){
        
        $q = $this->db->query("SELECT imagen 
                                FROM tbl_usuarios 
                                WHERE id_usuario = ". $idperfil);
        return $q->result_array()[0];
    }
}	