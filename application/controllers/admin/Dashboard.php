<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('admin/dashboard_model');
		isUserLogin();
    }
	
	public function index(){
		$this->data['activeClass']			= 'dashboard';
		$this->data['totalUsers']			= $this->dashboard_model->getTotalUsers();
		$this->data['totalTransactions']	= $this->dashboard_model->getTotalTransactions();
		$this->data['totalApis']			= $this->dashboard_model->getTotalApis();
		
		/*echo $currentDate = date('Y-m-d', strtotime("-1 days")).'<br>';
		echo $currentDate = date('Y-m-d').'<br>';
		echo $lastWeekDate = date('Y-m-d', strtotime("-7 days"));
		exit;*/
		//All Time Transactions History
		//$this->data['allTransactions']	= $this->dashboard_model->getAllTimeTransactions('approved');
		
		/*$this->data['approvedBalance']	= $this->dashboard_model->countTotalBalance('approved');
		$this->data['pendingBalance']	= $this->dashboard_model->countTotalBalance('pending');
		$this->data['declinedBalance']	= $this->dashboard_model->countTotalBalance('error');
		$this->data['expiredBalance']	= $this->dashboard_model->countTotalBalance('expired');
		$this->data['rejectedBalance']	= $this->dashboard_model->countTotalBalance('rejected');
		$this->data['refundedBalance']	= $this->dashboard_model->countTotalBalance('refunded');*/
		//getPrint($this->data['totalBalance']); exit;
		$this->data['contents']		= 'admin/dashboard';
		$this->load->view('template', $this->data);
	}
	
}
