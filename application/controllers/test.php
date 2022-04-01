<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()  
	{
		parent::__construct();
		$this->load->model('Test_model'); 
	}

    public function index() {
        $this->test();
    }

    public function test()  {

        $this->load->view("test");
    }

}