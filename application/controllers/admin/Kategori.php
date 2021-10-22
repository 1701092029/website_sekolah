<?php
class Kategori extends CI_Controller
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
        $data['title'] = 'Berita';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->Admin_model->get_all_kategori();



        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/berita/kategori/index');
        $this->load->view('backend/template/footer');
    }

    function tambah()
    {

        $data['title'] = 'Berita';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nama = $this->input->post('namakategori', true);

        $data = [
            "kategori_nama" => $nama,
        ];
        $this->db->insert('tbl_kategori', $data);
        $this->session->set_flashdata('msg', 'success');
        redirect('admin/Kategori/index');
    }

    function edit()
    {

        $data['title'] = 'Berita';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_kategori = $this->input->post('id_kategori', true);
        $nama_kategori = $this->input->post('namakategori', true);

        $data = [
            "kategori_nama" => $nama_kategori,
        ];
        $this->db->where('kategori_id', $id_kategori);
        $this->db->update('tbl_kategori', $data);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/Kategori/index');
    }

    public function hapus()
    {
        $id_kategori = $this->input->post('kategori_id', true);
        $this->db->where('kategori_id', $id_kategori);
        $this->db->delete('tbl_kategori');
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/Kategori/index');
    }
}
