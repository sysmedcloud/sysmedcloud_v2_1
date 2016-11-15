<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $secured_controller;
    protected $secured_actions;
   
    function __construct($secured_controller = FALSE, $secured_actions = array())
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
         
        $this->secured_controller = $secured_controller;
        $this->secured_actions = $secured_actions;
        
        if($this->secured_controller)
        {
            $this->_check_security();
        }
    }
   
    protected function _check_security()
    {
        if(!$this->_access_granted($this->session->userdata('id_usuario'), $this->router->method))
        {
                $this->config->load('security');
                $redirectURL = $this->config->item('unauthorized_redirect');
                if(isset($redirectURL))
                {
                    redirect($redirectURL);
                }
                else
                {
                    show_error('Unauthorized access');
                }
        }
    }
    
    protected function _access_granted($user_id, $action_name)
    {
        
        if(!$this->secured_controller)
        {
            return TRUE;
        }
        else
        {
            if(!array_key_exists($action_name, $this->secured_actions))
            {
                return TRUE;
            }
            else
            {
                if($user_id === FALSE || !isset($user_id))
                {
                    return FALSE;
                }
                else
                {
                    if(!is_array($this->secured_actions[$action_name]))
                    {
                        $allowed_roles = trim($this->secured_actions[$action_name]);
                        
                        if($allowed_roles == '*')
                        {
                            return TRUE;
                        }
                        else
                        {
                            $user_role = $this->session->userdata('perfil');
                            return stripos($allowed_roles, $user_role) !== FALSE;
                        }
                    }
                    else
                    {
                        $user_role = $this->session->userdata('perfil');
                        return in_array($user_role, $this->secured_actions[$action_name]);
                    }
                }					
            }
         }
    }
}