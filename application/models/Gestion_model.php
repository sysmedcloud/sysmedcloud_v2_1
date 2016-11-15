<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

    /**************************************************************************/
    /** Área de seleccion de datos
    /**************************************************************************/

    function get_alergias(){
    	$this->db->from('tbl_alergias');
    	$query = $this->db->get();
    	return $query->result_array();
    }	

    function get_patologias(){
        $this->db->from('tbl_patologias');
        $this->db->limit('20');
        $query = $this->db->get();        
        return $query->result_array();
    }

    function get_medicamentos(){
    	$this->db->from('tbl_medicamentos');
        $this->db->limit('50');
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    function get_diagnosticos(){
        $this->db->from('tbl_diagnosticos');       
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_vacunas(){
        $this->db->from('tbl_vacunas');       
        $query = $this->db->get();
        return $query->result_array();   
    }

    function get_tratamientos(){
        $this->db->from('tbl_tratamientos');       
        $query = $this->db->get();
        return $query->result_array();
    }

    /**************************************************************************/
    /** Área de seleccion de datos por ID
    /**************************************************************************/

    function get_datos_byID( $param ){
        switch ($param['tipo']) {
            case 1:
                # Alergias
                $this->db->from('tbl_alergias');       
                $this->db->where('cod_alergia', $param['id']);
                $query = $this->db->get();
                return $query->result_array();
                break;
            case 2:
                # Patologias
                $this->db->from('tbl_patologias');       
                $this->db->where('id_patologia', $param['id']);
                $query = $this->db->get();
                return $query->result_array();
                break;
            case 3:
                # Medicmantos
                $this->db->from('tbl_medicamentos');       
                $this->db->where('cod_medicamento', $param['id']);
                $query = $this->db->get();
                return $query->result_array();
                break;
            case 4:
                # Vacunas
                $this->db->from('tbl_vacunas');       
                $this->db->where('cod_vacuna', $param['id']);
                $query = $this->db->get();
                return $query->result_array();
                break;
            case 5:
                # Tratamientos
                $this->db->from('tbl_tratamientos');       
                $this->db->where('cod_tratamiento', $param['id']);
                $query = $this->db->get();
                return $query->result_array();
                break;
            case 6:
                # Diagnosticos
                $this->db->from('tbl_diagnosticos');       
                $this->db->where('cod_diagnostico', $param['id']);
                $query = $this->db->get();
                return $query->result_array();
                break;            
            default:
                echo "Error al obtener datos";
                break;
        }
        $this->db->from('tbl_alergias');
        $this->db->where('cod_alergia', $param['cod_alergia']);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**************************************************************************/
    /** Área de inserción de datos
    /**************************************************************************/

    function agregar_alergia( $param ){
        $data_alergia = array(
            'nombre_alergia'        => $param['txt_nom_aler'],
            'alergeno_detectado'    => $param['txt_aler_det'],
            'zona_afectada'         => $param['txt_zona_afec'],
            'sintomatologia'        => $param['txt_sintom'],
            'indicaciones'          => $param['txt_ind'] 
            );

        if($this->db->insert('tbl_alergias',$data_alergia)){
            return true;
        }else{
            return false;
        }
    }

    function agregar_patologia( $param ){       
        $q = $this->db->get('tbl_patologias');
        $nro_patologia = $q->num_rows();

        $data_patologia = array(
                'cod_patologia'             => "PAT".$nro_patologia,
                'descripcion'               => $param['txt_desc'],
                'sintomatologia'            => $param['txt_sintom'],
                'indicaciones_preliminares' => $param['txt_ind'],
            );

        if($this->db->insert('tbl_patologias',$data_patologia)){
            return true;
        }else{
            return false;
        }
    }

    function agregar_medicamento( $param ){    
        $data_medicamento = array(
            'nombre_medicamento'        => $param['txt_nom_med'],
            'fecha_vencimiento'         => $param['txt_fec_venc'],
            'presentacion_comercial'    => $param['txt_pres'],
            'via_administracion'        => $param['txt_via'],
            'principio_activo'          => $param['txt_princ'],
            'unidad_medida'             => $param['txt_uni'],
            'cantidad'                  => $param['txt_cant'],
            'unidad_referencia'         => $param['txt_uni_ref'],
            'nombre_laboratorio'        => $param['txt_lab'],
            );

        if($this->db->insert('tbl_medicamentos',$data_medicamento)){
            return true;
        }else{
            return false;
        }
    }

    function agregar_vacuna( $param ){
        print_r($param);
        $data_vacuna = array(
            
            );

        if($this->db->insert('tbl_vacunas',$data_vacuna)){
            return true;
        }else{
            return false;
        }
    }

    function agregar_tratamiento( $param ){
        print_r($param);
        $data_tratamiento = array(
            );

        if($this->db->insert('tbl_tratamientos',$data_tratamiento)){
            return true;
        }else{
            return false;
        }
    }

    function agregar_diagnostico( $param ){        
        $data_diagnostico = array(
            'sistema_afectado'  => $param['txt_sis'],
            'desc_diagnostico'  => $param['txt_desc'],
            'reposo_indicado'   => $param['txt_ind'],
            );

        if($this->db->insert('tbl_diagnosticos',$data_diagnostico)){
            return true;
        }else{
            return false;
        }
    }

    /**************************************************************************/
    /** Área de actualizacion de datos
    /**************************************************************************/

     function actualizar_alergia( $param ){
        $data_alergia = array(
            'nombre_alergia'        => $param['txt_nombre_alergia'],
            'alergeno_detectado'    => $param['txt_alergeno_detectado'],
            'zona_afectada'         => $param['txt_zona_afectada'],
            'sintomatologia'        => $param['txt_sintomatologia'],
            'indicaciones'          => $param['txt_indicaciones'] 
            );

        if($this->db->update('tbl_alergias',$data_alergia, array("cod_alergia" => $param['txt_cod_alergia']))){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_patologia( $param ){       
        $data_patologia = array(                
                'descripcion'               => $param['txt_descripcion'],
                'sintomatologia'            => $param['txt_sintomatologia'],
                'indicaciones_preliminares' => $param['txt_indicaciones_preliminares'],
            );

        if($this->db->update('tbl_patologias',$data_patologia, array("cod_patologia" => $param['txt_cod_patologia']))){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_medicamento( $param ){    
        $data_medicamento = array(
            'nombre_medicamento'        => $param['txt_nombre_medicamento'],
            'fecha_vencimiento'         => $param['txt_fecha_vencimiento'],
            'presentacion_comercial'    => $param['txt_presentacion_comercial'],
            'via_administracion'        => $param['txt_via_administracion'],
            'principio_activo'          => $param['txt_principio_activo'],
            'unidad_medida'             => $param['txt_unidad_medida'],
            'cantidad'                  => $param['txt_cantidad'],
            'unidad_referencia'         => $param['txt_unidad_referencia'],
            'nombre_laboratorio'        => $param['txt_nombre_laboratorio'],
            );

        if($this->db->update('tbl_medicamentos',$data_medicamento, array("cod_medicamento" => $param['txt_cod_medicamento']))){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_vacuna( $param ){
        print_r($param);
        $data_vacuna = array(
            
            );

        if($this->db->insert('tbl_vacunas',$data_vacuna)){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_tratamiento( $param ){
        print_r($param);
        $data_tratamiento = array(
            );

        if($this->db->insert('tbl_tratamientos',$data_tratamiento)){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_diagnostico( $param ){        
        $data_diagnostico = array(
            'sistema_afectado'  => $param['txt_sistema_afectado'],
            'desc_diagnostico'  => $param['txt_desc_diagnostico'],
            'reposo_indicado'   => $param['txt_reposo_indicado'],
            );

        if($this->db->update('tbl_diagnosticos',$data_diagnostico, array("cod_diagnostico" => $param['txt_cod_diagnostico']))){
            return true;
        }else{
            return false;
        }
    }


    /**************************************************************************/
    /** Área de eliminacion de datos
    /**************************************************************************/
    function eliminar_datos( $param ){        
        switch ($param['dato']) {
            case 1:
                # Alergias
                $this->db->delete('tbl_alergias', array('cod_alergia' => $param['id']));
                break;
            case 2:
                # Patologias
                $this->db->delete('tbl_patologias', array('id_patologia' => $param['id']));
                break;
            case 3:
                # Medicamentos
                $this->db->delete('tbl_medicamentos', array('cod_medicamento' => $param['id']));
                break;
            case 4:
                # Vacunas
                $this->db->delete('tbl_vacunas', array('cod_vacuna' => $param['id']));
                break;
            case 5:
                # Tratamientos
                $this->db->delete('tbl_tratamientos', array('cod_tratamiento' => $param['id']));
                break;
            case 6:
                # Diagnosticos
                $this->db->delete('tbl_diagnosticos', array('cod_diagnostico' => $param['id']));
                break;            
            default:
                echo "Error al eliminar datos";
                break;
        }
    }
}	