<?php
class Pengguna extends CI_Controller
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

        $data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->get_all_pengguna();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/admin/pengguna/index');
        $this->load->view('backend/template/footer');
    }

    function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengguna';
        $nama = $this->input->post('xnama');
        $jekel = $this->input->post('xjenkel');
        $username = $this->input->post('xusername');
        $password = $this->input->post('xpassword');
        $konfirm_password = $this->input->post('xpassword2');
        $email = $this->input->post('xemail');
        $nohp = $this->input->post('xkontak');
        $level = $this->input->post('xlevel');
        $active = $this->input->post('xactive');
        $image = 'default.png';
        if ($password <> $konfirm_password) {
            echo $this->session->set_flashdata('msg', 'error');
            redirect('admin/pengguna');
        } else {

            $data = [
                "nama" => $nama,
                "jekel" => $jekel,
                "email" => $email,
                "no_telp" => $nohp,
                "username" => $username,
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "role_id" => $level,
                "is_active" => $active,
                "image" => $image
            ];
            $this->db->insert('user', $data);
            echo $this->session->set_flashdata('msg', 'success');
            redirect('admin/pengguna');
        }

        echo $this->session->set_flashdata('msg', 'warning');
        redirect('admin/pengguna');
    }
    function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengguna';
        $nama = $this->input->post('xnama');
        $jekel = $this->input->post('xjenkel');
        $username = $this->input->post('xusername');
        $password = $this->input->post('xpassword');
        $konfirm_password = $this->input->post('xpassword2');
        $email = $this->input->post('xemail');
        $nohp = $this->input->post('xkontak');
        $level = $this->input->post('xlevel');
        $active = $this->input->post('xactive');
        $id_pengguna = $this->input->post('kode');

        if ($password <> $konfirm_password) {
            echo $this->session->set_flashdata('msg', 'error');
            redirect('admin/pengguna');
        } else {

            $data = [
                "nama" => $nama,
                "jekel" => $jekel,
                "email" => $email,
                "no_telp" => $nohp,
                "username" => $username,
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "role_id" => $level,
                "is_active" => $active,

            ];
            $this->db->where('id', $id_pengguna);
            $this->db->update('user', $data);
            echo $this->session->set_flashdata('msg', 'success');
            redirect('admin/pengguna');
        }

        echo $this->session->set_flashdata('msg', 'warning');
        redirect('admin/pengguna');
    }


    function hapus()
    {
        $data['title'] = 'Pengguna';
        $kode = $this->input->post('kode');
        $this->db->where('id', $kode);
        $this->db->delete('user');
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/pengguna');
    }

    function reset($id)
    {

        $id = $this->uri->segment(3);
        $get = $this->db->get_where('user', ['id' => $id]);
        if ($get->num_rows() > 0) {
            $a = $get->row_array();
            $b = $a['email'];
            // var_dump($b);
            // die;
        }
        $pass = rand(123456, 999999);

        $data = [
            "password" => password_hash($pass, PASSWORD_DEFAULT)
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        echo $this->session->set_flashdata('msg', 'show-modal');
        echo $this->session->set_flashdata('uname', $b);
        echo $this->session->set_flashdata('upass', $pass);
        redirect('admin/pengguna');
    }
}
