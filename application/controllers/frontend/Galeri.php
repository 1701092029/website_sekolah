<?php
class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    function index()
    {
        $x['title'] = 'Galeri';
        // $x['alb'] = $this->Admin_model->get_all_album_front();
        $jum = $this->Admin_model->jum_album();

        $page = $this->uri->segment(4);



        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 15;
        $config['base_url'] = base_url() . 'frontend/Galeri/album/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] = $this->pagination->create_links();
        $x['data'] = $this->Admin_model->get_all_album_front($limit, $offset);

        $x['all_galeri'] = $this->Admin_model->get_all_galeri_front();
        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_galeri', $x);
        $this->load->view('Frontend/Template/footer');
    }
    function album()
    {
        $x['title'] = 'Galeri';

        if (isset($_GET['kode_album'])) :
            $idalbum = $_GET['kode_album'];
        else :
            $idalbum = "";
        endif;

        // var_dump($x1);
        $jum = $this->Admin_model->jum_album();
        $page = $this->uri->segment(4);
        // var_dump($page);
        // die;


        if ($page == null) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 15;
        $config['base_url'] = base_url() . 'frontend/Galeri/album/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] = $this->pagination->create_links();
        $x['album'] = $this->Admin_model->get_all_album_front($limit, $offset);
        $x['galeri'] = $this->Admin_model->get_galeri_by_album_id_front($idalbum);
        // var_dump($x1);
        // die;




        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_album', $x);
        $this->load->view('Frontend/Template/footer');
    }
}
