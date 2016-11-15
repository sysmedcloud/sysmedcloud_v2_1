<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    //ingresar consulta medica
    public function add_consulta_med($data,$id_cita_med){
        
        $this->db->insert('tbl_consulta_medica',$data);
        $id_consulta_med = $this->db->insert_id();
        
        if($id_consulta_med > 0){
            
            //Validar si consulta medica tiene relacion con alguna cita medica
            if($id_cita_med != ""){
                
                //Relacionar cita med. con consulta realizada 
                //Cambiamos estado cita medica (atendido)
                $this->db->where('id',$id_cita_med);
                $this->db->update('tbl_citas_medicas',array("id_consulta_medica"=>$id_consulta_med,"id_estado_cita_medica" => 5,"class"=>"#095894"));
                
                return $id_consulta_med;
                
            }else{//No hay relacion con alguna cita medica
                
                return $id_consulta_med;
            }
            
        }else{
            
            return $id_consulta_med;
        }
    }
    
    public function add_rev_sint_generales($data){
        
        $this->db->insert('tbl_rs_sintomas_generales',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_resp($data){
        
        $this->db->insert('tbl_rs_sintomas_respiratorios',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_cardio($data){
        
        $this->db->insert('tbl_rs_sintomas_cardiovasculares',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_gastro($data){
        
        $this->db->insert('tbl_rs_sintomas_gastroinstestinales',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_geni($data){
        
        $this->db->insert('tbl_rs_sintomas_genitourinarios',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_neuro($data){
        
        $this->db->insert('tbl_rs_sintomas_neurologicos',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_endo($data){
        
        $this->db->insert('tbl_rs_sintomas_endocrinos',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_files($id_consulta_med,$token_rs){
        
        //Relacionamos los archivos con la consulta medica
        $this->db->where('token', $token_rs);
        $this->db->update('tbl_rs_archivos',array("id_consulta"=>$id_consulta_med)); 
    }
    
    public function add_ex_f_files($id_consulta_med,$token_ef){
        
        //Relacionamos los archivos con la consulta medica
        $this->db->where('token', $token_ef);
        $this->db->update('tbl_efg_archivos',array("id_consulta"=>$id_consulta_med)); 
    }
    
    public function add_ex_decubito($data){
        
        $this->db->insert('tbl_efg_decubito',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_deambulacion($data){
        
        $this->db->insert('tbl_efg_deambulacion',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_facie($data){
        
        $this->db->insert('tbl_efg_facie',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_conciencia($data){
        
        $this->db->insert('tbl_efg_conciencia',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_piel($data){
        
        $this->db->insert('tbl_efg_piel',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_s_linfatico($data){
        
        $this->db->insert('tbl_efg_linfatico',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_signos_vitales($data){
        
        $this->db->insert('tbl_efg_signos_vitales',$data);
        return $this->db->insert_id();
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar consultas medicas realizadas por un usuario
    /**************************************************************************/
    public function listado_consultas(){
        //Query para obtener listado de pacientes
        $this->db->select("cm.id_consulta,
                            u.rut,
                            u.primer_nombre,
                            u.segundo_nombre,
                            u.apellido_paterno,
                            u.apellido_materno,
                            cm.motivo_consulta,
                            cm.anamnesis_proxima,
                            cm.hipotesis_diagnostica,
                            cm.tratamiento,
                            cm.observaciones,
                            cm.fecha_consulta");
        $this->db->from('tbl_consulta_medica cm');
        $this->db->join('tbl_usuarios u','u.id_usuario = cm.ingresado_por');
        //$this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);        
        $this->db->where('cm.eliminado',0);        
        $this->db->order_by("cm.id_consulta","asc");
        $datos = $this->db->get();
        return $datos->result_array(); 
    }

    public function listado_consultas_medicas($id_usuario){
        
        //Query para obtener listado de pacientes
        $this->db->select("cm.id_consulta,cm.id_paciente,cm.motivo_consulta,cm.anamnesis_proxima,cm.hipotesis_diagnostica,cm.tratamiento,cm.observaciones,cm.fecha_consulta");
        $this->db->from('tbl_consulta_medica cm');
        $this->db->join('tbl_usuarios u','u.id_usuario = cm.ingresado_por');
        //$this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        $this->db->where('u.id_usuario',$id_usuario);
        $this->db->where('cm.eliminado',0);        
        $this->db->order_by("cm.id_consulta","asc");
        $datos = $this->db->get();
        //echo $this->db->last_query();exit();
        
        $arr_data   = array();//CREAR ARREGLO QUE TENDRA LA INFORMACION
        $response   = array();//CREAR ARREGLO DEL JSON
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result() as $row){
                
                //buscar nombre completo del paciente
                $this->db->select("u.rut,u.primer_nombre,u.segundo_nombre,u.apellido_paterno,u.apellido_materno");
                $this->db->from('tbl_usuarios u');
                $this->db->where('u.id_perfil',4);
                $this->db->where('u.estado',0);
                $this->db->where('u.eliminado',0);
                $this->db->where('u.id_usuario',$row->id_paciente);
                $row_p = $this->db->get()->row();
                
                $nombre_paciente = ucfirst($row_p->primer_nombre)." ".ucfirst($row_p->apellido_paterno)." ".ucfirst($row_p->apellido_materno);
                $rut_paciente = $row_p->rut;
                
                //Creamos nuestras variables               
                $fecha      = explode(" ",$row->fecha_consulta);
                $fecha_c    = strtotime($fecha[0]);
                $fecha_c    = date('d/m/Y',$fecha_c);//cambiar formato de la fecha
                
                $fa_editar  = '<a href="#" data-toggle="modal" data-target=".editar_consulta_medica" title="Editar Información" onclick="editar_consulta_med('.$row->id_consulta.');"><i class="fa fa-pencil-square-o"></i></a>';
                $fa_view    = '<a href="#" data-toggle="modal" data-target=".informacion_consulta_medica" title="Ver Información" onclick="ver_info_consulta_med('.$row->id_consulta.');"><i class="fa fa-eye"></i></a>';
                $fa_delete  = '<a href="#" title="Eliminar Consulta Medica" onclick="eliminar_consulta_med(\''.$row->id_consulta.'\');"><i class="fa fa-times"></i></a>';
                
                //Crear arreglo con los datos del paciente
                $arr_consultas_medicas[] = array(
                    "id_consulta"       => $row->id_consulta,
                    "fecha"             => $fecha_c,
                    "rut"               => $rut_paciente,
                    "paciente"          => $nombre_paciente,       
                    "motivo_consulta"   => $row->motivo_consulta,
                    //"anamnesis_proxima" => $row->anamnesis_proxima,
                    "acciones"          => "<div style='width:100%; text-align:center; letter-spacing: 8px;'>".$fa_view." ".$fa_editar." ".$fa_delete."</div>",
                );
            }
            
            //RETORNAR JSON CON LA INFORMACION DEL PACIENTE
            //$response['data'] = $arr_paciente;
            $arr_data = $arr_consultas_medicas;
            echo json_encode($arr_data); 
            
        }else{
            
            //RETORNAR JSON VACIO
            //$response['data'] = $arr_data;
            echo json_encode($arr_data);
        }
    }
    
    //archivos rev. por sistema
    public function ingresar_archivo($data){
        
        $this->db->insert('tbl_rs_archivos',$data);
        //return $this->db->insert_id();
        return true;
    }
    
    public function archivos_rs($token){
        
        $this->db->select("a.id_rs_archivo,a.id_consulta,a.titulo,
                           a.descripcion,a.archivo,a.fecha_ing,a.ingresado_por,
                           a.fecha_mod,a.modificado_por,a.token");
        $this->db->from('tbl_rs_archivos a');
        $this->db->where('a.token',$token);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result_array() as $row){
                
                //Crear arreglo con los archivos
                $archivos_rs[] = "archivos_/".$row["archivo"];
            }
            
        }else{
             
            $archivos_rs = array();
        }
         
         return $archivos_rs;
    }
    
    public function eliminar_archivo($data){
        
        $this->db->delete('tbl_rs_archivos',$data); 
    }
    
    //archivos examen fisico
    public function ingresar_archivo_ef($data){
        
        $this->db->insert('tbl_efg_archivos',$data);
        //return $this->db->insert_id();
        return true;
    }
    
    public function archivos_ef($token_ef){
        
        $this->db->select("a.id_efg_archivo,a.id_consulta,a.titulo,
                           a.descripcion,a.archivo,a.fecha_ing,a.ingresado_por,
                           a.fecha_mod,a.modificado_por,a.token");
        $this->db->from('tbl_efg_archivos a');
        $this->db->where('a.token',$token_ef);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result_array() as $row){
                
                //Crear arreglo con los archivos
                $archivos_rs[] = "archivos_/".$row["archivo"];
            }
            
        }else{
             
            $archivos_rs = array();
        }
         
         return $archivos_rs;
    }
    
    public function eliminar_archivo_ef($data){
        
        $this->db->delete('tbl_efg_archivos',$data); 
    }
}	