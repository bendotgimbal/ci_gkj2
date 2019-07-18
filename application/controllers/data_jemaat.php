<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_jemaat extends CI_Controller {
    
    function __construct() {
        parent::__construct();  
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_data_jemaat');
        
        $this->load->model('mod_deletedata');
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
    }

    function get_jemaat(){
        $nama=$this->input->post('nama');
        $data=$this->m_pos->get_data_jemaat_byname($nama);
        echo json_encode($data);
    }
    
    // public function index() {
    //     if ($this->session->userdata('sess_apps') == TRUE) {
            
    //         $data['STR_PAGE']       = 'PAGE_MST_DATA_JEMAAT';
    //         $data['TITLE']          = 'USER LOGIN';
    //         $data['SUB_TITLE']      = 'Data';
            
    //         $TABLE                  = "tbl_um_user";
    //         $SORT_FIELD             = "nama";
    //         $SORT_VAR               = "ASC";
            
    //         $data['dataAll']        = $this->mod_getdata->getData($TABLE, $SORT_FIELD, $SORT_VAR);

    //         $this->load->view('dashboard', $data);
            
    //     } else {
    //         $this->load->view('login');
    //     }
    // }

    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {

            $data['STR_PAGE']       = 'PAGE_MST_DATA_JEMAAT';
            $data['TITLE']          = 'USER LOGIN';
            $data['SUB_TITLE']      = 'Data';
            
            // $TABLE                  = "SELECT (a.um_user_id)um_user_id, (a.u_id)u_id, (a.nik)nik, (a.nama)nama, (a.password)password, (a.username)username, (b.no_induk)no_induk, (b.Field1)no_kk, (b.nama)nama2 FROM tbl_um_user a INNER JOIN tbl_induk b ON b.nik=a.nik WHERE a.u_id='".$this->session->userdata('u_id')."' ORDER BY a.um_user_id";

            // $TABLE                  = "SELECT (a.um_user_id)um_user_id, (a.u_id)u_id, (b.tbluk_nik)nik, (c.nama)nama, (a.password)password, (a.username)username, (c.no_induk)no_induk, (c.Field1)no_kk, (c.hubungan_keluarga)hubungan_keluarga FROM tbl_um_user a INNER JOIN tbl_user_akses b ON b.tbluk_u_id=a.u_id INNER JOIN tbl_induk c ON c.nik=b.tbluk_nik WHERE a.u_id='".$this->session->userdata('u_id')."' ORDER BY a.um_user_id";
            // $data['dataAll']        = $this->mod_data_jemaat->getQuery($TABLE);

            // $TABLE          = "SELECT (tbluk_nik)nik FROM tbl_user_akses WHERE tbluk_u_id='".$this->session->userdata('u_id')."'";
            
            // $TABLE          = "SELECT (a.um_user_id)um_user_id, (a.u_id)u_id, (b.tbluk_nik)nik, (c.nama)nama, (a.password)password, (a.username)username, (c.no_induk)no_induk, (c.Field1)no_kk, (c.hubungan_keluarga)hubungan_keluarga FROM tbl_um_user a INNER JOIN tbl_user_akses b ON b.tbluk_u_id=a.u_id INNER JOIN tbl_induk c ON c.nik=b.tbluk_nik WHERE a.u_id='".$this->session->userdata('u_id')."' ORDER BY a.um_user_id";


            // $TABLE          = "SELECT (a.tbluk_u_id) u_id, (a.tbluk_nik) nik, (b.Field1) no_kk FROM tbl_user_akses a INNER JOIN tbl_induk b ON b.nik = a.tbluk_nik WHERE a.tbluk_u_id ='".$this->session->userdata('u_id')."'";
            // $data['allUserData']    = $this->mod_data_jemaat->getQuery($TABLE);

            // $rsDataUser = $data['allUserData']->row();
            // $data['no_kk'] = $rsDataUser->no_kk;

            // $TABLE                  = "SELECT ('')um_user_id, ('')u_id, nik, nama, ('')password, (nik)username, no_induk, (Field1)no_kk, hubungan_keluarga FROM tbl_induk WHERE Field1='".$data['no_kk']."'";
            // $data['dataAll']        = $this->mod_data_jemaat->getQuery($TABLE);

            $TABLE                  = "SELECT (a.tbluk_u_id) u_id_induk, (a.tbluk_nik) nik_induk, ('')um_user_id, ('')u_id, c.nik, c.nama, ('')password, c.no_induk, (c.Field1)no_kk, c.hubungan_keluarga FROM tbl_user_akses a INNER JOIN tbl_induk b ON b.nik = a.tbluk_nik INNER JOIN tbl_induk c ON c.Field1=b.Field1 WHERE a.tbluk_u_id ='".$this->session->userdata('u_id')."'";
            $data['dataAll']        = $this->mod_data_jemaat->getQuery($TABLE);

            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_DATA_JEMAAT_ADDFORM';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'User Login Aplikasi';
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $DESC       = trim(strip_tags($this->input->post('nama')));
                
            $TABLE          = 'tbl_um_user';
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
                
              
                
                redirect(base_url('data_jemaat'));
            }
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trash($ID_CODE) {
        if($this->session->userdata('sess_apps') == TRUE) {
           
            $TABLE_NAME = 'tbl_um_user';
            $FIELD_LOCK = 'um_user_id';
            
            $query = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            
            redirect(base_url('data_jemaat'));
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_DATA_JEMAAT_FORMUPDATE';
            $data['TITLE']          = 'Edit Forms';
            $data['SUB_TITLE']      = 'User Login';
            
            // $TABLE_NAME             = 'tbl_um_user';
            // $FIELD_LOCK             = 'um_user_id';
            // $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            // $data['LOCK_ID']        = $LOCK_ID;

            // $TABLE_NAME             = 'tbl_user_akses';
            // $FIELD_LOCK             = 'tbluk_u_id';
            // $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            // $data['LOCK_ID']        = $LOCK_ID;

            // $TABLE          = "SELECT (a.tbluk_u_id) u_id_induk, (c.nik) nik, (b.Field1) no_kk, c.nama FROM tbl_user_akses a INNER JOIN tbl_induk b ON b.nik = a.tbluk_nik INNER JOIN tbl_induk c ON c.Field1=b.Field1 WHERE a.tbluk_u_id ='".$this->session->userdata('u_id')."'";
            // $data['dataSelected']    = $this->mod_data_jemaat->getQuery($TABLE);
            // $data['LOCK_ID']        = $LOCK_ID;

            $TABLE_NAME             = 'tbl_induk';
            $FIELD_LOCK             = 'nik';
            $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            $data['LOCK_ID']        = $LOCK_ID;

            // $FIELD_LOCK             = 'nik';
            // // $this->db->select('a.*, b.*');
            // $this->db->select('c.nama, c.nik');
            // $this->db->from('tbl_user_akses as a');
            // $this->db->join('tbl_induk as b', 'b.nik = a.tbluk_nik', 'inner');
            // $this->db->join('tbl_induk as c', 'c.Field1 = b.Field1', 'inner');
            // $this->db->where('c.nik', $FIELD_LOCK);
            // $data['dataSelected']   = $this->db->get();
            // $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            // $this->mod_data_jemaat->updateDataJemaat($LOCK_ID);
            // redirect(base_url('data_jemaat'));

            // // $nama=$this->input->post('nama');
            // $nama=$LOCK_ID;
            // $dataUpdate=$this->mod_data_jemaat->get_update_jemaat_byname($nama);
            // // $dataUpdate=$this->mod_data_jemaat->get_update_jemaat_byname($LOCK_ID);
            // if($dataUpdate == 1) {
            //     echo $this->session->set_flashdata('msg', 
            //             '<div class="alert alert-danger">
            //                 <h4>Oppss</h4>
            //                 <p>Tidak ada kata dinput.</p>
            //             </div>');
            //     redirect('');     
            // } else { 
            //     echo $this->session->set_flashdata('msg', 
            //         '<div class="alert alert-success">
            //             <h4>Berhasil </h4>
            //             <p>Anda berhasil input kata '.$dataUpdate.'.</p>
            //         </div>');
            //     redirect(base_url('data_jemaat'));
            // };
            // redirect(base_url('data_jemaat'));

            $DESC       = trim(strip_tags($this->input->post('id')));
            // $DESC       = trim(strip_tags($this->input->post($LOCK_ID)));
            $TABLE          = 'test_data';
            $LOCK_FIELD     = 'nik';
            $LOCK_VAR       = $DESC;
            $checkData      = $this->mod_getdata->getDataSelected($TABLE, $LOCK_FIELD, $LOCK_VAR);
            
            if($checkData->num_rows() > 0) {
                echo "<script>
                        alert('Data Sudah Tersedia');
                        window.history.back();
                      </script>";
            } else {
                $this->mod_data_jemaat->updateDataJemaat();
                redirect(base_url('data_jemaat'));
            }
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trashSelected() {
        
         
        
        if($this->session->userdata('sess_apps') == TRUE) {
            
            $TABLE_NAME     = 'tbl_um_user';
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