<?php
class Agenda extends CI_Controller
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

        $data['title'] = 'Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['agenda'] = $this->Admin_model->get_all_agenda();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/agenda/index');
        $this->load->view('backend/template/footer');
    }

    function tambah()
    {

        $data['title'] = 'Agenda';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nama_agenda = strip_tags($this->input->post('xnama_agenda'));
        $deskripsi = $this->input->post('xdeskripsi');
        $mulai = $this->input->post('xmulai');
        $selesai = $this->input->post('xselesai');
        $tempat = $this->input->post('xtempat');
        $waktu = $this->input->post('xwaktu');
        $keterangan = $this->input->post('xketerangan');

        $data = [
            "agenda_nama" => $nama_agenda,
            "agenda_deskripsi" => $deskripsi,
            "agenda_mulai" => $mulai,
            "agenda_selesai" => $selesai,
            "agenda_tempat" => $tempat,
            "agenda_waktu" => $waktu,
            "agenda_keterangan" => $keterangan,
            "agenda_author" => $data['user']['nama']
        ];
        $this->db->insert('tbl_agenda', $data);
        $this->session->set_flashdata('msg', 'success');
        redirect('admin/Agenda/index');
    }


    function edit()
    {

        $data['title'] = 'Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_agenda = strip_tags($this->input->post('id_agenda'));
        $nama_agenda = strip_tags($this->input->post('xnama_agenda'));
        $deskripsi = $this->input->post('xdeskripsi');
        $mulai = $this->input->post('xmulai');
        $selesai = $this->input->post('xselesai');
        $tempat = $this->input->post('xtempat');
        $waktu = $this->input->post('xwaktu');
        $keterangan = $this->input->post('xketerangan');

        $data = [
            "agenda_nama" => $nama_agenda,
            "agenda_deskripsi" => $deskripsi,
            "agenda_mulai" => $mulai,
            "agenda_selesai" => $selesai,
            "agenda_tempat" => $tempat,
            "agenda_waktu" => $waktu,
            "agenda_keterangan" => $keterangan,
            "agenda_author" => $data['user']['nama']
        ];
        $this->db->where('agenda_id', $id_agenda);
        $this->db->update('tbl_agenda', $data);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/Agenda/index');
    }

    public function hapus()
    {
        $id_agenda = $this->input->post('id_agenda', true);
        $this->db->where('agenda_id', $id_agenda);
        $this->db->delete('tbl_agenda');
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/Agenda/index');
    }
}
