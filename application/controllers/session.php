<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');

	}
	public function index()
	{	
	$this->session->set_userdata('my_name','Basheer');
	$this->session->set_userdata('address','Nellore');
	$this->session->sess_expiration = '10';

	 $this->load->view('session');
	}
	public function my_name()
	{
	$this->load->view('my_name');
	}
}
