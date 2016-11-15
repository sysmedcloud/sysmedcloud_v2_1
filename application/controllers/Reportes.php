<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        $this->load->model('gestion_model', 'gestion');
        $this->load->model('paciente_model', 'paciente');
        $this->load->model('consulta_model', 'consulta');
        $this->load->model('reportes_model', 'reportes');

        //Cargamos todas las librerias que utilizaremos
         $this->load->library(array(
            'form_validation',  //funciones para los formularios
            'session',          //iniciar session
            'fileclass',        //control css y js para cada pagina
            'general_sessions', //Validar datos de session
            'data_empresa',     //informacion de la empresa
            'gestion_view',     //controlar vistas
            'templates',        //libreria de plantillas
            'pdf'));            //Libreria PDF
            
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url','form','html','funciones_system'));
    }
    
    public function index()
    {
        $this->reportes();
    }
    
    /**************************************************************************/
    /** @Function que permite retornar pagina de inicio
    /**************************************************************************/
    public function reportes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_reportes();
        $data["menu"]   = "Reportes";
        $data["active"]     = activeMenu("reportes");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("reportes_view",$data);
    }

     /**************************************************************************/
    /** @Functions que permiten generar PDF's con reportes
    /**************************************************************************/

    public function reporte_general(){

        // Carga de datos
        $titulo = '';
        $tipo_reporte = $this->uri->segment(3);
        $rut_paciente = $this->uri->segment(4);
        switch ($tipo_reporte) {
                    case '1':
                        $titulo     = 'Alergias';
                        $data_meds  = $this->gestion->get_alergias();
                        $tmp_meds   = $this->templates->tmp_reporte_alergias($data_meds);
                        break;
                    case '2':
                        $titulo     = 'Patologías';
                        $data_meds  = $this->gestion->get_patologias();
                        $tmp_meds   = $this->templates->tmp_reporte_patologias($data_meds);
                        break;
                    case '3':
                        $titulo     = 'Medicamentos';
                        $data_meds  = $this->gestion->get_medicamentos();
                        $tmp_meds   = $this->templates->tmp_reporte_medicamentos($data_meds);
                        break;
                    case '4':
                        $titulo     = 'Diagnóasticos';
                        $data_meds  = $this->gestion->get_diagnosticos();
                        $tmp_meds   = $this->templates->tmp_reporte_diagnosticos($data_meds);
                        break;
                    case '5':
                        $titulo     = 'Pacientes';                        
                        $data_meds  = $this->paciente->listado_pacientes();                                                                     
                        $tmp_meds   = $this->templates->tmp_reporte_pacientes($data_meds);
                        break; 
                    case '6':
                        $titulo     = 'Consultas Médicas';                        
                        $data_meds  = $this->consulta->listado_consultas();                                                                                        
                        $tmp_meds   = $this->templates->tmp_reporte_consultas($data_meds);
                        break;                                       
                    case '7':
                        $titulo     = 'Historia Clinica Electónica';
                        $data_med   = $this->reportes->consolidado_datos_paciente($rut_paciente);                         
                        $tmp_meds   = $this->templates->tmp_reporte_ficha_clinica($data_med[0]);                        
                    break;
                    case '8':
                        $titulo     = 'Consulta Médica Paciente';
                        $data_med   = $this->reportes->consolidado_datos_paciente($rut_paciente);                         
                        $tmp_meds   = $this->templates->tmp_reporte_ficha_clinica($data_med[0]);
                    break; 
                }  


        // Generacion de PDF
        $pdf = new Pdf('P', 'cm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sysmedcloud');
        $pdf->SetTitle('Reporte de ' . $titulo);
        $pdf->SetSubject('');
        $pdf->SetKeywords('');
        $pdf->SetHeaderData('logo.png', PDF_HEADER_LOGO_WIDTH+20, '', $titulo, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
        $pdf->setFontSubsetting(true); 
        $pdf->SetFont('times', '', 8, '', true);
        $pdf->AddPage();
        $pdf->writeHTML($tmp_meds, true, 0, true, 0); 
        $nombre_archivo = utf8_decode("reporte-".strtolower($titulo)."-".date("d")."_".date("m")."_".date("Y").".pdf");        
        $pdf->Output($nombre_archivo, 'I');   
    }

}
