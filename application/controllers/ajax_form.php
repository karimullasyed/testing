<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');

	}
	public function index()
	{
	 $this->load->view('ajax_form');
	}
	public function getdata()
	{
		echo "Hii";
	}
	public function exist_mobile()
	{
		$mob_no = $this->input->get('mob_no');
		echo $mob_no;die;
		$this->ajax_model->mobile_check($mob_no);
	}
	
}
