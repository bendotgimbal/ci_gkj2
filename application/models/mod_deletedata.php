<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_deletedata extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
    
    function trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK) {
		$this->db->delete($TABLE_NAME, array($FIELD_LOCK => $ID_CODE));
	}
	
	function trashDatadoublekey($ID_CODE1, $FIELD_LOCK1,$ID_CODE2, $FIELD_LOCK2 , $TABLE_NAME) {
		 $data = array(
            $FIELD_LOCK1          => trim(strip_tags($ID_CODE1)),
			 $FIELD_LOCK2          => trim(strip_tags($ID_CODE2))
        );
	
	
		$this->db->delete($TABLE_NAME, $data);
	}
	
	function trashDatatriplekey($ID_CODE1, $FIELD_LOCK1,$ID_CODE2, $FIELD_LOCK2,$ID_CODE3, $FIELD_LOCK3,  $TABLE_NAME) {
		 $data = array(
            $FIELD_LOCK1          => trim(strip_tags($ID_CODE1)),
			$FIELD_LOCK2          => trim(strip_tags($ID_CODE2)),
			$FIELD_LOCK3          => trim(strip_tags($ID_CODE3))
        );
	
	
		$this->db->delete($TABLE_NAME, $data);
	}
    
}