<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        // $this->load->model('Frontend_model');
    }
    function index()
    {

        redirect('home');
    }
}
