<?php
class Photos extends CI_Controller
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

        $data['title'] = 'Photos';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['photos'] = $this->Admin_model->get_all_photos();
        $data['album'] = $this->Admin_model->get_all_album();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/photos/index');
        $this->load->view('backend/template/footer');
    }
    function tambah()
    {

        $data['title'] = 'Photos';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $config['upload_path'] = './assets/images/album/galeri/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/album/galeri/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 500;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/album/galeri/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $judul = strip_tags($this->input->post('xjudul'));
                $album = strip_tags($this->input->post('xalbum'));
                $data = array(
                    'galeri_judul' => $judul,
                    'galeri_album_id' => $album,
                    'galeri_pengguna_id' => $data['user']['id'],
                    'galeri_author' => $data['user']['nama'],
                    'galeri_gambar' => $gambar

                );
                $this->db->insert('tbl_galeri', $data);

                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/list-photos');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-photos');
            }
        } else {
            redirect('admin/list-photos');
        }
    }

    function edit()
    {

        $data['title'] = 'Photos';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $config['upload_path'] = './assets/images/album/galeri/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/album/galeri/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 500;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/album/galeri/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $galeri_id = $this->input->post('kode');
                $judul = strip_tags($this->input->post('xjudul'));
                $album = strip_tags($this->input->post('xalbum'));
                $images = $this->input->post('gambar');
                $path = './assets/images/album/galeri/' . $images;
                unlink($path);

                $data = array(
                    'galeri_judul' => $judul,
                    'galeri_album_id' => $album,
                    'galeri_pengguna_id' => $data['user']['id'],
                    'galeri_author' => $data['user']['nama'],
                    'galeri_gambar' => $gambar

                );
                $this->db->where('galeri_id', $galeri_id);
                $this->db->update('tbl_galeri', $data);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/list-photos');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-photos');
            }
        } else {
            $galeri_id = $this->input->post('kode');
            $judul = strip_tags($this->input->post('xjudul'));
            $album = strip_tags($this->input->post('xalbum'));

            $data = array(
                'galeri_judul' => $judul,
                'galeri_album_id' => $album,
                'galeri_pengguna_id' => $data['user']['id'],
                'galeri_author' => $data['user']['nama']

            );
            $this->db->where('galeri_id', $galeri_id);
            $this->db->update('tbl_galeri', $data);
            echo $this->session->set_flashdata('msg', 'info');
            redirect('admin/list-photos');
        }
    }

    public function hapus()
    {

        $kode = $this->input->post('kode');
        // $album = $this->input->post('album');
        $gambar = $this->input->post('gambar');
        $path = './assets/images/album/galeri/' . $gambar;
        unlink($path);
        $this->db->where('galeri_id', $kode);
        $this->db->delete('tbl_galeri');
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/list-photos');
    }
}
