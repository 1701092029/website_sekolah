<?php
class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    function index()
    {
        $x['title'] = 'Guru';
        $keyword = str_replace("'", "", $this->input->post('keyword_berita'));
        if ($keyword) {
            $data['keyword_berita'] = $this->input->post('keyword_berita');

            $this->session->set_userdata('keyword_berita', $data['keyword_berita']);
        } else {
            $data['keyword_berita'] = "";
        }

        // var_dump($data['keyword_berita']);
        // $data['keyword_berita'] = "setiadi";
        $jum = $this->Admin_model->guru();
        $page = $this->uri->segment(4);

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        // var_dump($offset);
        // die;
        $limit = 7;
        $config['base_url'] = base_url() . 'frontend/guru/index';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] = $this->pagination->create_links();
        $x['data'] = $this->Admin_model->guru_perpage($limit, $offset, $data['keyword_berita']);

        // var_dump($x1);
        // die;
        //$x['brt']=$this->berita->beritaasc();
        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_guru', $x);
        $this->load->view('Frontend/Template/footer');
    }
}
