<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index() {
        $this->load->view('templates_beranda/nav');
        $this->load->view('index');
        $this->load->view('templates_beranda/footer');
    }

}