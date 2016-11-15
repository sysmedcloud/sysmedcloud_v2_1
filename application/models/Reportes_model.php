<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }  
    
    public function consolidado_datos_paciente($rut){
        $query = $this->db->query("SELECT *  
                                    FROM tbl_usuarios tu 
                                    JOIN tbl_historias_medicas thm on thm.id_paciente = tu.id_usuario
                                    LEFT JOIN tbl_estado_civil tec ON tec.id_estado_civil = tu.id_estado_civil
                                    LEFT JOIN tbl_ocupaciones tbo on tbo.cod_ocupacion = tu.id_ocupacion
                                    LEFT JOIN tbl_region tr on tr.region_id = tu.id_region
                                    LEFT JOIN tbl_comuna tc on tc.COMUNA_ID = tu.id_comuna
                                    LEFT JOIN tbl_provincia tpro on tpro.PROVINCIA_ID = tu.id_provincia
                                    LEFT JOIN tbl_paises tp on tp.cod_pais = tu.nacionalidad
                                    LEFT JOIN tbl_ocupaciones toc on toc.cod_ocupacion = tu.id_ocupacion
                                    LEFT JOIN tbl_previsiones_medicas tpm on tpm.id_prevision_medica = tu.id_prevision
                                    LEFT JOIN tbl_religiones tre on tre.id_religion = tu.id_religion
                                    LEFT JOIN tbl_niveles_estudios tne on tne.id_nivel_estudio = tu.id_nivel_estudio
                                    LEFT JOIN tbl_factores_rh tfrh on tfrh.id_factor_rh = tu.id_factorn_rh
                                    LEFT JOIN tbl_grupos_sanguineos tgs on tgs.id_grupo_sanguineo = tu.id_grupo_sang
                                    WHERE replace(replace(rut, '.', ''), '-', '') = '" . $rut ."'" );
        $r = $query->result_array();            
        $data = array();
        if($query->num_rows() > 0){
            foreach ($r as $key_data => $val_data) {
                array_push($data,array( 'ficha_medica' => $val_data,
                                        'consultas_medicas' => $this->consultas_paciente($val_data['id_usuario'])));
            }
            return $data;                        
        }else{
            return 'error';
        }

    }

    public function consultas_paciente($id_paciente){
        $this->db->select('*');
        $this->db->from('tbl_consulta_medica');
        $this->db->where('id_paciente', $id_paciente);
        $q = $this->db->get();
        $r = $q->result_array();
        return $r;
    }
}