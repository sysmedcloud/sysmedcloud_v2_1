<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }	
    
    /***************************************************************************
    /** @Funtion que permite retornar los datos personales del usuario
    /**************************************************************************/
    function info_personal($id_usuario)
    {
        
        //cargamos los datos del usuario
        $this->db->select('
            u.id_usuario,
            u.username,
            du.rut,
            du.primer_nombre,
            du.segundo_nombre,
            du.apellido_paterno,
            du.apellido_materno,
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
            du.fecha_nac');
        $this->db->from('tbl_usuarios u');
        $this->db->join('tbl_usuarios du','du.id_usuario = u.id_usuario');
        //$this->db->join('tbl_paises p','p.id_pais = pa.id_pais');
        $this->db->where('u.id_usuario',$id_usuario);
        
        $datos = $this->db->get();
        
        if ($datos->num_rows() > 0)
        {
            return $datos->row();
            
        }else{
            
            redirect(base_url()."login_app/accion/logout");
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite modificar los datos personales del usuario
    /**************************************************************************/
    public function editarPerfil($data){
        
        $dataMod["rut"]                 = $data["rut"];
        $dataMod['primer_nombre']       = $data["p_nombre"];
        $dataMod['segundo_nombre']      = $data["s_nombre"];
        $dataMod['apellido_paterno']    = $data["a_paterno"];
        $dataMod['apellido_materno']    = $data["a_materno"];
        $dataMod['telefono']            = $data["telefono_f"];
        $dataMod['celular']             = $data["celular"];
        $dataMod['genero']              = $data["genero"];
        $dataMod['email']               = $data["correo"];
        $dataMod['nacionalidad']        = $data["pais_res"];
        $dataMod['id_region']           = $data["region"];             
        $dataMod['id_provincia']        = $data["provincia"];
        $dataMod['id_comuna']           = $data["comuna"];
        $dataMod['calle']               = $data["calle"];
        $dataMod['fecha_nac']           = $data["fecha_nac"];
        
        //MODIFICAR USERNAME Y PASSWORD
        $dataMod["username"] = $data["username"];
        
        //validar nueva password
        if($data["password"] != ""){//Cambiar contraseña

            $dataMod["password"] = md5($data["password"]);
        }
        
        $this->db->where('id_usuario',$data["id_usuario"]);
        $perfil_editado = $this->db->update('tbl_usuarios',$dataMod);
        
        //Validar cambio de informacion
        $res = $perfil_editado == true ? true : redirect(base_url()."errors");
        
        return $res;
        
    }

    function update_img( $param ){
        $data = array('imagen' => $param["foto"]);   
        
        $this->db->where('id_usuario',$param["id_usuario"]);
        $this->db->update('tbl_usuarios',$data);
        if($this->db->affected_rows() >= 0){ 
            $this->db->select('imagen');
            $this->db->from('tbl_usuarios');
            $this->db->where('id_usuario', $param['id_usuario']);
            $q = $this->db->get()->result_array();
            return $q;
        }else{
            return false;
        } 
    }

}	