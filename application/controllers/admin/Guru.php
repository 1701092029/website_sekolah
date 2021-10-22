<?php
class Guru extends CI_Controller
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
        $this->load->library('upload');
    }
    function index()
    {

        $data['title'] = 'Guru';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->Admin_model->get_all_guru();


        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/guru/index');
        $this->load->view('backend/template/footer');
    }
    function tambah()
    {
        $config['upload_path'] = './assets/images/guru/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/guru/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 300;
                $config['height'] = 300;
                $config['new_image'] = './assets/images/guru/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $photo = $gbr['file_name'];
                $nip = strip_tags($this->input->post('xnip'));
                $nama = strip_tags($this->input->post('xnama'));
                $jenkel = strip_tags($this->input->post('xjenkel'));
                $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
                $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
                $mapel = strip_tags($this->input->post('xmapel'));
                $data = [
                    "guru_nip" => $nip,
                    "guru_nama" => $nama,
                    "guru_jenkel" => $jenkel,
                    "guru_tmp_lahir" => $tmp_lahir,
                    "guru_tgl_lahir" => $tgl_lahir,
                    "guru_mapel" => $mapel,
                    "guru_photo" => $photo
                ];
                $this->db->insert('tbl_guru', $data);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/list-guru');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-guru');
            }
        } else {
            $nip = strip_tags($this->input->post('xnip'));
            $nama = strip_tags($this->input->post('xnama'));
            $jenkel = strip_tags($this->input->post('xjenkel'));
            $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
            $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
            $mapel = strip_tags($this->input->post('xmapel'));
            $data = [
                "guru_nip" => $nip,
                "guru_nama" => $nama,
                "guru_jenkel" => $jenkel,
                "guru_tmp_lahir" => $tmp_lahir,
                "guru_tgl_lahir" => $tgl_lahir,
                "guru_mapel" => $mapel
            ];
            $this->db->insert('tbl_guru', $data);
            echo $this->session->set_flashdata('msg', 'success');
            redirect('admin/list-guru');
        }
    }


    function edit()
    {

        $config['upload_path'] = './assets/images/guru/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/guru/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 300;
                $config['height'] = 300;
                $config['new_image'] = './assets/images/guru/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $this->input->post('gambar');
                $path = './assets/images/guru/' . $gambar;
                unlink($path);

                $photo = $gbr['file_name'];
                $kode = $this->input->post('kode');
                $nip = strip_tags($this->input->post('xnip'));
                $nama = strip_tags($this->input->post('xnama'));
                $jenkel = strip_tags($this->input->post('xjenkel'));
                $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
                $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
                $mapel = strip_tags($this->input->post('xmapel'));

                $data = [
                    "guru_nip" => $nip,
                    "guru_nama" => $nama,
                    "guru_jenkel" => $jenkel,
                    "guru_tmp_lahir" => $tmp_lahir,
                    "guru_tgl_lahir" => $tgl_lahir,
                    "guru_mapel" => $mapel,
                    "guru_photo" => $photo
                ];
                $this->db->where('guru_id', $kode);
                $this->db->update('tbl_guru', $data);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/list-guru');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/list-guru');
            }
        } else {
            $kode = $this->input->post('kode');
            $nip = strip_tags($this->input->post('xnip'));
            $nama = strip_tags($this->input->post('xnama'));
            $jenkel = strip_tags($this->input->post('xjenkel'));
            $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
            $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
            $mapel = strip_tags($this->input->post('xmapel'));
            $data = [
                "guru_nip" => $nip,
                "guru_nama" => $nama,
                "guru_jenkel" => $jenkel,
                "guru_tmp_lahir" => $tmp_lahir,
                "guru_tgl_lahir" => $tgl_lahir,
                "guru_mapel" => $mapel,
            ];
            $this->db->where('guru_id', $kode);
            $this->db->update('tbl_guru', $data);
            echo $this->session->set_flashdata('msg', 'info');
            redirect('admin/list-guru');
        }
    }

    function hapus()
    {
        $kode = $this->input->post('kode');
        $gambar = $this->input->post('gambar');
        $path = './assets/images/guru/' . $gambar;
        unlink($path);
        $this->db->where('guru_id', $kode);
        $this->db->delete('tbl_guru');
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/list-guru');
    }
}
