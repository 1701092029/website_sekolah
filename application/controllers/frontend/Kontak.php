<?php
class Kontak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    function index()
    {
        $x['title'] = 'Hubungi Kami';

        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_kontak', $x);
        $this->load->view('Frontend/Template/footer');
    }

    function kirim_pesan()
    {
        $nama = str_replace("'", "", $this->input->post('xnama', TRUE));
        $email = str_replace("'", "", $this->input->post('xemail', TRUE));
        $kontak = str_replace("'", "", $this->input->post('xkontak', TRUE));
        $pesan = str_replace("'", "", $this->input->post('xpesan', TRUE));
        $this->Admin_model->kirim_pesan($nama, $email, $kontak, $pesan);
        echo $this->session->set_flashdata('msg', '<div class="note1"><p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p></div>');
        redirect('kontak');
    }
}
