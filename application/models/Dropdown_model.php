<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*******************************************************************************
* 
* MODELO QUE PERMITE RETORNAR INFORMACION NECESARIA PARA CREAR 
* SELECT (DROPDOWN) UTILIZADAS EN LAS VISTAS DEL SISTEMA
* ADEMAS TIENES FUNCIONES QUE SON UTLIZADAS EN ALGUNAS SENTECIAS AJAX
* 
*******************************************************************************/
class dropdown_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }	
    
    /***************************************************************************
    * @Funcion que permite retornar todos los paises #@dropdown paises@# 
    ***************************************************************************/
    function cargarPaises(){
        
        //creamos array para los paises
        $data = array();
        //valor por defecto del select instituciones
        $data['']='Seleccione un país';
        //cargamos todas los paises
        $this->db->select('p.cod_pais,p.nombre');
        $this->db->from('tbl_paises p');
        $this->db->order_by("p.nombre", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->cod_pais] = ucwords(mb_strtolower($row->nombre,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las regiones #@dropdown regiones@# 
    ***************************************************************************/
    function cargarRegiones(){
        
        //creamos array para los paises
        $data = array();
        //valor por defecto del select instituciones
        $data['']='Seleccione una región';
        //cargamos todas las regiones
        $this->db->select('r.REGION_ID,r.REGION_NOMBRE');
        $this->db->from('tbl_region r');
        $this->db->order_by("r.REGION_NOMBRE", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->REGION_ID] = ucwords(mb_strtolower($row->REGION_NOMBRE,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las provincias #@dropdown provincias@# 
    ***************************************************************************/
    function cargarProvincias(){
        
        //creamos array para los paises
        $data = array();
        //valor por defecto del select provincias
        $data['']='Seleccione una provincia';
        //cargamos todas las provincias
        $this->db->select('p.PROVINCIA_ID,p.PROVINCIA_NOMBRE');
        $this->db->from('tbl_provincia p');
        $this->db->order_by("p.PROVINCIA_NOMBRE", "asc");
        
        foreach($this->db->get()->result() as $row){
            //agregamos datos a nuestro array
            $data[$row->PROVINCIA_ID] = ucwords(mb_strtolower($row->PROVINCIA_NOMBRE,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las comunas #@dropdown comunas@# 
    ***************************************************************************/
    function cargarComunas(){
        
        //creamos array para las comunas
        $data = array();
        //valor por defecto del select comunas
        $data['']='Seleccione una comuna';
        //cargamos todas las provincias
        $this->db->select('c.COMUNA_ID,c.COMUNA_NOMBRE');
        $this->db->from('tbl_comuna c');
        $this->db->order_by("c.COMUNA_NOMBRE", "asc");
        
        foreach($this->db->get()->result() as $row){
            //agregamos datos a nuestro array
            $data[$row->COMUNA_ID] = ucwords(mb_strtolower($row->COMUNA_NOMBRE,'utf-8'));  
        }       
        return $data;
    }
    
    
    //Otras funcionalidades
    public function provincias($provincia){
        
        $this->db->where('PROVINCIA_REGION_ID',$provincia);
        $this->db->order_by('PROVINCIA_NOMBRE','asc');
        $comunas = $this->db->get('tbl_provincia');
        
        if($comunas->num_rows()>0)
        {
            return $comunas->result();
        }
    }
    
    public function comunas($provincia){
        
        $this->db->where('COMUNA_PROVINCIA_ID',$provincia);
        $this->db->order_by('COMUNA_NOMBRE','asc');
        $comunas = $this->db->get('tbl_comuna');
        
        if($comunas->num_rows()>0)
        {
            return $comunas->result();
        }
    }
    
    
    /***************************************************************************
    * @Funcion que permite retornar todos las proviciones medicas 
    ***************************************************************************/
    function cargarPrevisiones(){
        
        //creamos array para las previsiones medicas
        $data = array();
        //valor por defecto del select previsiones medicas
        $data['']='Seleccione una previsión';
        //cargamos todas las previsiones medicas
        $this->db->select('pm.id_prevision_medica,pm.prevision_medica');
        $this->db->from('tbl_previsiones_medicas pm');
        $this->db->order_by("pm.prevision_medica", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_prevision_medica] = ucwords(mb_strtolower($row->prevision_medica,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los parentescos familiares
    ***************************************************************************/
    function cargarParentescos(){
        
        //creamos array para las previsiones medicas
        $data = array();
        //valor por defecto del select previsiones medicas
        $data['']='Seleccione un parentesco';
        //cargamos todas las previsiones medicas
        $this->db->select('p.id_parentesco,p.parentesco');
        $this->db->from('tbl_parentescos p');
        $this->db->order_by("p.id_parentesco", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_parentesco] = ucwords(mb_strtolower($row->parentesco,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los estados civiles
    ***************************************************************************/
    function cargarEstCivil(){
        
        //creamos array para los estados civiles
        $data = array();
        //valor por defecto del select estado civiles
        $data['']='Seleccione una estado civil';
        //cargamos todas las previsiones medicas
        $this->db->select('e.id_estado_civil,e.estado_civil');
        $this->db->from('tbl_estado_civil e');
        $this->db->order_by("e.estado_civil", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_estado_civil] = ucwords(mb_strtolower($row->estado_civil,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las ocupaciones
    ***************************************************************************/
    function cargarOcupaciones(){
        
        //creamos array para los estados civiles
        $data = array();
        //valor por defecto del select estado civiles
        $data['']='Seleccione una ocupación';
        //cargamos todas las previsiones medicas
        $this->db->select('o.cod_ocupacion,o.descripcion');
        $this->db->from('tbl_ocupaciones o');
        $this->db->order_by("o.descripcion", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->cod_ocupacion] = ucfirst(mb_strtolower($row->descripcion,'utf-8'));
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los niveles de estudios
    ***************************************************************************/
    function cargarNivelesEst(){
        
        //creamos array para los niveles de estudios
        $data = array();
        //valor por defecto del select niveles de estudios
        $data['']='Seleccione nivel de estudio';
        //cargamos todas los niveles de estudios
        $this->db->select('id_nivel_estudio,nivel_estudio');
        $this->db->from('tbl_niveles_estudios');
        $this->db->order_by("id_nivel_estudio", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_nivel_estudio] = ucwords(mb_strtolower($row->nivel_estudio,'utf-8')); 
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las religiones
    ***************************************************************************/
    function cargarReligiones(){
        
        //creamos array para las religiones
        $data = array();
        //valor por defecto del select religiones
        $data['']='Seleccione Religión';
        //cargamos todas las religiones
        $this->db->select('id_religion,religion');
        $this->db->from('tbl_religiones');
        $this->db->order_by("id_religion", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_religion] = ucwords(mb_strtolower($row->religion,'utf-8')); 
        }       
        return $data;
    }
    /***************************************************************************
    * @Funcion que permite retornar todos los grupos sanguineos
    ***************************************************************************/
    function cargarGrSanguineos(){
        
        //creamos array para los gr. sanguineos
        $data = array();
        //valor por defecto del select grupos sanguineos
        $data['']='Seleccione Grupo Sanguíneo';
        //cargamos todas las religiones
        $this->db->select('id_grupo_sanguineo,grupo_sanguineo');
        $this->db->from('tbl_grupos_sanguineos');
        $this->db->order_by("id_grupo_sanguineo", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_grupo_sanguineo] = strtoupper(mb_strtolower($row->grupo_sanguineo,'utf-8')); 
        }       
        return $data;
    }
    /***************************************************************************
    * @Funcion que permite retornar todos los factores RH
    ***************************************************************************/
    function cargarFactoresRH(){
        
        //creamos array para los gr. sanguineos
        $data = array();
        //valor por defecto del select grupos sanguineos
        $data['']='Seleccione Factor RH';
        //cargamos todas las religiones
        $this->db->select('id_factor_rh,factor_rh');
        $this->db->from('tbl_factores_rh');
        $this->db->order_by("factor_rh", "asc");
        
        foreach($this->db->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_factor_rh] = ucfirst(mb_strtolower($row->factor_rh,'utf-8')); 
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los estados de citas medicas
    ***************************************************************************/
    function cargarEstadosCitasMed($id_estado){
        
        //cargamos todas los estados medicos
        $this->db->select('id_estado_cita_medica,estado,color');
        $this->db->from('tbl_estados_citas_medicas');
        $this->db->order_by("id_estado_cita_medica","asc");
        $option = "";
        
        foreach ($this->db->get()->result() as $row){
            
            if($row->id_estado_cita_medica == $id_estado){
                $option .= "<option selected='selected' value='".$row->id_estado_cita_medica."' style='background-color:".$row->color.";color:#000;font-weight:bold;' >&nbsp;&nbsp;".ucfirst(mb_strtolower($row->estado,'utf-8'))."</option>"; 
            }else{
                $option .= "<option value='".$row->id_estado_cita_medica."' style='background-color:".$row->color.";color:#000;font-weight:bold;' >&nbsp;&nbsp;".ucfirst(mb_strtolower($row->estado,'utf-8'))."</option>";
            }
        }
                            
        return $option;
            
    }
}	