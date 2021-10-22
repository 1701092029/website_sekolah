<?php
class Download extends CI_Controller
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
        $this->load->helper('download');
    }
    function index()
    {

        $data['title'] = 'Download';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['download'] = $this->Admin_model->get_all_download();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/download/index');
        $this->load->view('backend/template/footer');
    }
    function file_download($file_name)
    {

        $data['title'] = 'Download';
        $get_db = $this->Admin_model->get_file_byid($file_name);
        $q = $get_db->row_array();
        $file = $q['file_data'];
        $path = './assets/files/' . $file;
        $data =  file_get_contents($path);
        $name = $file;

        force_download($name, $data);
        redirect('admin/files');
    }

    function tambah()
    {

        $config['upload_path'] = './assets/files/'; //path folder
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $file = $gbr['file_name'];
                $judul = strip_tags($this->input->post('xjudul'));
                $deskripsi = $this->input->post('xdeskripsi');
                $oleh = strip_tags($this->input->post('xoleh'));

                $data = array(
                    'file_judul' => $judul,
                    'file_deskripsi' => $deskripsi,
                    'file_oleh' => $oleh,
                    'file_data' => $file
                );
                $this->db->insert('tbl_files', $data);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/list-download');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-download');
            }
        } else {
            redirect('admin/list-download');
        }
    }


    function edit()
    {

        $config['upload_path'] = './assets/files/'; //path folder
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $file = $gbr['file_name'];
                $kode = $this->input->post('kode');
                $judul = strip_tags($this->input->post('xjudul'));
                $deskripsi = $this->input->post('xdeskripsi');
                $oleh = strip_tags($this->input->post('xoleh'));
                $data = $this->input->post('file');
                $path = './assets/files/' . $data;
                unlink($path);
                // $this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $file);
                $data = array(
                    'file_judul' => $judul,
                    'file_deskripsi' => $deskripsi,
                    'file_oleh' => $oleh,
                    'file_data' => $file
                );
                $this->db->where('file_id', $kode);
                $this->db->update('tbl_files', $data);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/list-download');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-download');
            }
        } else {
            $kode = $this->input->post('kode');
            $judul = strip_tags($this->input->post('xjudul'));
            $deskripsi = $this->input->post('xdeskripsi');
            $oleh = strip_tags($this->input->post('xoleh'));
            $data = array(
                'file_judul' => $judul,
                'file_deskripsi' => $deskripsi,
                'file_oleh' => $oleh,
            );
            $this->db->where('file_id', $kode);
            $this->db->update('tbl_files', $data);
            echo $this->session->set_flashdata('msg', 'info');
            redirect('admin/list-download');
        }
    }

    public function hapus()
    {
        $kode = $this->input->post('kode');
        $data = $this->input->post('file');
        $path = './assets/files/' . $data;
        unlink($path);
        $this->db->where('file_id', $kode);
        $this->db->delete('tbl_files');
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/list-download');
    }
}
