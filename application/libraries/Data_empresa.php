<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/*
 *
 *   LIBRERIA data empresa: PERMITE retornar informacion de la empresa
 *   version 1.0
*/
class Data_empresa {
    
    private $_CI;
    
    function Data_empresa()
    {   
        $this->_CI =& get_instance();
        $this->_CI->load->library('session');
    }
    
    /******************************************************************/
    /** @Funtion que permite retornar los datos de una empresa
    /******************************************************************/
    function info_empresa()
    {
        //$this->_CI =& get_instance();
        //con esta línea cargamos la base de datos prueba
        //y la asignamos a $db_prueba
        $DB  = $this->_CI->load->database($this->_CI->session->userdata('db_name'),TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
        $query = $DB->query("SELECT * FROM tbl_empresa");
        
        if ($query->num_rows() > 0)
        {
            return $query->row();
            
        } else{
            
            redirect(base_url()."login_app/accion/logout");
        }
    }
}

/* End of file Files.php */ 