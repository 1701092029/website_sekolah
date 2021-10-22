<?php
class Download extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('download');
    }
    function index()
    {
        $x['title'] = 'Download';
        $keyword = str_replace("'", "", $this->input->post('keyword_berita'));
        if ($keyword) {
            $data['keyword_berita'] = $this->input->post('keyword_berita');

            $this->session->set_userdata('keyword_berita', $data['keyword_berita']);
        } else {
            $data['keyword_berita'] = "";
        }



        $jum = $this->Admin_model->get_all_files();
        $page = $this->uri->segment(4);

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 5;
        $config['base_url'] = base_url() . 'frontend/Download/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] = $this->pagination->create_links();
        $x['data'] = $this->Admin_model->get_all_files_front($limit, $offset, $data['keyword_berita']);
        // $x['data'] = $this->Admin_model->get_all_files();
        $this->load->view('Frontend/Template/header', $x);
        $this->load->view('Frontend/v_download', $x);
        $this->load->view('Frontend/Template/footer');
    }

    function get_file()
    {
        $id = $this->uri->segment(3);
        $get_db = $this->m_files->get_file_byid($id);
        $q = $get_db->row_array();
        $file = $q['file_data'];
        $path = './assets/files/' . $file;
        $data =  file_get_contents($path);
        $name = $file;

        force_download($name, $data);
    }
}
