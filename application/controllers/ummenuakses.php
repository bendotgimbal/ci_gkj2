<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ummenuakses extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_ummenuakses');
        
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_MENU_AKSES';
            $data['TITLE']          = 'MENU HAK AKSES';
            $data['SUB_TITLE']      = 'Data';
            
            $TABLE                  = "v_um_menu_akses";
            $SORT_FIELD             = "namaakses";
            $SORT_VAR               = "ASC";
            
            $data['dataAll']        = $this->mod_getdata->getData($TABLE, $SORT_FIELD, $SORT_VAR);
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_MENU_AKSES_ADDFORM';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'Menu Hak Akses';
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $DESC		= trim(strip_tags($this->input->post('nama')));
                
            $TABLE          = 'tbl_um_menu_akses';
            $LOCK_FIELD     = 'nama';
            $LOCK_VAR       = $DESC;
            
            
             if ($_POST) 
             {
                $um_menu_id = $this->input->post('um_menu_id');
                $um_akses_id = $this->input->post('um_akses_id');
        
                //$data = array();
                for ($i = 0; $i < count($this->input->post('um_menu_id')); $i++)
                {
                    $this->mod_ummenuakses->saveUmMenuAkses($um_menu_id[$i], $um_akses_id[$i]);
                }
             }
                          
                redirect(base_url('ummenuakses'));
            
            
        } else {
            $this->load->view('dashboard');
        }
    }

    
    public function trash($ID_CODE) {
		if($this->session->userdata('sess_apps') == TRUE) {
	       
            $TABLE_NAME = 'tbl_um_menu_akses';
            $FIELD_LOCK = 'um_menu_akses_id';
            
            $query = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            
            redirect(base_url('ummenuakses'));
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_MENU_AKSES_FORMUPDATE';
            $data['TITLE']          = 'Edit Forms';
            $data['SUB_TITLE']      = 'UM MENU AKSES';
            
            $TABLE_NAME             = 'tbl_um_menu_akses';
            $FIELD_LOCK             = 'um_menu_akses_id';
            $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            $data['LOCK_ID']        = $LOCK_ID;

            // $TABLE                  = "SELECT (a.um_menu_akses_id)um_menu_akses_id, (a.um_menu_id)um_menu_id, (b.nama)nama, (a.um_akses_id)um_akses_id, (c.nama)namaakses FROM tbl_um_menu_akses a INNER JOIN tbl_um_menu b ON b.um_menu_id=a.um_menu_id INNER JOIN tbl_um_akses c ON c.um_akses_id=a.um_akses_id";
            // $data['dataSelected']        = $this->mod_ummenuakses->getQuery($TABLE);
            // $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
			$this->load->view('login');
		}
	}
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            $this->mod_ummenuakses->updateUmMenu($LOCK_ID);
          
            
            redirect(base_url('ummenuakses'));
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trashSelected() {
        
         
        
		if($this->session->userdata('sess_apps') == TRUE) {
            
            $TABLE_NAME     = 'tbl_um_menu_akses';
            $FIELD_LOCK     = 'um_menu_akses_id';
            
            
            
            $data = json_decode(stripslashes($_POST['data']));
            foreach($data as $d){
                $ID_CODE    = $d;
                $query      = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            }
            
            if($query == TRUE) {
                echo "success";
                //SAVE LOG ========================================================
                $MEMBER     = $this->session->userdata('sess_apps_uid');
                $LOGSCODE   = "023";
                $TIME       = getDateTime();
                $this->mod_apps->logs($MEMBER, $LOGSCODE, $TIME);
                //=================================================================

            } else {
                echo "error";
            }
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
}