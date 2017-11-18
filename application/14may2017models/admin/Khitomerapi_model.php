<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Khitomerapi_model extends CI_Model{
	
	public $tblName;
	
    public function __construct(){
        parent::__construct();
		$this->tblName = 'khitomer_api';
    }
	
	//------------get all Api----------
    public function getAllApi(){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->order_by('api_sort_order', 'ASC');
        return $this->db->get();
		//echo $this->db->last_query(); exit;
    }

}
