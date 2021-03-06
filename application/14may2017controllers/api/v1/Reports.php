<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';


class Reports extends REST_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->library('format');
    }

    public function get_registration_by_confirmation_id_get() {
        //$this->output->enable_profiler(TRUE);
        //$apiKey       = $this->input->get('api_key', TRUE);
        $reportFormat = $this->input->get('format', TRUE);
		$apiKey       = $this->input->get('api_key');
		$salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);
		// If an error occurred, then fall back to the previous method
		if ($salt === FALSE){
			$salt = hash('sha256', time() . mt_rand());
		}
		$new_key = substr($salt, 0, 40);
		
		$response = array(
			'status'  => 'error',
			'format'  => $reportFormat,
			'api_key' => $apiKey,
			'message' => 'Invalid Api Key.'
			);
  		//echo 'i am here'; exit;
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function upsert_report_post(){
        $name = $this->post('name');
		$email = $this->post('email');
		$apiKey       = $this->post('api_key', TRUE);
        $message = array(
            'id' => 100, // Automatically generated by the model
            'name' => $name,
            'email' => $email,
			'api_key' => $apiKey,
            'message' => 'Added a resource'
        );

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }



}
