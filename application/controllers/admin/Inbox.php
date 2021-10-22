<?php
class Inbox extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk_admin') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };

        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        // $this->load->library('upload');
    }
    function index()
    {

        $data['title'] = 'Inbox';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->get_all_inbox()->result_array();

        $this->Admin_model->update_status_kontak();


        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/inbox/index');
        $this->load->view('backend/template/footer');
    }

    function hapus()
    {
        $kode = $this->input->post('kode');
        $this->Admin_model->hapus_kontak($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');

        redirect('admin/inbox');
    }
}
