<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class server_domain extends CI_Controller {
    
    function __construct() {
        parent::__construct();  
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_server_domain');
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_DATA_DOMAIN_SERVER';
            $data['TITLE']          = 'Master Data Data Domain Server';
            $data['SUB_TITLE']      = 'Data Master Domain Server';
            
            $TABLE                  = "tbl_server_liqu_id";
            $SORT_FIELD             = "created";
            $SORT_VAR               = "ASC";
            
            $data['dataAll']        = $this->mod_getdata->getData($TABLE, $SORT_FIELD, $SORT_VAR);
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_DATA_DOMAIN_SERVER_ADDFORM';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'Menu Tambah Data Master Domain Server';
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $DESC       = trim(strip_tags($this->input->post('url')));
                
            $TABLE          = 'tbl_server_liqu_id';
            $LOCK_FIELD     = 'keterangan';
            $LOCK_VAR       = $DESC;
            $checkData      = $this->mod_getdata->getDataSelected($TABLE, $LOCK_FIELD, $LOCK_VAR);
            
            if($checkData->num_rows() > 0) {
                echo "<script>
                        alert('Description already exist');
                        window.history.back();
                      </script>";
            } else {
                
                $this->mod_server_domain->saveServerDomain();
                
                
                redirect(base_url('server_domain'));
            }
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trash($ID_CODE) {
        if($this->session->userdata('sess_apps') == TRUE) {
           
            $TABLE_NAME = 'tbl_um_menu';
            $FIELD_LOCK = 'um_menu_id';
            
            $query = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            
            redirect(base_url('ummenu'));
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_DATA_DOMAIN_SERVER_FORMUPDATE';
            $data['TITLE']          = 'Edit Forms';
            $data['SUB_TITLE']      = 'MST_DATA_DOMAIN_SERVER';
            
            $TABLE_NAME             = 'tbl_server_liqu_id';
            $FIELD_LOCK             = 'id';
            $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            $this->mod_server_domain->updateServerDomain($LOCK_ID);
           
            
            redirect(base_url('server_domain'));
            
        } else {
            $this->load->view('formlogin');
        }
    }
    
    public function trashSelected() {
        
         
        
        if($this->session->userdata('sess_apps') == TRUE) {
            
            $TABLE_NAME     = 'tbl_um_menu';
            $FIELD_LOCK     = 'um_menu_id';
            
            
            
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