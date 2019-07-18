<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class umuserakses extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_umuserakses');
        
        $this->load->model('mod_deletedata');
        // $this->load->library('encryption');
        // $this->load->library('encrypt');
        // $encript =  $this->encrypt->encode($string);
        // $decript = $this->encrypt->decode($encript);
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_USER_AKSES';
            $data['TITLE']          = 'MENU USER HAK AKSES';
            $data['SUB_TITLE']      = 'Data';
            
            // $TABLE                  = "v_um_user_akses";
            // $SORT_FIELD             = "namauser";
            // $SORT_VAR               = "ASC";
            
            // $data['dataAll']        = $this->mod_getdata->getData($TABLE, $SORT_FIELD, $SORT_VAR);

            // $TABLE                  = "SELECT * FROM v_um_user_akses";
            $TABLE                  = "SELECT (a.tbluk_id)um_user_akses_id,(a.tbluk_u_id)um_user_id,(a.tbluk_nik)nik, (b.nama)nama, (a.tbluk_password)password, (a.tbluk_avatar)avatar, (c.nama)namaakses, (a.tbluk_um_akses_id)um_akses_id FROM tbl_user_akses a INNER JOIN tbl_induk b ON b.nik=a.tbluk_nik INNER JOIN tbl_um_akses c ON c.um_akses_id=a.tbluk_um_akses_id ORDER BY nama ASC";
            $data['dataAll']        = $this->mod_umuserakses->getQuery($TABLE);
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_USER_AKSES_ADDFORM';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'Menu Hak Akses';
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            // $DESC		= trim(strip_tags($this->input->post('nama')));
                
            // $TABLE          = 'tbl_um_user_akses';
            // $LOCK_FIELD     = 'nama';
            // $LOCK_VAR       = $DESC;
            
            
            //  if ($_POST) 
            //  {
            //     $um_user_id = $this->input->post('um_user_id');
            //     $um_akses_id = $this->input->post('um_akses_id');
        
            //     //$data = array();
            //     for ($i = 0; $i < count($this->input->post('um_user_id')); $i++)
            //     {
            //         $this->mod_umuserakses->saveUmUserAkses($um_user_id[$i], $um_akses_id[$i]);
            //     }
            //  }

            // $select = $this->db->select('counter');
            // $from = $this->db->from('tbl_total_user');
            // $query = $this->db->get();

             if ($_POST) 
             {
                // $count_um_user_id = $this->input->post('count_um_user_id');
                // $username = $this->input->post('username');
                // // $password = md5($this->input->post('username'));
                // // $keterangan = $this->input->post('');
                // // $namaakses = $this->input->post('');
                // $um_akses_id = $this->input->post('um_akses_id');
        
                // //$data = array();
                // for ($i = 0; $i < count($this->input->post('count_um_user_id')); $i++)
                // {
                //     $this->mod_umuserakses->saveUmUserAkses2($count_um_user_id[$i], $username[$i], $um_akses_id[$i]);
                // }

                $query = $this->db->get(tbl_total_user);
                foreach($query->result() as $row){
                    $row->counter;
                    $count_um_user_id = $row->counter;
                    $username = $this->input->post('username');
                    $um_akses_id = $this->input->post('um_akses_id');
                    for ($i = 0; $i < count($this->input->post('count_um_user_id')); $i++)
                    {
                        $this->mod_umuserakses->saveUmUserAkses2($count_um_user_id[$i], $username[$i], $um_akses_id[$i]);
                    }
                }
             }
                
               
                
                redirect(base_url('umuserakses'));
            
            
        } else {
            $this->load->view('login');
        }
    }

    
    public function trash($ID_CODE) {
		if($this->session->userdata('sess_apps') == TRUE) {
	       
            $TABLE_NAME = 'tbl_um_menu_akses';
            $FIELD_LOCK = 'um_menu_akses_id';
            
            $query = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            //SAVE LOG ========================================================
            $MEMBER     = $this->session->userdata('sess_apps_uid');
            $LOGSCODE   = "023";
            $TIME       = getDateTime();
            $this->mod_apps->logs($MEMBER, $LOGSCODE, $TIME);
            //=================================================================
            redirect(base_url('umuserakses'));
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_UM_USER_AKSES_FORMUPDATE';
            $data['TITLE']          = 'Edit Forms';
            $data['SUB_TITLE']      = 'UM MENU AKSES';
            
            $TABLE_NAME             = 'v_um_user_akses';
            $FIELD_LOCK             = 'um_user_akses_id';
            $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
			$this->load->view('login');
		}
	}
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            $this->mod_updatedata->updateUmUserAkses($LOCK_ID);
            //SAVE LOG ========================================================
            $MEMBER     = $this->session->userdata('sess_apps_uid');
            $LOGSCODE   = "022";
            $TIME       = getDateTime();
            $this->mod_apps->logs($MEMBER, $LOGSCODE, $TIME);
            //=================================================================
            
            redirect(base_url('umuserakses'));
            
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