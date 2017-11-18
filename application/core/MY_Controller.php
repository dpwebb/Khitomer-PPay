<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

}

// customer common class
class Public_controller extends MY_Controller
{
    public $data;
    public function __construct(){
        parent::__construct();
		$this->data['activeClass']	= 'dashboard';
        //load model
        $this->load->model('common_model');
		$this->load->helper('authentication');
		
        /** Basic Site Informations * */
        $this->data['site_name']		= 'Khitomer Consultancy Limited.';
        $this->data['support_email']	= 'admin@khitomer.ca';
        $this->data['no_reply_email'] 	= 'no-reply@khitomer.ca';

        /** Seo Title, keywords for site * */
        $this->data['meta_title']		= 'Khitomer Consultancy Limited &#8211; Exceptional Service!';
    }
	
	public function sendEmail($templateFileName, $subjectTitle, $emailData, $fromName, $fromEmail, $toEmail){
		/*ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		echo '<pre>';
		print_r($templateFileName);
		echo '</pre>';*/
		
		$template = $this->load->view('emails/'.$templateFileName, $emailData, true);
		$this->phpmailer->From = $fromEmail;
		$this->phpmailer->FromName = $fromName;
		$this->phpmailer->AddAddress($toEmail);
		$this->phpmailer->IsHTML(true);
		$this->phpmailer->Subject = $subjectTitle;
		$this->phpmailer->Body = $template;
		$this->phpmailer->Send();
		$this->phpmailer->ClearAddresses();
		return true;
	}
	
	public function pagination_conf($page, $url, $totalrows, $uriSegment = 4, $perpage = 50, $num_links = 6){

        if ($page > $totalrows)
        {
            $page = $totalrows - $perpage;
            redirect("$url/$page");
        }

        $config = array(
            'base_url' => $url,
            'total_rows' => $totalrows,
            'per_page' => $perpage,
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="javascript:void(0)">',
            'cur_tag_close' => '</a></li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'first_link' => false,
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_link' => false,
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_link' => 'Next',
            'prev_link' => 'Previous',
            'num_links' => $num_links,
            'uri_segment' => $uriSegment
        );

        $this->pagination->initialize($config);
    }
	
}
