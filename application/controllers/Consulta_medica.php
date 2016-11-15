<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_medica extends CI_Controller {
    
    /**************************************************************************/
    /** CONSTRUCTOR DE LA CLASE
    /**************************************************************************/
    public function __construct() {
        
        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('consulta_model');
        $this->load->model('dropdown_model');
        
        //Cargamos todas las librerias utilizadas en es CI
        $this->load->library(array(
            'form_validation',  //funciones para los formularios
            'session',          //iniciar session
            'fileclass',        //control css y js para cada pagina
            'general_sessions', //Validar datos de session
            'data_empresa',     //informacion de la empresa
            'gestion_view'));   //controlar vistas
        
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html','funciones_system'));
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE VISUALIZAR CONSULTAS MEDICAS REALIZADAS
    /**************************************************************************/
    public function index(){
        
        $this->listado_consultas_medicas();
    }
    
    public function listado_consultas_medicas(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_listado_consultas_med();
        
        $data["menu"]   = "Consultas Médicas";
        
        $data["active"]     = activeMenu("consulta");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("listado_consultas_medicas_view",$data);
    }
    
    /******************************************************************/
    /** @Function...
    /******************************************************************/
    public function consultas_med_json(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //Cargamos las variables de session (LIBRERIA)
        $this->general_sessions->datosDeSession(); 
        
        echo $this->consulta_model->listado_consultas_medicas($data["session"]["id_usuario"]);
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE CREAR UNA CONSULTA MEDICA
    /**************************************************************************/
    public function nueva_consulta($id_paciente = "",$id_cita_med = ""){
        
        $this->load->model('paciente_model');
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->nueva_consulta();
        
        $data["menu"]   = "Nueva Consulta Médica";
        
        $data["active"]     = activeMenu("consulta");//(HELPERS)marca menu (active)
                
        $paciente = $this->paciente_model->info_basica($id_paciente);
        
        //Obtenemos datos basicos del paciente utilizados en la vista
        $data["id_paciente"]    = $id_paciente;
        $data["id_cita_medica"] = $id_cita_med;
        $data["rut"]            = $paciente["rut"];  
        $data["nombre"]         = $paciente["nombre"];  
        $data["fecha_nac"]      = $paciente["fecha_nac"];  
        $data["nacionalidad"]   = $paciente["nacionalidad"];  
        $data["estado_civil"]   = $paciente["estado_civil"];  
        $data["imagen"]         = $paciente["imagen"] != "" ? $paciente["imagen"] : "sin-foto.png";
        
        
        //Creamos token para archivos rev. sistema
        $data["token_rs"] = $this->token();
        
        $data["token_ef"] = $this->token();
        
        $data["archivos_rs"] = $this->consulta_model->archivos_rs($data["token_rs"]);//Buscamos archivos segun token
        
        $data["archivos_ef"] = $this->consulta_model->archivos_ef($data["token_ef"]);//Buscamos archivos segun token
        //
        //echo "<pre>";print_r($data["archivos"]);exit();
        /*$directory = "archivos_/";      
        $data["archivos"] = glob($directory . "*.*");*/
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminViewConsultaMed("nueva_consulta_med_view",$data);
    }
    
    
    /********************************************************************************************
    * @Funcion que me permite crear un token para la subida de imagenes
    *******************************************************************************************/
    function token() {   		
         srand (time());
        //generamos un número aleatorio
         $numero_aleatorio = rand(1,10000000); 
         return $numero_aleatorio;
    }
    
    public function test(){
            
        $data['files'] = $this->fileclass->nueva_consulta_v2();
        
        $this->load->view('admin/test.php',$data);
        
    }
    
    public function recibirDatos(){
        
        //Cargamos las variables de session (LIBRERIA)
        $session    =   $this->general_sessions->datosDeSession(); 
        
        //Datos POST formulario
        $this->form_validation->set_rules('id_paciente','paciente','required|trim');
        $this->form_validation->set_rules('motivo','motivo de la consulta','required|trim');
        $this->form_validation->set_rules('anamnesis','anamnesis próxima','required|trim');
        $this->form_validation->set_rules('diagnostico','diagnóstico','required|trim');
        $this->form_validation->set_rules('tratamiento','tratamiento','required|trim');
        
        //Validar datos del formulario
        if($this->form_validation->run() == FALSE) {
            
            $id_paciente    = $this->input->post("id_paciente");
            $id_cita_med    = $this->input->post("id_cita_med");    
            
            //Muestra los errores en la vista
            $this->nueva_consulta($id_paciente,$id_cita_med);
                
         } else {
             
            $id_paciente    = $this->input->post('id_paciente'); 
            $id_cita_med    = $this->input->post("id_cita_med");
            
            //Obetenmos los token para realacionar los archivos con la consulta
            $token_rs       = $this->input->post("token_rs");
            $token_ef       = $this->input->post("token_ef");
            
            //INGRESAMOS INFORMACION CONSULTA MEDICA
            $data_consulta                  = $this->data_consulta();
            $data_consulta['ingresado_por'] = $session['id_usuario'];
            $data_consulta['id_paciente']   = $id_paciente;
            
            $id_consulta_med = $this->consulta_model->add_consulta_med($data_consulta,$id_cita_med);
            
            if($id_consulta_med > 0){//datos ingresados correctamente
                
                //DATOS REFERENTES A LA REVISION POR SISTEMA
                $rv_sistema = $this->revision_por_sistema();
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS GENERALES
                $rv_sistema[0]['id_consulta']   = $id_consulta_med;
                $rv_sistema[0]['id_paciente']   = $id_paciente;
                $rv_sistema[0]['ingresado_por'] = $session['id_usuario'];                      
                $this->consulta_model->add_rev_sint_generales($rv_sistema[0]);
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS RESPIRATORIOS
                $rv_sistema[1]['id_consulta']   = $id_consulta_med;
                $rv_sistema[1]['id_paciente']   = $id_paciente;
                $rv_sistema[1]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_rev_sint_resp($rv_sistema[1]);
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS CARDIOVASCULARES
                $rv_sistema[2]['id_consulta']   = $id_consulta_med;
                $rv_sistema[2]['id_paciente']   = $id_paciente;
                $rv_sistema[2]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_rev_sint_cardio($rv_sistema[2]);
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS GASTROINSTESTINALES
                $rv_sistema[3]['id_consulta']   = $id_consulta_med;
                $rv_sistema[3]['id_paciente']   = $id_paciente;
                $rv_sistema[3]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_rev_sint_gastro($rv_sistema[3]);
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS GENITOURINARIOS
                $rv_sistema[4]['id_consulta']   = $id_consulta_med;
                $rv_sistema[4]['id_paciente']   = $id_paciente;
                $rv_sistema[4]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_rev_sint_geni($rv_sistema[4]);
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS NEUROLOGICOS
                $rv_sistema[5]['id_consulta']   = $id_consulta_med;
                $rv_sistema[5]['id_paciente']   = $id_paciente;
                $rv_sistema[5]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_rev_sint_neuro($rv_sistema[5]);
                //INGRESAR DATOS REV. POR SISTEMA, SINTOMAS ENDOCRINOS
                $rv_sistema[6]['id_consulta']   = $id_consulta_med;
                $rv_sistema[6]['id_paciente']   = $id_paciente;
                $rv_sistema[6]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_rev_sint_endo($rv_sistema[6]);
                //GUARDAR ARCHIVOS REVISION POR SISTEMA
                $this->consulta_model->add_rev_sint_files($id_consulta_med,$token_rs);
                
                //DATOS REFERENTES AL EXAMEN FISICO
                $examen_fisico = $this->examen_fisico(); 
                //INGRESAR DATOS EXAMEN FISICO / DECUBITO
                $examen_fisico[0]['id_consulta']   = $id_consulta_med;
                $examen_fisico[0]['id_paciente']   = $id_paciente;
                $examen_fisico[0]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_decubito($examen_fisico[0]);
                //INGRESAR DATOS EXAMEN FISICO / DEAMBULACION
                $examen_fisico[1]['id_consulta']   = $id_consulta_med;
                $examen_fisico[1]['id_paciente']   = $id_paciente;
                $examen_fisico[1]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_deambulacion($examen_fisico[1]);
                //INGRESAR DATOS EXAMEN FISICO / FACIE
                $examen_fisico[2]['id_consulta']   = $id_consulta_med;
                $examen_fisico[2]['id_paciente']   = $id_paciente;
                $examen_fisico[2]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_facie($examen_fisico[2]);
                //INGRESAR DATOS EXAMEN FISICO / CONCIENCIA
                $examen_fisico[3]['id_consulta']   = $id_consulta_med;
                $examen_fisico[3]['id_paciente']   = $id_paciente;
                $examen_fisico[3]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_conciencia($examen_fisico[3]);
                //INGRESAR DATOS EXAMEN FISICO / PIEL
                $examen_fisico[4]['id_consulta']   = $id_consulta_med;
                $examen_fisico[4]['id_paciente']   = $id_paciente;
                $examen_fisico[4]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_piel($examen_fisico[4]);
                //INGRESAR DATOS EXAMEN FISICO / S. LINFATICO
                $examen_fisico[5]['id_consulta']   = $id_consulta_med;
                $examen_fisico[5]['id_paciente']   = $id_paciente;
                $examen_fisico[5]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_s_linfatico($examen_fisico[5]);
                //INGRESAR DATOS EXAMEN FISICO / SIGNOS VITALES
                $examen_fisico[6]['id_consulta']   = $id_consulta_med;
                $examen_fisico[6]['id_paciente']   = $id_paciente;
                $examen_fisico[6]['ingresado_por'] = $session['id_usuario'];       
                $this->consulta_model->add_ex_signos_vitales($examen_fisico[6]);
                //GUARDAR ARCHIVOS EXAMEN FISICO
                $this->consulta_model->add_ex_f_files($id_consulta_med,$token_ef);
                
                if($id_consulta_med > 0){
                    
                    //$this->consultamed_succes($id_consulta_med);
                    redirect(base_url()."consulta_medica/consultamed_succes/".$id_consulta_med);
                    
                }else{
                    
                    echo "error al ingresar consulta medica";exit();
                    
                } 
                
            }else{//error al ingresar datos consulta medica
                
                echo "error al ingresar consulta medica";exit();
            }
        }       
    }
    
    /**************************************************************************/
    /** @Funcion que permite ---
    /**************************************************************************/
    public function consultamed_succes($id_consulta_medica){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->nueva_consulta();
        
        $data["menu"]       = "Nueva Consulta Médica";
        
        $data["active"]     = activeMenu("consulta");//(HELPERS)marca menu (active)
        
        $data["id_consulta_med"] = $id_consulta_medica;
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("consultamed_succes_view",$data);
    }
    
    //DATOS BASICOS CONSULTA MEDICA
    public function data_consulta(){
        
        $CONSULTA["motivo_consulta"]        = $this->input->post('motivo');
        $CONSULTA["anamnesis_proxima"]      = $this->input->post('anamnesis');
        $CONSULTA["hipotesis_diagnostica"]  = $this->input->post('diagnostico');
        $CONSULTA["tratamiento"]            = $this->input->post('tratamiento');
        $CONSULTA["observaciones"]          = $this->input->post('observaciones');
        
        return $CONSULTA;
    }
    
    //OBTENER TODOS LOS DATOS DEL FORMULARIO CORRESPONDIENTES A LA REVISION POR SISTEMA
    public function revision_por_sistema(){
        
        //Retornamos informacion de la revision por sistema
        return array(
            $this->rv_sintomas_generales(),
            $this->rv_sintomas_respiratorios(),
            $this->rv_sintomas_cardiovasculares(),
            $this->rv_sintomas_gastroinstestinales(),
            $this->rv_sintomas_genitourinarios(),
            $this->rv_sintomas_neurologicos(),
            $this->rv_sintomas_endocrinicos(),
            $this->rv_archivos_documentos()
        );
    }
    
    //REVISION POR SISTEMA / SINTOMAS GENERALES
    public function rv_sintomas_generales(){
        
        $RV_SG["fiebre"]                = $this->input->post('sg_fiebre')       !== null ? TRUE : FALSE;
        $RV_SG["transtornos_peso"]      = $this->input->post('sg_trans_peso')   !== null ? TRUE : FALSE;
        $RV_SG["malestar_general"]      = $this->input->post('sg_malestar_gen') !== null ? TRUE : FALSE;
        $RV_SG["problemas_apetito"]     = $this->input->post('sg_problemas_ape')!== null ? TRUE : FALSE;
        $RV_SG["sudoracion_nocturna"]   = $this->input->post('sg_sudoracion_n') !== null ? TRUE : FALSE;
        $RV_SG["insomnio"]              = $this->input->post('sg_insomnio')     !== null ? TRUE : FALSE;
        $RV_SG["angustia"]              = $this->input->post('sg_angustia')     !== null ? TRUE : FALSE;
        $RV_SG["otros_sintomas"]        = $this->input->post('sg_otros')        !== null ? TRUE : FALSE;
        $RV_SG["comentarios"]           = $this->input->post('sg_comentarios');
        
        return $RV_SG;
    }
    
    //REVISION POR SISTEMA / SINTOMAS RESPIRATORIOS
    public function rv_sintomas_respiratorios(){
        
        $RV_RESP["disnea"]                  = $this->input->post('resp_disnea')     !== null ? TRUE : FALSE;
        $RV_RESP["tos"]                     = $this->input->post('resp_tos')        !== null ? TRUE : FALSE;
        $RV_RESP["expectoracion"]           = $this->input->post('resp_exp')        !== null ? TRUE : FALSE;
        $RV_RESP["hemoptisis"]              = $this->input->post('resp_hemop')      !== null ? TRUE : FALSE;
        $RV_RESP["puntada_costado"]         = $this->input->post('resp_p_costado')  !== null ? TRUE : FALSE;
        $RV_RESP["obstruccion_bronquial"]   = $this->input->post('resp_obs_br')     !== null ? TRUE : FALSE;
        $RV_RESP["otros_sintomas"]          = $this->input->post('resp_otros')      !== null ? TRUE : FALSE;
        $RV_RESP["comentarios"]             = $this->input->post('resp_comentarios');
        
        return $RV_RESP;
    }
    
    //REVISION POR SISTEMA / SINTOMAS CARDIOVASCULARES
    public function rv_sintomas_cardiovasculares(){
        
        $RV_CARD["disnea_esfuerzo"]     = $this->input->post('card_dis_esf')        !== null ? TRUE : FALSE;
        $RV_CARD["ortopnea"]            = $this->input->post('card_ortopnea')       !== null ? TRUE : FALSE;
        $RV_CARD["disnea_paroxistica"]  = $this->input->post('card_dis_parox_noc')  !== null ? TRUE : FALSE;
        $RV_CARD["edema_ext_int"]       = $this->input->post('card_edema_ext_inf')  !== null ? TRUE : FALSE;
        $RV_CARD["dolor_precordial"]    = $this->input->post('card_dolor_preco')    !== null ? TRUE : FALSE;
        $RV_CARD["otros_sintomas"]      = $this->input->post('card_otros')          !== null ? TRUE : FALSE;        
        $RV_CARD["comentarios"]         = $this->input->post('card_comentarios');
        
        return $RV_CARD;
    }
    
    //REVISION POR SISTEMA / SINTOMAS GASTROINSTESTINALES
    public function rv_sintomas_gastroinstestinales(){
        
        $RV_GAST["problemas_apetito"]          = $this->input->post('gast_p_ape')          !== null ? TRUE : FALSE;
        $RV_GAST["nausas"]         = $this->input->post('gast_nausas')         !== null ? TRUE : FALSE;
        $RV_GAST["vomitos"]        = $this->input->post('gast_vomitos')        !== null ? TRUE : FALSE;
        $RV_GAST["disfagia"]       = $this->input->post('gast_disfagia')       !== null ? TRUE : FALSE;
        $RV_GAST["pirosis"]        = $this->input->post('gast_pirosis')        !== null ? TRUE : FALSE;
        $RV_GAST["diarrea"]        = $this->input->post('gast_diarrea')        !== null ? TRUE : FALSE; 
        $RV_GAST["constipacion"]   = $this->input->post('gast_constipacion')   !== null ? TRUE : FALSE; 
        $RV_GAST["melena"]         = $this->input->post('gast_melena')         !== null ? TRUE : FALSE;
        $RV_GAST["otros_sintomas"]          = $this->input->post('gast_otros')          !== null ? TRUE : FALSE;
        $RV_GAST["comentarios"]    = $this->input->post('gast_comentarios');
        
        return $RV_GAST;
    }
    
    //REVISION POR SISTEMA / SINTOMAS GENITOURINARIOS
    public function rv_sintomas_genitourinarios(){
        
        $RV_GENIT["disuria"]        = $this->input->post('geni_disuria')       !== null ? TRUE : FALSE;
        $RV_GENIT["polaquiuria"]    = $this->input->post('geni_polaquiuria')   !== null ? TRUE : FALSE;
        $RV_GENIT["poliuria"]       = $this->input->post('geni_poliuria')      !== null ? TRUE : FALSE;
        $RV_GENIT["nicturia"]       = $this->input->post('geni_nicturia')      !== null ? TRUE : FALSE;
        $RV_GENIT["chorro_urinario"]= $this->input->post('geni_alt_uri')       !== null ? TRUE : FALSE;
        $RV_GENIT["hematuria"]      = $this->input->post('geni_hematuria')     !== null ? TRUE : FALSE; 
        $RV_GENIT["fosas_lumbares"] = $this->input->post('geni_dolores_lum')   !== null ? TRUE : FALSE; 
        $RV_GENIT["otros_sintomas"] = $this->input->post('geni_otros')         !== null ? TRUE : FALSE;
        $RV_GENIT["comentarios"]    = $this->input->post('geni_comentarios');
        
        return $RV_GENIT;
    }
    
    //REVISION POR SISTEMA / SINTOMAS NEUROLOGICOS
    public function rv_sintomas_neurologicos(){
        
        $RV_NEURO["cafalea"]        = $this->input->post('neuro_cafalea')           !== null ? TRUE : FALSE;
        $RV_NEURO["mareos"]         = $this->input->post('neuro_mareos')            !== null ? TRUE : FALSE;
        $RV_NEURO["p_coordinacion"] = $this->input->post('neuro_problemas_coord')   !== null ? TRUE : FALSE;
        $RV_NEURO["paresias"]       = $this->input->post('neuro_paresias')          !== null ? TRUE : FALSE;
        $RV_NEURO["parestesias"]    = $this->input->post('neuro_parestesias')       !== null ? TRUE : FALSE;
        $RV_NEURO["otros_sintomas"] = $this->input->post('neuro_otros')             !== null ? TRUE : FALSE; 
        $RV_NEURO["comentarios"]    = $this->input->post('neuro_comentarios');
        
        return $RV_NEURO;
    }
    
    //REVISION POR SISTEMA / SINTOMAS ENDOCRINICOS
    public function rv_sintomas_endocrinicos(){
        
        $RV_ENDO["baja_peso"]           = $this->input->post('endo_b_peso')         !== null ? TRUE : FALSE;
        $RV_ENDO["intolerancia_frio"]   = $this->input->post('endo_into_frio')      !== null ? TRUE : FALSE;
        $RV_ENDO["intolerancia_calor"]  = $this->input->post('endo_into_calor')     !== null ? TRUE : FALSE;
        $RV_ENDO["temblor_fino"]        = $this->input->post('endo_temblor_fino')   !== null ? TRUE : FALSE;
        $RV_ENDO["polidefecacion"]      = $this->input->post('endo_polidefecacion') !== null ? TRUE : FALSE;
        $RV_ENDO["ronquera"]            = $this->input->post('endo_ronquera')       !== null ? TRUE : FALSE; 
        $RV_ENDO["somnolencia"]         = $this->input->post('endo_somnolencia')    !== null ? TRUE : FALSE; 
        $RV_ENDO["sequedad_piel"]       = $this->input->post('endo_sequedad_piel')  !== null ? TRUE : FALSE;
        $RV_ENDO["otros_sintomas"]      = $this->input->post('endo_otros')          !== null ? TRUE : FALSE;
        $RV_ENDO["comentarios"]         = $this->input->post('endo_comentarios');
        
        return $RV_ENDO;
    }
    
    //REVISION POR SISTEMA / ARCHIVOS Y DOCUMENTOS
    public function rv_archivos_documentos(){}
    
    //DATOS EXAMEN FISICO
    public function examen_fisico(){
        
        return array(
                    $this->decubito(),
                    $this->deambulacion(),
                    $this->facie(),
                    $this->conciencia(),
                    $this->piel(),
                    $this->s_linfatico(),
                    $this->signos_vitales(),
                    $this->archivos_documentos());
    }
    
    //DATOS EXAMEN FISICO DECUBITO
    public function decubito(){
        
        $EX_DECUBITO["descripcion_posicion"] = $this->input->post('d_posicion_pie');
        $EX_DECUBITO["descripcion_decubito"] = $this->input->post('d_posicion_decubito');
        
        return $EX_DECUBITO;
    }
    
    //DATOS EXAMEN FISICO DEAMBULACION
    public function deambulacion(){
        
        $EX_DEAMBULACION["deam_normal"]             = $this->input->post('deammbulación_normal')  !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_ataxica"]          = $this->input->post('marcha_ataxica')        !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_p_polineuritis"]   = $this->input->post('marcha_polineuritis')   !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_espastica"]        = $this->input->post('marcha_espastica')      !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_hemiplejico"]      = $this->input->post('marcha_hemiplejico')    !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_parkinsoniana"]    = $this->input->post('marcha_parkinsoniana')  !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["otros_trastornos"]        = $this->input->post('d_otros_trastornos')    !== null ? TRUE : FALSE;       
        $EX_DEAMBULACION["comentarios"]             = $this->input->post('d_comentarios');
        
        return $EX_DEAMBULACION;
    }
    
    //DATOS EXAMEN FISICO FACIE
    public function facie(){
        
        $EX_FACIE["facie_normal"]           = $this->input->post('facie_normal')            !== null ? TRUE : FALSE;
        $EX_FACIE["facie_acromegalica"]     = $this->input->post('facie_acromegalica')      !== null ? TRUE : FALSE;
        $EX_FACIE["facie_cushingoide"]      = $this->input->post('facie_cushingoide')       !== null ? TRUE : FALSE;
        $EX_FACIE["facie_hipertiroidea"]    = $this->input->post('facie_hipertiroídea')     !== null ? TRUE : FALSE;
        $EX_FACIE["facie_hipotiroidea"]     = $this->input->post('facie_hipotiroidea')      !== null ? TRUE : FALSE;
        $EX_FACIE["facie_hipocratica"]      = $this->input->post('facie_hipocratica')       !== null ? TRUE : FALSE;
        $EX_FACIE["facie_mongolica"]        = $this->input->post('facie_mongolica')         !== null ? TRUE : FALSE;
        $EX_FACIE["facie_parkinsoniana"]    = $this->input->post('facie_parkinsoniana')     !== null ? TRUE : FALSE;
        $EX_FACIE["facie_febril"]           = $this->input->post('facie_febril')            !== null ? TRUE : FALSE;
        $EX_FACIE["facie_mitralica"]        = $this->input->post('facie_mitralica')         !== null ? TRUE : FALSE;
        $EX_FACIE["otros_trastornos"]       = $this->input->post('facie_otros_trastornos')  !== null ? TRUE : FALSE;
        $EX_FACIE["comentarios"]            = $this->input->post('facie_comentarios');
        
        return $EX_FACIE;
    }
    
    //DATOS EXAMEN FISICO CONCIENCIA
    public function conciencia(){
        
        $EX_CONCIENCIA["orientacion_tiempo"]        = $this->input->post('orientacion_t');
        $EX_CONCIENCIA["orientacion_espacio"]       = $this->input->post('orientacion_e');
        $EX_CONCIENCIA["reconocimiento_personas"]   = $this->input->post('reconocimiento_p');
        $EX_CONCIENCIA["comentarios"]               = $this->input->post('conciencia_comentarios');
        
        $EX_CONCIENCIA["lucidez"]                   = $this->input->post('lucidez')         !== null ? TRUE : FALSE;
        $EX_CONCIENCIA["obnubilacion"]              = $this->input->post('obnubilacion')    !== null ? TRUE : FALSE;
        $EX_CONCIENCIA["sopor"]                     = $this->input->post('sopor')           !== null ? TRUE : FALSE;
        $EX_CONCIENCIA["coma"]                      = $this->input->post('coma')            !== null ? TRUE : FALSE;
        
        return $EX_CONCIENCIA;
    }
    
    //DATOS EXAMEN FISICO PIEL 
    public function piel(){
        
        $EX_PIEL["color"]                   = $this->input->post('piel_color');
        $EX_PIEL["humedad_untuosidad"]      = $this->input->post('piel_humedad_u');
        $EX_PIEL["turgor_elasticidad"]      = $this->input->post('piel_turgor_e');
        $EX_PIEL["temperatura"]             = $this->input->post('piel_temperatura');        
        $EX_PIEL["no_lesiones"]             = $this->input->post('piel_sin_lesiones')       !== null ? TRUE : FALSE;
        $EX_PIEL["eritema_exp_solar"]                 = $this->input->post('piel_Eritema')            !== null ? TRUE : FALSE;
        $EX_PIEL["mascula_cara"]            = $this->input->post('piel_mascula')            !== null ? TRUE : FALSE;
        $EX_PIEL["papula"]                  = $this->input->post('piel_papula')             !== null ? TRUE : FALSE;
        $EX_PIEL["nodulo"]                  = $this->input->post('piel_nodulo')             !== null ? TRUE : FALSE;
        $EX_PIEL["tumor"]                   = $this->input->post('piel_tumor')              !== null ? TRUE : FALSE;
        $EX_PIEL["vesicula"]                = $this->input->post('piel_vesicula')           !== null ? TRUE : FALSE;
        $EX_PIEL["ampolla"]                 = $this->input->post('piel_ampolla')            !== null ? TRUE : FALSE;
        $EX_PIEL["pustula"]                 = $this->input->post('piel_pustula')            !== null ? TRUE : FALSE;
        $EX_PIEL["placa"]                   = $this->input->post('piel_placa')              !== null ? TRUE : FALSE;
        $EX_PIEL["eritema"]                 = $this->input->post('piel_eritema')            !== null ? TRUE : FALSE;
        $EX_PIEL["escama"]                  = $this->input->post('piel_escama')             !== null ? TRUE : FALSE;
        $EX_PIEL["erosion"]                 = $this->input->post('piel_erosion')            !== null ? TRUE : FALSE;
        $EX_PIEL["ulceracion"]              = $this->input->post('piel_ulceracion')         !== null ? TRUE : FALSE;
        $EX_PIEL["costra"]                  = $this->input->post('piel_costra')             !== null ? TRUE : FALSE;
        $EX_PIEL["cicatriz"]                = $this->input->post('piel_cicatriz')           !== null ? TRUE : FALSE;
        $EX_PIEL["roncha"]                  = $this->input->post('piel_roncha')             !== null ? TRUE : FALSE;
        $EX_PIEL["liquenificacion"]         = $this->input->post('piel_liquenificacion')    !== null ? TRUE : FALSE;
        $EX_PIEL["telangiectasia"]          = $this->input->post('piel_telangiectasia')     !== null ? TRUE : FALSE;
        $EX_PIEL["petequia"]                = $this->input->post('piel_petequia')           !== null ? TRUE : FALSE;
        $EX_PIEL["equimosis"]               = $this->input->post('piel_equimosis')          !== null ? TRUE : FALSE;
        $EX_PIEL["víbice"]                  = $this->input->post('piel_vibice')             !== null ? TRUE : FALSE;
        $EX_PIEL["efelide"]                 = $this->input->post('piel_efelide')            !== null ? TRUE : FALSE;
        $EX_PIEL["otros_trastornos"]        = $this->input->post('piel_otros_t')            !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_calvicie"]          = $this->input->post('pelos_calvicie')          !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_alopecia"]          = $this->input->post('pelos_alopecia')          !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_hirsutismo"]        = $this->input->post('pelos_hirsutismo')        !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_otras_alt"]         = $this->input->post('pelos_otros_alt')         !== null ? TRUE : FALSE;
        $EX_PIEL["unas_acropaquia"]         = $this->input->post('unias_acropaquia')        !== null ? TRUE : FALSE;
        $EX_PIEL["unas_coiloniquia"]        = $this->input->post('unias_coiloniquia')       !== null ? TRUE : FALSE;
        $EX_PIEL["unas_psoriasis"]          = $this->input->post('unias_psoriasis')         !== null ? TRUE : FALSE;
        $EX_PIEL["unas_líneas_beau"]        = $this->input->post('unias_l_beau')            !== null ? TRUE : FALSE;
        $EX_PIEL["unas_lechos_ungueales_p"] = $this->input->post('unias_l_ungueales_p')     !== null ? TRUE : FALSE;
        $EX_PIEL["unas_lechos_ungueales_cianoticos"]    = $this->input->post('unias_l_ungueales_c')     !== null ? TRUE : FALSE;
        $EX_PIEL["unas_insuficiencia_renal_cronica"]    = $this->input->post('unias_renal_c')           !== null ? TRUE : FALSE;
        $EX_PIEL["unas_hemorragias_subungueales"]       = $this->input->post('unias_hemorragias_s')     !== null ? TRUE : FALSE;
        
        return $EX_PIEL;
    }
    
    //DATOS EXAMEN FISICO S. LINFATICO
    public function s_linfatico(){
        
        $EX_S_LINFATICO["adenopatia"]       = $this->input->post('sl_adenopatia');
        $EX_S_LINFATICO["cometarios"]       = $this->input->post('sl_comercial');
        
        return $EX_S_LINFATICO;
    }
    
    //DATOS EXAMEN FISICO SIGNOS VITALES
    public function signos_vitales(){
        
        $EX_SIGNOS_VITALES["fr"]            = $this->input->post('sv_fr');
        $EX_SIGNOS_VITALES["temperatura"]   = $this->input->post('sv_temperatura');
        $EX_SIGNOS_VITALES["ta_sis"]        = $this->input->post('sv_ta_sis');
        $EX_SIGNOS_VITALES["ta_diast"]      = $this->input->post('sv_ta_diast');
        $EX_SIGNOS_VITALES["pa"]            = $this->input->post('sv_pa');
        $EX_SIGNOS_VITALES["fc"]            = $this->input->post('sv_fc');
        $EX_SIGNOS_VITALES["peso"]          = $this->input->post('sv_peso');
        $EX_SIGNOS_VITALES["talla"]         = $this->input->post('sv_talla');
        $EX_SIGNOS_VITALES["imc"]           = $this->input->post('sv_imc');
        
        return $EX_SIGNOS_VITALES;
    }
    
    //DATOS EXAMEN FISICO ARCHIVOS Y DOCUMENTOS
    public function archivos_documentos(){}
    
    //FUNCION QUE PERMITE AGREGAR ARCHIVOS Y DOCUMENTOS A UNA CONSULTA MED.  
    public function upload_files($token){
        
        //Cargamos las variables de session (LIBRERIA)
        $session    =   $this->general_sessions->datosDeSession();
        
        $carpetaAdjunta="./archivos_/";
        // Contar envían por el plugin
        $Imagenes =count(isset($_FILES['imagenes']['name'])?$_FILES['imagenes']['name']:0);
        $infoImagenesSubidas = array();
        for($i = 0; $i < $Imagenes; $i++) {
                    
            // El nombre y nombre temporal del archivo que vamos para adjuntar
            $nombreArchivo  = isset($_FILES['imagenes']['name'][$i])?$_FILES['imagenes']['name'][$i]:null;
            $nombreTemporal = isset($_FILES['imagenes']['tmp_name'][$i])?$_FILES['imagenes']['tmp_name'][$i]:null;

            $rutaArchivo    = $carpetaAdjunta.$nombreArchivo;
            $ruta_src       = base_url()."archivos_/".$nombreArchivo;
            
            move_uploaded_file($nombreTemporal,$rutaArchivo);
            
            //Ingresar Archivo
            $data['titulo']         = (string)"titulo archivo: ".$nombreArchivo;
            $data['descripcion']    = (string)"descripcion archivo: ".$nombreArchivo;
            $data['archivo']        = (string)$nombreArchivo;
            $data['ingresado_por']  = (int)$session['id_usuario'];
            $data['token']          = (string)$token;
            $this->consulta_model->ingresar_archivo($data);
            
            $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"".base_url()."consulta_medica/delete_files/".$token."","key"=>$nombreArchivo);
            
            $arch 	= explode(".",$nombreArchivo);
            $ext 	= $arch[1];

            switch ($ext) {

                    case 'mp4':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'avi':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'mpg':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'mkv':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'mov':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case '3gp':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'webm':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'wmv':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'flv':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;

                    case 'mp3':
                    $ImagenesSubidas[$i]='<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'.$ruta_src.'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                    break;
                    case 'wav':
                    $ImagenesSubidas[$i]='<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'.$ruta_src.'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                    break;

                    case 'jpg':
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;
                    case 'png':
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;
                    case 'gif':
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;

                    case 'pdf':
                    $ImagenesSubidas[$i]='<embed class="kv-preview-data" height="160px" width="160px" type="application/pdf" src="'.$ruta_src.'">';
                    break;

                    case 'xls':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'xlsx':
                $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'ppt':
                $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'pptx':
                $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'doc':
                $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'docx':
                $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;

                    default:
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;
            }
        }

        $arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
                                 "initialPreview"=>$ImagenesSubidas);
        echo json_encode($arr);
    }
    
    //FUNCION QUE PERMITE ELIMINAR ARCHIVOS Y DOCUMENTOS A UNA CONSULTA MED.
    public function delete_files($token){
        
        $carpetaAdjunta="./archivos_/";
        
        if($_SERVER['REQUEST_METHOD']=="POST"){

            parse_str(file_get_contents("php://input"),$datosDELETE);

            $key= $datosDELETE['key'];

            unlink($carpetaAdjunta.$key);
            
            //Eliminar Archivo
            $data['archivo']        = (string)$key;
            $data['token']          = (string)$token;
            $this->consulta_model->eliminar_archivo($data);

            echo 0;
        }
    }
    
    //Subir archivos examen fisico
    public function upload_files_ef($token_ef){
        
        //Cargamos las variables de session (LIBRERIA)
        $session    =   $this->general_sessions->datosDeSession();
        
        $carpetaAdjunta="./archivos_/";
        // Contar envían por el plugin
        $Imagenes =count(isset($_FILES['imagenes_ef']['name'])?$_FILES['imagenes_ef']['name']:0);
        $infoImagenesSubidas = array();
        for($i = 0; $i < $Imagenes; $i++) {
                    
            // El nombre y nombre temporal del archivo que vamos para adjuntar
            $nombreArchivo  = isset($_FILES['imagenes_ef']['name'][$i])?$_FILES['imagenes_ef']['name'][$i]:null;
            $nombreTemporal = isset($_FILES['imagenes_ef']['tmp_name'][$i])?$_FILES['imagenes_ef']['tmp_name'][$i]:null;

            $rutaArchivo    = $carpetaAdjunta.$nombreArchivo;
            $ruta_src       = base_url()."archivos_/".$nombreArchivo;
            
            move_uploaded_file($nombreTemporal,$rutaArchivo);
            
            //Ingresar Archivo
            $data['titulo']         = (string)"titulo archivo: ".$nombreArchivo;
            $data['descripcion']    = (string)"descripcion archivo: ".$nombreArchivo;
            $data['archivo']        = (string)$nombreArchivo;
            $data['ingresado_por']  = (int)$session['id_usuario'];
            $data['token']          = (string)$token_ef;
            $this->consulta_model->ingresar_archivo_ef($data);
            
            $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"".base_url()."consulta_medica/delete_files_ef/".$token_ef."","key"=>$nombreArchivo);
            
            $arch 	= explode(".",$nombreArchivo);
            $ext 	= $arch[1];

            switch ($ext) {

                    case 'mp4':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'avi':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'mpg':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'mkv':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'mov':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case '3gp':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'webm':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'wmv':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;
                    case 'flv':
                    $ImagenesSubidas[$i]='<video src="'.$ruta_src.'" class="kv-preview-data file-preview-image" controls style="width:auto;height:160px;"><source src="foo.ogg" type="video/ogg"><source src="foo.mp4" type="video/mp4">Tu navegador no implementa el elemento <code>video</code>.<div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    break;

                    case 'mp3':
                    $ImagenesSubidas[$i]='<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'.$ruta_src.'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                    break;
                    case 'wav':
                    $ImagenesSubidas[$i]='<audio controls="" class="kv-preview-data"><source type="audio/mpeg" src="'.$ruta_src.'"></source><div class="file-preview-other"><span class="file-other-icon"><i class="glyphicon glyphicon-file"></i></span></div></audio>';
                    break;

                    case 'jpg':
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;
                    case 'png':
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;
                    case 'gif':
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;

                    case 'pdf':
                    $ImagenesSubidas[$i]='<embed class="kv-preview-data" height="160px" width="160px" type="application/pdf" src="'.$ruta_src.'">';
                    break;

                    case 'xls':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'xlsx':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'ppt':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'pptx':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'doc':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;
                    case 'docx':
                    $ImagenesSubidas[$i]='<object height="160px" width="160px" type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" data="blob:http://localhost/616e086f-57f4-4e96-a161-cfac858de8e8" class="kv-preview-data file-object"><param value="'.$ruta_src.'" name="movie"><param value="true" name="controller"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><param value="false" name="autoPlay"><param value="false" name="autoStart"><param value="high" name="quality"><div class="file-preview-other"><span class="file-other-icon"><a href="'.$ruta_src.'"  target="_blanck"><i class="glyphicon glyphicon-file"></i></a></span></div></object>';
                    break;

                    default:
                    $ImagenesSubidas[$i]='<img src="'.$ruta_src.'" class="kv-preview-data file-preview-image" style="width:auto;height:160px;">';
                    break;
            }
        }

        $arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
                                 "initialPreview"=>$ImagenesSubidas);
        echo json_encode($arr);
    }
    
    //Eliminar archivo examen fisico
    public function delete_files_ef($token_ef){
        
        $carpetaAdjunta="./archivos_/";
        
        if($_SERVER['REQUEST_METHOD']=="POST"){

            parse_str(file_get_contents("php://input"),$datosDELETE);

            $key= $datosDELETE['key'];

            unlink($carpetaAdjunta.$key);
            
            //Eliminar Archivo
            $data['archivo']        = (string)$key;
            $data['token']          = (string)$token_ef;
            $this->consulta_model->eliminar_archivo_ef($data);

            echo 0;
        }
    }
}
