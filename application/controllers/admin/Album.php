<?php
class Album extends CI_Controller
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

        $data['title'] = 'Album';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['album'] = $this->Admin_model->get_all_album();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/album/index');
        $this->load->view('backend/template/footer');
    }
    function tambah()
    {

        $data['title'] = 'Album';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['album'] = $this->Admin_model->get_all_album();

        $config['upload_path'] = './assets/images/album/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/album' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 500;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/album/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $album = strip_tags($this->input->post('xnama_album'));

                $data = array(
                    'album_nama' => $album,
                    'album_cover' => $gambar,
                    'album_pengguna_id' => $data['user']['id'],
                    'album_author' => $data['user']['nama']

                );
                $this->db->insert('tbl_album', $data);

                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/list-album');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-album');
            }
        } else {
            redirect('admin/list-album');
        }
    }

    function edit()
    {

        $data['title'] = 'Album';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['album'] = $this->Admin_model->get_all_album();

        $config['upload_path'] = './assets/images/album/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/album/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 500;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/album/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $album_id = $this->input->post('kode');
                $album_nama = strip_tags($this->input->post('xnama_album'));
                $images = $this->input->post('gambar');
                $path = './assets/images/album/' . $images;
                unlink($path);
                $data = array(
                    'album_nama' => $album_nama,
                    'album_cover' => $gambar,
                    'album_pengguna_id' => $data['user']['id'],
                    'album_author' => $data['user']['nama']
                );
                $this->db->where('album_id', $album_id);
                $this->db->update('tbl_album', $data);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/list-album');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-album');
            }
        } else {
            $album_id = $this->input->post('kode');
            $album_nama = strip_tags($this->input->post('xnama_album'));
            $data = array(
                'album_nama' => $album_nama,
                'album_pengguna_id' => $data['user']['id'],
                'album_author' => $data['user']['nama']
            );
            $this->db->where('album_id', $album_id);
            $this->db->update('tbl_album', $data);
            echo $this->session->set_flashdata('msg', 'info');
            redirect('admin/list-album');
        }
    }

    public function hapus()
    {

        $kode = $this->input->post('kode');
        $gambar = $this->input->post('gambar');
        $path = './assets/images/album/' . $gambar;
        unlink($path);
        $this->db->where('album_id', $kode);
        $this->db->delete('tbl_album');
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/album');
    }
}
