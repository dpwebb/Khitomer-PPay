<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khitomerapi extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('admin/khitomerapi_model');
		$this->data['activeClass']	= 'api';
		isUserLogin();
    }
	
	public function index(){
		if($this->uri->segment(4)!='')
			$this->data['parentId'] = $this->uri->segment(4);
		else
			$this->data['parentId'] = 0;
			
		$this->data['apiListing']	= $this->khitomerapi_model->getAllApi($this->data['parentId']);
		//getPrint($this->data['usersListing']->result()); exit;
		$this->data['contents']		= 'admin/api/list';
		$this->load->view('template', $this->data);
	}
	
	public function updatestatus(){
		$parentId	= $this->uri->segment(4);
		$status		= $this->uri->segment(5);
		$apiID		= $this->uri->segment(6);
		$updateApi['api_status'] = $status;
		$this->common_model->updateData('khitomer_api', $updateApi, array('api_id'=>$apiID));
		if($status==1)
			$this->session->set_flashdata('message', 'Api has been Enabled.');
		else
			$this->session->set_flashdata('message', 'Api has been Disabled.');
		redirect('admin/khitomerapi/index/'.$parentId);
	}
	public function addapi(){
		$this->data['parentId'] = $parentId = $this->uri->segment(4);
		
		$this->data['currency']	= getCurrencyList();
			
		$this->form_validation->set_rules('api_type', 'Api Type', 'trim|required');
		$this->form_validation->set_rules('api_currency', 'Api Default Currency', 'trim|required');
		$this->form_validation->set_rules('api_name', 'Api Name', 'trim|required');
		$this->form_validation->set_rules('api_mode', 'Api Mode', 'trim|required');
		$this->form_validation->set_rules('api_sandbox_url', '', '');
		$this->form_validation->set_rules('api_sandbox_user', '', '');
		$this->form_validation->set_rules('api_sandbox_key', '', '');
		$this->form_validation->set_rules('api_live_url', '', '');
		$this->form_validation->set_rules('api_live_user', '', '');
		$this->form_validation->set_rules('api_live_key', '', '');
		$this->form_validation->set_rules('api_sort_order', 'Sorting Order', 'trim|required');
		$this->form_validation->set_rules('response_code', 'Processor Response Code', 'trim|required');
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/api/addapi';
			$this->load->view('template', $this->data);
		}else{
			$insertData['api_type']				= $this->input->post('api_type');
			$insertData['api_name']				= $this->input->post('api_name');
			$insertData['api_mode']				= $this->input->post('api_mode');
			$insertData['api_sandbox_url']		= $this->input->post('api_sandbox_url');
			$insertData['api_sandbox_user']		= $this->input->post('api_sandbox_user');
			$insertData['api_sandbox_key']		= $this->input->post('api_sandbox_key');
			$insertData['api_live_url']			= $this->input->post('api_live_url');
			$insertData['api_live_user']		= $this->input->post('api_live_user');
			$insertData['api_live_key']			= $this->input->post('api_live_key');
			$insertData['api_sort_order']		= $this->input->post('api_sort_order');
			$insertData['response_code']		= $this->input->post('response_code');
			$insertData['api_status']			= 1;
			$insertData['parent_id']			= $this->data['parentId'];
			$insertData['api_currency']			= $this->input->post('api_currency');
			$insertData['date_created']			= date('Y-m-d H:i:s');
			
			$this->common_model->insertData('khitomer_api', $insertData);
			$this->session->set_flashdata('message', 'New Api has been added successfully.');
			redirect('admin/khitomerapi/index/'.$parentId);
		}
	}
	public function editapi(){
		$this->data['parentId'] = $parentId = $this->uri->segment(4);
		$this->data['apiID']	= $apiID	= $this->uri->segment(5);
		$this->data['ApiInfo']	= $this->common_model->getDetailInfo('khitomer_api', 'api_id='.$apiID);
		
		$this->data['currency']	= getCurrencyList();
		
		//getPrint($this->data['ApiInfo']);exit;
		$this->form_validation->set_rules('api_type', 'Api Type', 'trim|required');
		$this->form_validation->set_rules('api_currency', 'Api Default Currency', 'trim|required');
		$this->form_validation->set_rules('api_name', 'Api Name', 'trim|required');
		$this->form_validation->set_rules('api_mode', 'Api Mode', 'trim|required');
		$this->form_validation->set_rules('api_sandbox_url', '', '');
		$this->form_validation->set_rules('api_sandbox_user', '', '');
		$this->form_validation->set_rules('api_sandbox_key', '', '');
		$this->form_validation->set_rules('api_live_url', '', '');
		$this->form_validation->set_rules('api_live_user', '', '');
		$this->form_validation->set_rules('api_live_key', '', '');
		$this->form_validation->set_rules('api_sort_order', 'Sorting Order', 'trim|required');
		$this->form_validation->set_rules('response_code', 'Processor Response Code', 'trim|required');
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/api/editapi';
			$this->load->view('template', $this->data);
		}else{
			$updateData['api_type']				= $this->input->post('api_type');
			$updateData['api_name']				= $this->input->post('api_name');
			$updateData['api_mode']				= $this->input->post('api_mode');
			$updateData['api_sandbox_url']		= $this->input->post('api_sandbox_url');
			$updateData['api_sandbox_user']		= $this->input->post('api_sandbox_user');
			$updateData['api_sandbox_key']		= $this->input->post('api_sandbox_key');
			$updateData['api_live_url']			= $this->input->post('api_live_url');
			$updateData['api_live_user']		= $this->input->post('api_live_user');
			$updateData['api_live_key']			= $this->input->post('api_live_key');
			$updateData['api_sort_order']		= $this->input->post('api_sort_order');
			$updateData['response_code']		= $this->input->post('response_code');
			$updateData['api_currency']			= $this->input->post('api_currency');
			
			$this->common_model->updateData('khitomer_api', $updateData, array('api_id'=>$apiID));
			$this->session->set_flashdata('message', 'Api Information has been updated.');
			redirect('admin/khitomerapi/index/'.$parentId);
		}
	}
	
}
