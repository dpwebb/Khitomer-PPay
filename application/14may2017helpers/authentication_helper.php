<?php

/* -----------user authenticaion function goes here----------------- */
function isUserLogin(){
	$CI = & get_instance();
    if ($CI->session->userdata('userlogin')!=true){
        redirect('users/signin');
    }
}

//when user is login, redirect to dashboard
function loginUser(){
	$CI = & get_instance();
    if ($CI->session->userdata('userlogin')==true){
		if($CI->session->userdata('userType')=='admin')
        	redirect('admin/dashboard');
		else
			redirect('users/transactions');
    }
}
