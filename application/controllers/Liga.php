<?php

class Liga extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('DBModel');
    }

    public function index()
    {
        $data['teams'] = $this->DBModel->get_teams();
        $data['title'] = 'Fair Play LBŠ';
        $data['table5'] = $this->DBModel->get_table('table5');
        $data['table6'] = $this->DBModel->get_table('table6');
        $data['table7'] = $this->DBModel->get_table('table7');
        $data['table8'] = $this->DBModel->get_table('table8');
        $data['table9'] = $this->DBModel->get_table('table9', 7);
        $data['results5'] = $this->DBModel->get_last_results('results5')['results'];
        $data['results6'] = $this->DBModel->get_last_results('results6')['results'];
        $data['results7'] = $this->DBModel->get_last_results('results7')['results'];
        $data['results8'] = $this->DBModel->get_last_results('results8')['results'];
        $data['results9'] = $this->DBModel->get_last_results('results9')['results'];
        $data['last_mday'] = $this->DBModel->get_last_results('results5')['last_mday'];
        $data['next_fixture'] = $this->DBModel->get_next_fixture();
        $data['next_mday'] = $data['last_mday'] + 1;
        $data['not_playing'] = $this->DBModel->get_not_playing($data['last_mday'] + 1);
        $data['next_game_date'] = $this->DBModel->get_next_game_date($data['next_mday']);

        $this->load->view('header', $data);
        $this->load->view('frontPage', $data);
        $this->load->view('footer', $data);
    }

    public function raspored()
    {
        $data['title'] = 'Raspored';
        $data['match_pairs'] = $this->DBModel->get_match_pairs();

        $this->load->view('header', $data);
        $this->load->view('pairs', $data);
        $this->load->view('footer', $data);
    }

    public function rezultati()
    {
        $data['title'] = 'Rezultati';
        $data['notplaying'] = $this->DBModel->get_not_playing();
        $data['results5'] = $this->DBModel->get_results('results5');
        $data['results6'] = $this->DBModel->get_results('results6');
        $data['results7'] = $this->DBModel->get_results('results7');
        $data['results8'] = $this->DBModel->get_results('results8');
        $data['results9'] = $this->DBModel->get_results('results9');

        $this->load->view('header', $data);
        $this->load->view('results', $data);
        $this->load->view('footer', $data);
    }

}
