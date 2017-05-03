<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cookies extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');

	}
	public function index()
	{	
	
	$path="<a href='my_name'>See the cookies</a>";
	 set_cookie('name',$path,'10');
	 $this->load->view('cookies');
	}
	public function my_name()
	{
	$this->load->view('my_name');
	}
}
