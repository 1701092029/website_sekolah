<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk_petugas') != TRUE && $this->session->userdata('masuk_admin') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };

        $this->load->library('form_validation');
        $this->load->model('Admin_model');
    }
    function index()
    {
        // if ($this->session->userdata('akses') == '1') {
        //     $x['visitor'] = $this->m_pengunjung->statistik_pengujung();
        //     $this->load->view('admin/v_dashboard', $x);
        // } else {
        //     redirect('administrator');
        // }
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['visitor'] = $this->Admin_model->statistik_pengujung();


        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/dashboard/index');
        $this->load->view('backend/template/footer');
    }
}
