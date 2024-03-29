<?php

class M_user extends CI_Model {

    private $table = "user";

    function cek($username, $password) {
        $this->db->where("u_name", $username);
        $this->db->where("u_paswd", $password);
        return $this->db->get("user");
    }
    
    // function cekuser($username, $password) {
    //     $this->db->where("username", $username);
    //     $this->db->where("password", $password);
    //     return $this->db->get("tbl_um_user");
    // }

    function cekuser($username, $password) {
        $this->db->where("tbluk_nik", $username);
        $this->db->where("tbluk_password", $password);
        return $this->db->get("tbl_user_akses");
    }
     function getQuery($TABLE)
    {
        //$DB2 = $this->load->database('default2', TRUE);
        $query = $this->db->query($TABLE);
          return $query;
    }
    
    function semua() {
        return $this->db->get("user");
    }
	function insertregister($data){
		 $this->db->insert("user", $data);
	}
    function cekKode($kode) {
        $this->db->where("u_name", $kode);
        return $this->db->get("user");
    }

    function cekId($kode) {
        $this->db->where("u_id", $kode);
        return $this->db->get("user");
    }
    
    function getLoginData($usr, $psw) {
        $u = mysql_real_escape_string($usr);
        $p = md5(mysql_real_escape_string($psw));
        $q_cek_login = $this->db->get_where('users', array('username' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qad) {
                    $sess_data['logged_in'] = 'aingLoginWebYeuh';
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['group'] = $qad->group;
                    $sess_data['rid'] = $qad->rid;
					$sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
        }
    }

    function update($id, $info) {
        $this->db->where("u_id", $id);
        $this->db->update("user", $info);
    }

    function simpan($info) {
        $this->db->insert("user", $info);
    }

    function hapus($kode) {
        $this->db->where("u_id", $kode);
        $this->db->delete("user");
    }

}
