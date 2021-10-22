<?php
class visi_misi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $x['title'] = 'Visi Misi';
        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_visi_misi');
        $this->load->view('Frontend/Template/footer');
    }
}
