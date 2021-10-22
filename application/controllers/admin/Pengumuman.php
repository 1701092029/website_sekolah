<?php
class Pengumuman extends CI_Controller
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
        $this->load->library('upload');
    }
    function index()
    {

        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->Admin_model->get_all_pengumuman();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/pengumuman/index');
        $this->load->view('backend/template/footer');
    }

    function tambah()
    {

        $data['title'] = 'Pengumuman';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $judul = strip_tags($this->input->post('xjudul'));
        $deskripsi = $this->input->post('xdeskripsi');
        $data = [
            "pengumuman_judul" => $judul,
            "pengumuman_deskripsi" => $deskripsi,
            "pengumuman_author" => $data['user']['nama']
        ];
        $this->db->insert('tbl_pengumuman', $data);
        $this->session->set_flashdata('msg', 'success');
        redirect('admin/list-pengumuman');
    }


    function edit()
    {

        $data['title'] = 'Pengumuman';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $judul = strip_tags($this->input->post('xjudul'));
        $deskripsi = $this->input->post('xdeskripsi');
        $id_pengumuman = $this->input->post('id_pengumuman');
        $data = [
            "pengumuman_judul" => $judul,
            "pengumuman_deskripsi" => $deskripsi,
            "pengumuman_author" => $data['user']['nama']
        ];

        $this->db->where('pengumuman_id', $id_pengumuman);
        $this->db->update('tbl_pengumuman', $data);
        $this->session->set_flashdata('msg', 'success');
        redirect('admin/list-pengumuman');
    }

    public function hapus()
    {
        $id_pengumuman = $this->input->post('id_pengumuman', true);
        $this->db->where('pengumuman_id', $id_pengumuman);
        $this->db->delete('tbl_pengumuman');
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/list-pengumuman');
    }
}
