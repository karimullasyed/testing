<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function email()
	{
		$config=array(	
						'protocal' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => '465',						
						'smtp_user' => 'karimullasyed@notionpress.com',
						'smtp_pass' => 'KariM@1018'
						);
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('karimullasyed@notionpress.com','My_Practice');
		$this->email->to('karimullasyed@notionpress.com');
		$this->email->subject('Testing');
		$this->email->message('This is my first email');
		
		if($this->email->send())
		{
			echo "Your email have been sent successfully";
		}
		else
		{
			echo 'Sorry';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */