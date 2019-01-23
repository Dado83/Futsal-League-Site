<?php

class Liga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('DBModel');
    }

    public function index()
    {
        $data['title'] = 'Fair Play LBŠ';
        $data['teams'] = $this->DBModel->getTeams();
        $data['table5'] = $this->DBModel->getTable('table5');
        $data['table6'] = $this->DBModel->getTable('table6');
        $data['table7'] = $this->DBModel->getTable('table7');
        $data['table8'] = $this->DBModel->getTable('table8');
        $data['table9'] = $this->DBModel->getTable('table9', 7);
        $data['results5'] = $this->DBModel->getLastResults('results5')['results'];
        $data['results6'] = $this->DBModel->getLastResults('results6')['results'];
        $data['results7'] = $this->DBModel->getLastResults('results7')['results'];
        $data['results8'] = $this->DBModel->getLastResults('results8')['results'];
        $data['results9'] = $this->DBModel->getLastResults('results9')['results'];
        $data['lastMday'] = $this->DBModel->getLastResults('results5')['lastMday'];
        $data['nextFixture'] = $this->DBModel->getNextFixture();
        $data['nextMday'] = $data['lastMday'] + 1;
        $data['notPlaying'] = $this->DBModel->getNotPlaying($data['lastMday'] + 1);
        $data['nextGameDate'] = $this->DBModel->getNextGameDate($data['nextMday']);

        $this->load->view('header', $data);
        $this->load->view('frontPage', $data);
        $this->load->view('footer', $data);
    }

    public function raspored()
    {
        $data['title'] = 'Raspored';
        $data['matchPairs'] = $this->DBModel->getMatchPairs();
        $data['teams'] = $this->DBModel->getTeams();
        $data['notPlaying'] = $this->DBModel->getNotPlaying();

        $this->load->view('header', $data);
        $this->load->view('pairs', $data);
        $this->load->view('footer', $data);
    }

    public function rezultati()
    {
        $data['title'] = 'Rezultati';
        $data['teams'] = $this->DBModel->getTeams();
        $data['notplaying'] = $this->DBModel->getNotPlaying();
        $data['results5'] = $this->DBModel->getResults('results5');
        $data['results6'] = $this->DBModel->getResults('results6');
        $data['results7'] = $this->DBModel->getResults('results7');
        $data['results8'] = $this->DBModel->getResults('results8');
        $data['results9'] = $this->DBModel->getResults('results9');

        $this->load->view('header', $data);
        $this->load->view('results', $data);
        $this->load->view('footer', $data);
    }

    public function admin()
    {
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();
        $data['results'] = $this->DBModel->getResults('results7');
        $data['lastMday'] = $this->DBModel->getLastResults('results5')['lastMday'];

        $this->load->view('header', $data);
        $this->load->view('admin', $data);
    }

    public function form($id)
    {
        $this->load->helper('form');
        $data['title'] = 'Unos kola';
        $data['teams'] = $this->DBModel->getTeams();
        $data['game'] = $this->DBModel->getGameByID($id);
        $data['lastMday'] = $this->DBModel->getLastResults('results5')['lastMday'];

        $this->load->view('header', $data);
        if ($data['lastMday'] >= $data['game']->m_day) {
            $this->load->view('gameUpdate', $data);
        } else {
            $this->load->view('gameInput', $data);
        }
    }

    public function unosKola()
    {
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();

        $m_day = $this->input->post('mday');

        $home = $this->input->post('home');
        $away = $this->input->post('away');
        $home_id = $this->input->post('homeID');
        $away_id = $this->input->post('awayID');

        $home9 = $this->input->post('home9');
        $away9 = $this->input->post('away9');
        $home8 = $this->input->post('home8');
        $away8 = $this->input->post('away8');
        $home7 = $this->input->post('home7');
        $away7 = $this->input->post('away7');
        $home6 = $this->input->post('home6');
        $away6 = $this->input->post('away6');
        $home5 = $this->input->post('home5');
        $away5 = $this->input->post('away5');

        $this->DBModel->insertGame('results5', 'table5', $m_day, $home, $home_id, $away, $away_id, $home5, $away5);
        $this->DBModel->insertGame('results6', 'table6', $m_day, $home, $home_id, $away, $away_id, $home6, $away6);
        $this->DBModel->insertGame('results7', 'table7', $m_day, $home, $home_id, $away, $away_id, $home7, $away7);
        $this->DBModel->insertGame('results8', 'table8', $m_day, $home, $home_id, $away, $away_id, $home8, $away8);
        $this->DBModel->insertGame('results9', 'table9', $m_day, $home, $home_id, $away, $away_id, $home9, $away9);

        $this->load->view('header', $data);
        $this->load->view('dbSuccess', $data);
    }

    public function ispravkaKola()
    {
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();
        $data['matchPairs'] = $this->DBModel->getMatchPairs();
        $data['lastMday'] = $this->DBModel->getLastResults('results5')['lastMday'];

        $this->load->view('header', $data);
        $this->load->view('admin', $data);
    }

    public function brisanjeKola($id)
    {
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();

        $this->DBModel->deleteGame('results5', 'table5', $id);
        $this->DBModel->deleteGame('results6', 'table6', $id);
        $this->DBModel->deleteGame('results7', 'table7', $id);
        $this->DBModel->deleteGame('results8', 'table8', $id);
        $this->DBModel->deleteGame('results9', 'table9', $id);
    }

}
