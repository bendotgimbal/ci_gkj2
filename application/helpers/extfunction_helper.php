<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getDateTime() {
    
    $DATE_FORMAT = "%Y-%m-%d %H:%i:%s";
	$TIME        = time();

    return mdate($DATE_FORMAT, $TIME);
    
}

function sendEmailNotif($SENDER, $EMAILTO, $EMAIL_FROM, $SUBJECT, $CONTENT) {

	$CI =& get_instance();
	$CI->load->library('email');

	$EMAIL_FROM	= $SENDER;
	$EMAIL_CC	= "anwar_kpt1989@yahoo.com";

	$config['mailtype']		= 'html';
	$config['charset'] 		= 'iso-8859-1';
	$config['wordwrap'] 	= TRUE;
	$CI->email->initialize($config);

	$CI->email->from($EMAIL_FROM, 'RKIB Online');
	$CI->email->to($EMAILTO);
	$CI->email->cc($EMAIL_CC);

	$CI->email->subject($SUBJECT);
	$CI->email->message($CONTENT);

	$CI->email->send();
}