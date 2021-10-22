<?php
class Berita extends CI_Controller
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

        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Admin_model->get_all_berita();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/berita/list/index');
        $this->load->view('backend/template/footer');
    }

    function tambah()
    {

        $data['title'] = 'Berita';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/berita/list/tambah');
        $this->load->view('backend/template/footer');
    }
    function simpan()
    {
        $data['title'] = 'Berita';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $config['upload_path'] = './assets/images/berita/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/berita/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 710;
                $config['height'] = 320;
                $config['new_image'] = './assets/images/berita/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();


                $gambar = $gbr['file_name'];
                $judul = $this->input->post('judul', true);
                $isi = $this->input->post('isi', true);
                $kategori = $this->input->post('kategori', true);
                $imgslider = $this->input->post('ximgslider', true);
                $author =  $data['user']['nama'];
                $author_id =  $data['user']['id'];

                if ($imgslider == null) {
                    $imgslider = 0;
                }


                $data = array(
                    'tulisan_judul' => $judul,
                    'tulisan_isi' => $isi,
                    'tulisan_kategori_id' => $kategori,
                    'tulisan_gambar' => $gambar,
                    'tulisan_img_slider' => $imgslider,
                    'tulisan_pengguna_id' => $author_id,
                    'tulisan_author' => $author
                );
                $this->db->insert('tbl_tulisan', $data);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/list-berita');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-berita');
            }
        } else {
            redirect('admin/list-berita');
        }
    }

    function edit($id)
    {

        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Admin_model->get_all_berita_id($id);
        $data['kategori'] = $this->Admin_model->get_all_kategori();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/berita/list/edit');
        $this->load->view('backend/template/footer');
    }
    function simpanedit()
    {
        $data['title'] = 'Berita';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $config['upload_path'] = './assets/images/produk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/produk/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 710;
                $config['height'] = 320;
                $config['new_image'] = './assets/images/produk/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();


                $gambar = $gbr['file_name'];
                $judul = $this->input->post('judul', true);
                $isi = $this->input->post('isi', true);
                $kategori = $this->input->post('kategori', true);
                $imgslider = $this->input->post('ximgslider', true);
                $author =  $data['user']['nama'];
                $author_id =  $data['user']['id'];

                if ($imgslider == null) {
                    $imgslider = 0;
                }


                $data = array(
                    'tulisan_judul' => $judul,
                    'tulisan_isi' => $isi,
                    'tulisan_kategori_id' => $kategori,
                    'tulisan_gambar' => $gambar,
                    'tulisan_img_slider' => $imgslider,
                    'tulisan_pengguna_id' => $author_id,
                    'tulisan_author' => $author
                );
                $this->db->where('tulisan_id', $this->input->post('id_tulisan'));
                $this->db->update('tbl_tulisan', $data);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/list-berita');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-berita');
            }
        } else {

            $judul = $this->input->post('judul', true);
            $isi = $this->input->post('isi', true);
            $kategori = $this->input->post('kategori', true);
            $imgslider = $this->input->post('ximgslider', true);
            $author =  $data['user']['nama'];
            $author_id =  $data['user']['id'];

            if ($imgslider == null) {
                $imgslider = 0;
            }

            $data = array(
                'tulisan_judul' => $judul,
                'tulisan_isi' => $isi,
                'tulisan_kategori_id' => $kategori,
                'tulisan_img_slider' => $imgslider,
                'tulisan_pengguna_id' => $author_id,
                'tulisan_author' => $author
            );
            $this->db->where('tulisan_id', $this->input->post('id_tulisan'));
            $this->db->update('tbl_tulisan', $data);
            echo $this->session->set_flashdata('msg', 'success');

            redirect('admin/list-berita');
        }
    }

    public function hapus_berita()
    {

        $id = $this->input->post('id_tulisan');
        $gambar = $this->input->post('gambar');
        $path = './assets/images/berita/' . $gambar;
        unlink($path);
        $this->db->where('tulisan_id', $id);
        $this->db->delete('tbl_tulisan');
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/list-berita');
    }
}
