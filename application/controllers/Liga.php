<?php

class Liga extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('DBModel');
    }

    public function index()
    {
        $data['title'] = 'Fair Play LBŠ';
        $data['table5'] = $this->DBModel->get_table('table5');
        $data['table6'] = $this->DBModel->get_table('table6');
        $data['table7'] = $this->DBModel->get_table('table7');
        $data['table8'] = $this->DBModel->get_table('table8');
        $data['table9'] = $this->DBModel->get_table('table9', 7);

        $this->load->view('header', $data);
        $this->load->view('frontPage', $data);
        $this->load->view('footer', $data);
    }

    public function raspored()
    {
        $data['match_pairs'] = $this->DBModel->get_match_pairs();
        $this->load->view('pairs', $data);
    }
    
    public function rezultati()
    {
        $data['notplaying'] = $this->DBModel->get_not_playing();
        $data['results5'] = $this->DBModel->get_results('results5');
        $data['results6'] = $this->DBModel->get_results('results6');
        $data['results7'] = $this->DBModel->get_results('results7');
        $data['results8'] = $this->DBModel->get_results('results8');
        $data['results9'] = $this->DBModel->get_results('results9');
        $this->load->view('results', $data);
    }

}
