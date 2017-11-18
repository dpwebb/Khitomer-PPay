<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('admin/admin_model');
		isUserLogin();
    }
	
	public function index(){
		$this->data['activeClass']	= 'dashboard';
		$this->data['totalUsers']	= $this->admin_model->getTotalUsers();
		$this->data['approvedBalance']	= $this->admin_model->countTotalBalance('APPROVED');
		$this->data['pendingBalance']	= $this->admin_model->countTotalBalance('PENDING');
		$this->data['declinedBalance']	= $this->admin_model->countTotalBalance('ERROR');
		//getPrint($this->data['totalBalance']); exit;
		$this->data['contents']		= 'admin/dashboard';
		$this->load->view('template', $this->data);
	}
	
}
