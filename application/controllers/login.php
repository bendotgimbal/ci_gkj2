<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        session_start();
        $this->load->model(array('m_user'));
        if ($this->session->userdata('u_name')) {
            redirect('dashboard');
        }
    }
    function index() {
        $this->load->view('login');
    }
	function reg() {
        $this->load->view('daftar');
    }
	function tes() {
		$data['link'] = 'tes';
		$this->load->view('dashboard', $data);
	}
//     function proses() {
//         $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
//         $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

//         if ($this->form_validation->run() == FALSE) {
//             $this->load->view('login');
//         } else {

//             $usr = $this->input->post('username');
//             $psw = $this->input->post('password');
//             // $u = mysql_real_escape_string($usr);
//             // $p = md5(mysql_real_escape_string($psw));
//             $u = mysqli_real_escape_string($usr);
//             $p = md5(mysqli_real_escape_string($psw));
//             $cek = $this->m_user->cekuser($u, $p);
//             if ($cek->num_rows() > 0) {
//                 //login berhasil, buat session
// 			//	$datalogin = $this->m_user->getQuery("select um_user_id, namauser, username, namaakses, avatar from v_um where username = '".$u."'");
// // $datalogin = $this->m_user->getQuery("select
// //     `um_user`.`um_user_id` AS `um_user_id`,
// //     `um_user`.`nama` AS `namauser`,
// //     `um_user`.`username` AS `username`,
// //     `um_user`.`avatar` AS `avatar`,
// //     `um_akses`.`nama` AS `namaakses`,
// // 	`um_user`.`location` AS `cabang`,
// // 	`um_user`.`city` AS `kota`,
// // 	`um_user`.`customer_code` AS `customer_code`
// //     from
// //     `um_akses`, um_user, um_user_akses
// // where `um_user`.`um_user_id` = `um_user_akses`.`um_user_id`
// // and `um_user_akses`.`um_akses_id` = `um_akses`.`um_akses_id` 
// // and `um_user`.`username` = '".$u."'");

// $datalogin = $this->m_user->getQuery("select
//     `tbl_um_user`.`um_user_id` AS `um_user_id`,
//     `tbl_um_user`.`nama` AS `namauser`,
//     `tbl_um_user`.`username` AS `username`,
//     `tbl_um_user`.`avatar` AS `avatar`,
//     `tbl_um_akses`.`nama` AS `namaakses`,
//     `tbl_um_user`.`location` AS `cabang`,
//     `tbl_um_user`.`city` AS `kota`,
//     `tbl_um_user`.`customer_code` AS `customer_code`
//     from
//     `tbl_um_akses`, tbl_um_user, tbl_um_user_akses
// where `tbl_um_user`.`um_user_id` = `tbl_um_user_akses`.`um_user_id`
// and `tbl_um_user_akses`.`um_akses_id` = `tbl_um_akses`.`um_akses_id` 
// and `tbl_um_user`.`username` = '".$u."'");


// /*
// 				$qad = $datalogin->row();
//                     $sess_data['u_id'] = $qad->um_user_id;
//                     $sess_data['nama'] = $qad->namauser;
//                     $sess_data['u_name'] = $qad->username;
//                     $sess_data['role'] = $qad->namaakses;
//                     $sess_data['icon'] = $qad->avatar;
// */
// 				foreach ($datalogin->result() as $qad) {
//                     $sess_data['u_id'] = $qad->um_user_id;
//                     $sess_data['nama'] = $qad->namauser;
//                     $sess_data['u_name'] = $qad->username;
//                     $sess_data['role'] = $qad->namaakses;
//                     $sess_data['icon'] = $qad->avatar;
// 					$this->session->set_userdata($sess_data);
//                     $this->session->set_userdata('sess_apps', 'VALID');
//                     $this->session->set_userdata('sess_apps_uid', $qad->um_user_id);
//                     $this->session->set_userdata('sess_apps_avatar', $qad->avatar);
// 					$this->session->set_userdata('sess_cabang', $qad->cabang);
// 					$this->session->set_userdata('sess_kota', $qad->kota);
// 					$this->session->set_userdata('sess_vendor_code', $qad->customer_code);
					
//                 }
               
// 				redirect('dashboard/index/default');
//             } else {
//                 $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
//                 redirect('login');
//             }
//         }
//     }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {

            // $usr = $this->input->post('username');
            // $psw = $this->input->post('password');

            // $u = mysqli_real_escape_string($usr);
            // $p = md5(mysqli_real_escape_string($psw));
            $u = $this->input->post('username');
            $p = md5($this->input->post('password'));
            $cek = $this->m_user->cekuser($u, $p);
            if ($cek->num_rows() > 0) {

            // $datalogin = $this->m_user->getQuery("select
            //     `tbl_um_user`.`um_user_id` AS `um_user_id`,
            //     `tbl_um_user`.`nama` AS `namauser`,
            //     `tbl_um_user`.`username` AS `username`,
            //     `tbl_um_user`.`avatar` AS `avatar`,
            //     `tbl_um_akses`.`nama` AS `namaakses`,
            //     `tbl_um_user`.`location` AS `cabang`,
            //     `tbl_um_user`.`city` AS `kota`,
            //     `tbl_um_user`.`customer_code` AS `customer_code`
            //     from
            //     `tbl_um_akses`, tbl_um_user, tbl_um_user_akses
            // where `tbl_um_user`.`um_user_id` = `tbl_um_user_akses`.`um_user_id`
            // and `tbl_um_user_akses`.`um_akses_id` = `tbl_um_akses`.`um_akses_id` 
            // and `tbl_um_user`.`username` = '".$u."'");

                // $datalogin = $this->m_user->getQuery("SELECT um_user_id,(nama)namauser,username,avatar,(nama)namaakses,(password)password,(location)cabang,(city)kota,customer_code FROM tbl_um_user WHERE username = '".$u."'");
            
                // foreach ($datalogin->result() as $qad) {
                //     $sess_data['u_id'] = $qad->um_user_id;
                //     $sess_data['nama'] = $qad->namauser;
                //     $sess_data['u_name'] = $qad->username;
                //     $sess_data['role'] = $qad->namaakses;
                //     $sess_data['icon'] = $qad->avatar;
                //     $this->session->set_userdata($sess_data);
                //     $this->session->set_userdata('sess_apps', 'VALID');
                //     $this->session->set_userdata('sess_apps_uid', $qad->um_user_id);
                //     $this->session->set_userdata('sess_apps_avatar', $qad->avatar);
                //     $this->session->set_userdata('sess_cabang', $qad->cabang);
                //     $this->session->set_userdata('sess_kota', $qad->kota);
                //     $this->session->set_userdata('sess_vendor_code', $qad->customer_code);
                    
                // }

                // $datalogin = $this->m_user->getQuery("SELECT um_user_id,namauser,username,namaakses,password FROM v_um_user_akses WHERE username = '".$u."'");
                // foreach ($datalogin->result() as $qad) {
                //     $sess_data['u_id'] = $qad->um_user_id;
                //     $sess_data['nama'] = $qad->namauser;
                //     $sess_data['u_name'] = $qad->username;
                //     $sess_data['role'] = $qad->namaakses;
                //     $this->session->set_userdata($sess_data);
                //     $this->session->set_userdata('sess_apps', 'VALID');
                //     $this->session->set_userdata('sess_apps_uid', $qad->um_user_id);
                // }

                $datalogin = $this->m_user->getQuery("SELECT (a.tbluk_u_id)um_user_id,(a.tbluk_nik)nik, (b.nama)nama, (a.tbluk_password)password, (a.tbluk_avatar)avatar, (c.nama)namaakses, (a.tbluk_um_akses_id)um_akses_id FROM tbl_user_akses a INNER JOIN tbl_induk b ON b.nik=a.tbluk_nik INNER JOIN tbl_um_akses c ON c.um_akses_id=a.tbluk_um_akses_id WHERE a.tbluk_nik = '".$u."' ORDER BY nama ASC");
                foreach ($datalogin->result() as $qad) {
                    $sess_data['u_id'] = $qad->um_user_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['u_name'] = $qad->nik;
                    $sess_data['role'] = $qad->namaakses;
                    $sess_data['icon'] = $qad->avatar;
                    $this->session->set_userdata($sess_data);
                    $this->session->set_userdata('sess_apps_uid', $qad->um_user_id);
                    $this->session->set_userdata('sess_apps_avatar', $qad->avatar);
                    $this->session->set_userdata('sess_apps', 'VALID');
                    $this->session->set_userdata('sess_apps_uid', $qad->um_user_id);
                }
               
                redirect('dashboard/index/default');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }
    
	function register(){
		$nama = $this->input->post('nama');
	    $username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$role = $this->input->post('role');
		$email = $this->input->post('email');

		 
		 $data = array( 'nama' => $nama,
					    'u_name' => $username,
					    'u_paswd' => $password,
					    'role' => $role,
					   	'email' => $email, );
		 
		  $insert = $this->m_user->insertregister($data);
		  if ($insert == 1){

			                  redirect('login');
		  }else{
			
			                  redirect('login/reg/'.insert);  
		  }
		 
	}
    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
