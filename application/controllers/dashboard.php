<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();    
        $this->load->model('mod_getdata');
        date_default_timezone_set('Asia/Jakarta');
    }
    
    
    
    	public function index()
	{
         if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_DEFAULT';
            //$data['TITLE']          = 'Dashboard';
            //$data['SUB_TITLE']      = 'Ver. 2.0';
            
            //$this->load->view('index', $data);
            $this->load->view('dashboard', $data); 
        } else {
            $this->load->view('formlogin');
        }
        
        
    	   

	}
	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}

