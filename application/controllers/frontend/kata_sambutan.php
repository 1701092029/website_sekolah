<?php
class Kata_sambutan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$x['title'] = 'Kata Sambutan';
		$this->load->view('Frontend/Template/header', $x);
		$this->load->view('Frontend/v_kata_sambutan');
		$this->load->view('Frontend/Template/footer');
	}
}
