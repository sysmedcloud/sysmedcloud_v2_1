<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/*
 *
 *   LIBRERIA FILECLASS: PERMITE CONTROLAR LOS ARCHIVOS CSS Y JS DE LAS PAGINAS
 *   version 1.0
 *   autor: Cristian Vidal
 *   Fechal ULt. Act: 29-06-2015
*/
class Fileclass {
    
    var $files = array();
    
    function Fileclass()
    {   
        $this->CI =& get_instance();  
        $this->CI->load->helper('url');
    }
    
    //FUNCION QUE PERMITE RETORNAR LOS ARCHIVOS CSS Y JS UTILIZADOS 
    //EN LA PAGINA LOGIN
    function files_login(){
        
        $this->files['style'] = array(

            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/animate.css',
            '3' => base_url().'css/style.css'
        );
        
        //Archivos js template login
        $this->files['script'] = array(

            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js'
        );

        return $this->files;
    }
    
    public function files_listado_consultas_med(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/plugins/dataTables/dataTables.bootstrap.css',
            '3' => base_url().'css/plugins/dataTables/dataTables.responsive.css',
            '4' => base_url().'css/plugins/dataTables/dataTables.tableTools.min.css',
            '5' => base_url().'css/animate.css',
            '6' => base_url().'css/style.css',
            '7' => base_url().'css/button_data_table.css',
            '8' => base_url().'css/sweetalert.css',
        );
        
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js',
            '2' => base_url().'js/jquery.metisMenu.js',
            '3' => base_url().'js/jquery.slimscroll.min.js',
            '4' => base_url().'js/jquery.dataTables.js',
            '5' => base_url().'js/dataTables.bootstrap.js',
            '6' => base_url().'js/dataTables.responsive.js',
            '7' => base_url().'js/dataTables.tableTools.min.js',
            '8' => base_url().'js/inspinia.js',
            '9' => base_url().'js/pace.min.js',
            '10' => base_url().'js/sweetalert.min.js',
            '11' => base_url().'js/consulta_medica.js',
        );
        
        return $this->files;
        
    }


    //FUNCION QUE PERMITE RETORNAR LOS ARCHIVOS CSS Y JS UTILIZADOS 
    //EN LA PAGINA DASHBOARD
    function files_dashboard(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/plugins/dataTables/dataTables.bootstrap.css',
            '3' => base_url().'css/plugins/dataTables/dataTables.responsive.css',
            '4' => base_url().'css/plugins/dataTables/dataTables.tableTools.min.css',
            '5' => base_url().'css/animate.css',
            '6'=> base_url().'css/style.css'
        );
        
        //Archivos js template login
        $this->files['script'] = array(
            
            '0'     => base_url().'js/jquery-2.1.1.js',
            '1'     => base_url().'js/bootstrap.min.js',
            '2'     => base_url().'js/jquery.metisMenu.js',
            '3'     => base_url().'js/jquery.slimscroll.min.js',
            '4'     => base_url().'js/inspinia.js',
            '5'     => base_url().'js/pace.min.js',
            '6'     => base_url().'js/jquery.dataTables.js',
            '7'     => base_url().'js/dataTables.bootstrap.js',
            '8'     => base_url().'js/dataTables.responsive.js',
            //'6'     => base_url().'js/plugins/flot/jquery.flot.js',
            //'7'     => base_url().'js/plugins/flot/jquery.flot.tooltip.min.js',
            //'8'     => base_url().'js/plugins/flot/jquery.flot.resize.js',
            //'9'     => base_url().'js/plugins/flot/jquery.flot.pie.js',
            //'10'    => base_url().'js/plugins/flot/jquery.flot.time.js',
            //'6'    => base_url().'js/flot-demo.js',
            '9'     => base_url().'js/dashboard.js',
            '10'    => base_url().'js/highcharts_dashboard.js',
            '11'    => base_url().'js/data.js',
            '12'    => base_url().'js/exporting.js',
            //'12'    => base_url().'js/plugins/chartJs/Chart.min.js',
            //'13'    => base_url().'js/chartjs-demo.js'
        );

        return $this->files;
    }
    
    //ARCHIVOS NECESARIOS PARA VISTA AGENDA CALENDARIO
    function files_agenda(){
        
        $this->files['style'] = array();
        
        //Archivos js template login
        $this->files['script'] = array(
            
        );

        return $this->files;
    }
    
    //FUNCION QUE PERMITE RETORNAR LOS ARCHIVOS CSS Y JS UTILIZADOS EN LA PAGINA MI PERFIL
       function files_miperfil(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/plugins/iCheck/custom.css',
            '3' => base_url().'css/animate.css',
            '4' => base_url().'css/style.css',
            '5' => base_url().'css/upload.css',
            '6' => base_url().'css/sweetalert.css'
        );
        
        //Archivos js template login
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js',
            '2' => base_url().'js/jquery.metisMenu.js',
            '3' => base_url().'js/jquery.slimscroll.min.js',
            '4' => base_url().'js/inspinia.js',
            '5' => base_url().'js/pace.min.js',
            '6' => base_url().'js/icheck.min.js',
            '7' => base_url().'js/mi_perfil.js',
            '8' => base_url().'js/jasny-bootstrap.min.js',
            '9' => base_url().'js/mi_perfil_selects.js',
            '10' => base_url().'js/jquery.ajaxfileupload.js',
            '11' => base_url().'js/sweetalert.min.js',
            '12' => base_url().'js/validador_rut.js',
        );
        
        return $this->files;
    }
    
    function files_crearpacientes(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/plugins/iCheck/custom.css',
            '3' => base_url().'css/animate.css',
            '4' => base_url().'css/style.css',
            '5' => base_url().'css/sweetalert.css'
        );
        
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js',
            '2' => base_url().'js/jquery.metisMenu.js',
            '3' => base_url().'js/jquery.slimscroll.min.js',
            '4' => base_url().'js/inspinia.js',
            '5' => base_url().'js/pace.min.js',
            '6'=> base_url().'js/icheck.min.js',
            '7'=> base_url().'js/mi_perfil.js',
            '8'=> base_url().'js/jasny-bootstrap.min.js',
            '9' => base_url().'js/sweetalert.min.js',
            '10'=> base_url().'js/mi_perfil_selects.js',
            '11'=> base_url().'js/validador_rut.js',
        );
        
        return $this->files;
    }
    
    function files_tbl(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/plugins/dataTables/dataTables.bootstrap.css',
            '3' => base_url().'css/plugins/dataTables/dataTables.responsive.css',
            '4' => base_url().'css/plugins/dataTables/dataTables.tableTools.min.css',
            '5' => base_url().'css/animate.css',
            '6' => base_url().'css/style.css',
            '7' => base_url().'css/button_data_table.css',
            '8' => base_url().'css/sweetalert.css',
        );
        
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js',
            '2' => base_url().'js/jquery.metisMenu.js',
            '3' => base_url().'js/jquery.slimscroll.min.js',
            '4' => base_url().'js/jquery.dataTables.js',
            '5' => base_url().'js/dataTables.bootstrap.js',
            '6' => base_url().'js/dataTables.responsive.js',
            '7' => base_url().'js/dataTables.tableTools.min.js',
            '8' => base_url().'js/inspinia.js',
            '9' => base_url().'js/pace.min.js',
            '10' => base_url().'js/datatable_pacientes.js',
            '11' => base_url().'js/sweetalert.min.js',
        );
        
        return $this->files;
    }
    
    public function nueva_consulta(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/fileinput.css',
            '3' => base_url().'css/plugins/iCheck/custom.css',
            '4' => base_url().'css/animate.css',
            '5' => base_url().'css/style.css',
            '6' => base_url().'css/sweetalert.css',
        );
        
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            //'1' => base_url().'js/fileinput.js',
            //'2' => base_url().'js/locales/es.js',
            '2' => base_url().'js/bootstrap.min.js',
            '3' => base_url().'js/jquery.metisMenu.js',
            '4' => base_url().'js/jquery.slimscroll.min.js',
            '5' => base_url().'js/inspinia.js',
            '6' => base_url().'js/pace.min.js',
            '7'=> base_url().'js/icheck.min.js',
            '8'=> base_url().'js/jasny-bootstrap.min.js',
            '9'=> base_url().'js/consulta_medica.js',
            '10' => base_url().'js/sweetalert.min.js',
        );
        
        return $this->files;
    }
    
    
    public function nueva_consulta_v2(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/fileinput.css'
        );
        
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/fileinput.js',
            '2' => base_url().'js/locales/es.js',
            '3' => base_url().'js/bootstrap.min.js'
        );
        
        return $this->files;
    }
    
    public function files_ficha_clinica(){
        
        $this->files['style'] = array(
            
            '0'     => base_url().'css/bootstrap.min.css',
            '1'     => base_url().'font-awesome/css/font-awesome.css',
            '2'     => base_url().'css/plugins/iCheck/custom.css',
            '3'     => base_url().'css/plugins/dataTables/dataTables.bootstrap.css',
            '4'     => base_url().'css/plugins/dataTables/dataTables.responsive.css',
            '5'     => base_url().'css/plugins/dataTables/dataTables.tableTools.min.css',
            '6'     => base_url().'css/animate.css',
            '7'     => base_url().'css/style.css',
            '8'     => base_url().'css/sweetalert.css',
        );
        
        $this->files['script'] = array(
            
            '0'     => base_url().'js/jquery-2.1.1.js',
            '1'     => base_url().'js/bootstrap.min.js',
            '2'     => base_url().'js/jquery.metisMenu.js',
            '3'     => base_url().'js/jquery.slimscroll.min.js',
            '4'     => base_url().'js/inspinia.js',
            '5'     => base_url().'js/pace.min.js',
            '6'     => base_url().'js/icheck.min.js',
            '7'     => base_url().'js/jasny-bootstrap.min.js',
            '8'     => base_url().'js/jquery.dataTables.js',
            '9'     => base_url().'js/dataTables.bootstrap.js',
            '10'    => base_url().'js/dataTables.responsive.js',
            '11'    => base_url().'js/dataTables.tableTools.min.js',
            '12'    => base_url().'js/ficha_clinica.js',
            '13'    => base_url().'js/sweetalert.min.js',
        );
        
        return $this->files;
    }

    function files_gestion(){
        
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/animate.css',
            '3' => base_url().'css/style.css',
            '4' => base_url().'css/sweetalert.css'
        );
        
    
        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js',
            '2' => base_url().'js/jquery.metisMenu.js',
            '3' => base_url().'js/jquery.slimscroll.min.js',
            '4' => base_url().'js/inspinia.js',
            '5' => base_url().'js/pace.min.js',
            '5' => base_url().'js/gestion_datos.js',
            '6'=> base_url().'js/sweetalert.min.js',
            '7'=> base_url().'js/highcharts.js',

        );

        return $this->files;
    }

    function files_reportes(){
        $this->files['style'] = array(
            
            '0' => base_url().'css/bootstrap.min.css',
            '1' => base_url().'font-awesome/css/font-awesome.css',
            '2' => base_url().'css/animate.css',
            '3' => base_url().'css/style.css',
            '4' => base_url().'css/sweetalert.css',
            '5' => base_url().'css/plugins/iCheck/custom.css',
            '6' => base_url().'css/plugins/steps/jquery.steps.css'
            
        );
        

        $this->files['script'] = array(
            
            '0' => base_url().'js/jquery-2.1.1.js',
            '1' => base_url().'js/bootstrap.min.js',
            '2' => base_url().'js/jquery.metisMenu.js',
            '3' => base_url().'js/jquery.slimscroll.min.js',
            '4' => base_url().'js/inspinia.js',
            '5' => base_url().'js/sweetalert.min.js',            
            '6' => base_url().'js/pace.min.js',            
            '7' => base_url().'js/jquery.steps.min.js',
            '8' => base_url().'js/plugins/validate/jquery.validate.min.js',
            '9' => base_url().'js/gestion_reportes.js',
            '10' => base_url().'js/jquery.Rut.min.js'
            

        );

        return $this->files;
    }
}

/* End of file Files.php */ 