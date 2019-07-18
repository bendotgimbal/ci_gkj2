<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tesreport extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_umuser');
        
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_USER';
            $data['TITLE']          = 'USER LOGIN';
            $data['SUB_TITLE']      = 'Data';
            
            $TABLE                  = "um_user";
            $SORT_FIELD             = "nama";
            $SORT_VAR               = "ASC";
            
            $data['dataAll']        = $this->mod_getdata->getData($TABLE, $SORT_FIELD, $SORT_VAR);
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_USER_ADDFORM';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'User Login Aplikasi';
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $DESC		= trim(strip_tags($this->input->post('nama')));
                
            $TABLE          = 'um_user';
            $LOCK_FIELD     = 'username';
            $LOCK_VAR       = $DESC;
            $checkData      = $this->mod_getdata->getDataSelected($TABLE, $LOCK_FIELD, $LOCK_VAR);
            
            if($checkData->num_rows() > 0) {
                echo "<script>
                        alert('Username already exist');
                        window.history.back();
                      </script>";
            } else {
                
                $this->mod_umuser->saveUmUser();
                
              
                
                redirect(base_url('umuser'));
            }
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trash($ID_CODE) {
		if($this->session->userdata('sess_apps') == TRUE) {
	       
            $TABLE_NAME = 'um_user';
            $FIELD_LOCK = 'um_user_id';
            
            $query = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            
            redirect(base_url('umuser'));
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_USER_FORMUPDATE';
            $data['TITLE']          = 'Edit Forms';
            $data['SUB_TITLE']      = 'User Login';
            
            $TABLE_NAME             = 'um_user';
            $FIELD_LOCK             = 'um_user_id';
            $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
			$this->load->view('login');
		}
	}
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            $this->mod_umuser->updateUmUser($LOCK_ID);
            
            
            redirect(base_url('umuser'));
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trashSelected() {
        
         
        
		if($this->session->userdata('sess_apps') == TRUE) {
            
            $TABLE_NAME     = 'um_user';
            $FIELD_LOCK     = 'um_user_id';
            
            
            
            $data = json_decode(stripslashes($_POST['data']));
            foreach($data as $d){
                $ID_CODE    = $d;
                $query      = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            }
            
            if($query == TRUE) {
                echo "success";
                
            } else {
                echo "error";
            }
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
}