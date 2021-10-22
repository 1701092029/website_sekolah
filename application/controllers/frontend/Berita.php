<?php
class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    function index()
    {

        $x['title'] = 'Berita';
        $keyword = str_replace("'", "", $this->input->post('keyword_berita'));
        if ($keyword) {
            $data['keyword_berita'] = $this->input->post('keyword_berita');

            $this->session->set_userdata('keyword_berita', $data['keyword_berita']);
        } else {
            $data['keyword_berita'] = "";
        }


        $jum = $this->Admin_model->berita();
        $page = $this->uri->segment(4);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $limit = 7;
        $config['base_url'] = base_url() . 'frontend/Berita/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] = $this->pagination->create_links();
        $x['data'] = $this->Admin_model->berita_perpage($limit, $offset,  $data['keyword_berita']);
        //$x['brt']=$this->berita->beritaasc();
        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_berita', $x);
        $this->load->view('Frontend/Template/footer');
    }
    function berita_detail()
    {
        $kode = $this->uri->segment(2);
        $x['title'] = 'Berita';
        $this->db->query("UPDATE tbl_tulisan SET tulisan_views=tulisan_views+1 WHERE tulisan_id='$kode'");
        $x['data'] = $this->Admin_model->get_berita_by_kode($kode);
        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_beritadetail', $x);
        $this->load->view('Frontend/Template/footer');
    }
}
