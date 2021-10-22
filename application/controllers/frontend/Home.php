<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        // $this->load->model('Frontend_model');
    }
    function index()
    {

        $user_ip = $_SERVER['REMOTE_ADDR'];
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Other';
        }
        $cek_ip = $this->Admin_model->cek_ip($user_ip);
        $cek = $cek_ip->num_rows();
        $x['title'] = 'Home';


        if ($cek > 0) {
            $x['galeri'] = $this->Admin_model->get_galeri_home();
            $x['brt'] = $this->Admin_model->get_berita_slider();
            $x['berita'] = $this->Admin_model->get_berita_home();
            $x['pengumuman'] = $this->Admin_model->get_pengumuman_home();
            $x['agenda'] = $this->Admin_model->get_agenda_home();
            $x['download'] = $this->Admin_model->get_files_home();
            $this->load->view('Frontend/Template/header', $x);
            $this->load->view('Frontend/v_home');
            $this->load->view('Frontend/Template/footer');
        } else {
            $this->Admin_model->simpan_user_agent($user_ip, $agent);
            $x['galeri'] = $this->Admin_model->get_galeri_home();
            $x['brt'] = $this->Admin_model->get_berita_slider();
            $x['berita'] = $this->Admin_model->get_berita_home();
            $x['pengumuman'] = $this->Admin_model->get_pengumuman_home();
            $x['agenda'] = $this->Admin_model->get_agenda_home();
            $x['download'] = $this->Admin_model->get_files_home();
            // $this->load->view('Frontend/Template/header');
            // $this->load->view('Frontend/v_home');
            // $this->load->view('Frontend/Template/footer');
        }
    }
}
