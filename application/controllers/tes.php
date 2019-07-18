<?php
 class Tes extends CI_Controller {
  function index(){
   $data['link'] = 'coba.php';
   $this->load->view('dashboard', $data);
  }

	 function report_ads(){
		$data['link'] = 'coba.php';
	   $this->load->view('dashboard', $data);
	 }
	 
	  function report_pod(){
		$data['link'] = 'coba2.php';
	   $this->load->view('dashboard', $data);
	 }
 }
?>