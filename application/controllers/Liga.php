<?php

class Liga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('DBModel');
        if (!$this->session->ip OR ! get_cookie('time')) {
            setcookie('time', 'expiry', time() + 600);
            $this->setSession();
            $this->DBModel->setVisitor();
        }
    }

    public function index()
    {
        $data['title'] = 'Fair Play LBŠ';
        $data['teams'] = $this->DBModel->getTeams();
        $data['table5'] = $this->DBModel->getTable('table5', TRUE);
        $data['table6'] = $this->DBModel->getTable('table6', TRUE);
        $data['table7'] = $this->DBModel->getTable('table7', TRUE);
        $data['table8'] = $this->DBModel->getTable('table8', TRUE);
        $data['table9'] = $this->DBModel->getTable('table9', TRUE, 7);
        $data['results5'] = $this->DBModel->getLastResults('results5')['results'];
        $data['results6'] = $this->DBModel->getLastResults('results6')['results'];
        $data['results7'] = $this->DBModel->getLastResults('results7')['results'];
        $data['results8'] = $this->DBModel->getLastResults('results8')['results'];
        $data['results9'] = $this->DBModel->getLastResults('results9')['results'];
        $data['lastMday'] = $this->DBModel->getLastResults('results5')['lastMday'];
        $data['nextFixture'] = $this->DBModel->getNextFixture();
        $data['nextMday'] = $data['lastMday'] + 1;
        $data['notPlaying'] = $this->DBModel->getNotPlaying($data['lastMday'] + 1);
        $data['notPlayingLastMday'] = $this->DBModel->getNotPlaying($data['lastMday']);
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

    public function login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $query = $this->DBModel->getUser($user);
        $password = ($query != NULL) ? $query->password : '';
        if (!password_verify($pass, $password)) {
            $this->session->set_flashdata('loginError', 'invalid authentication');
            redirect('/', 'refresh');
            //$this->load->view('error');
        } else {
            $this->setSession('admin');
            $this->DBModel->setVisitor('admin');
            redirect('/', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->set_userdata('role', '');
        redirect('/', 'refresh');
    }

    public function admin()
    {
        if ($this->session->role == 'admin') {
            $data['title'] = 'Admin';
            $data['teams'] = $this->DBModel->getTeams();
            $data['results'] = $this->DBModel->getResults('results7');
            $data['matchPairs'] = $this->DBModel->getMatchPairsNotPlayed();
            $this->load->view('header', $data);
            $this->load->view('admin', $data);
        } else {
            $this->load->view('error');
        }
    }

    public function formIn($id)
    {
        $this->load->helper('form');
        $data['title'] = 'Unos kola';
        $data['teams'] = $this->DBModel->getTeams();
        $data['game'] = $this->DBModel->getGameByID($id);

        $this->load->view('header', $data);
        $this->load->view('gameInput', $data);
    }

    public function unosKola()
    {
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();

        $id = $this->input->post('id');
        $mDay = $this->input->post('mday');

        $home = $this->input->post('home');
        $away = $this->input->post('away');
        $homeID = $this->input->post('homeID');
        $awayID = $this->input->post('awayID');

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

        if ($homeID == 7 OR $awayID == 7) {
            $this->DBModel->insertGame('results5', 'table5', $mDay, $home, $homeID, $away, $awayID, $home5, $away5);
            $this->DBModel->insertGame('results6', 'table6', $mDay, $home, $homeID, $away, $awayID, $home6, $away6);
            $this->DBModel->insertGame('results7', 'table7', $mDay, $home, $homeID, $away, $awayID, $home7, $away7);
            $this->DBModel->insertGame('results8', 'table8', $mDay, $home, $homeID, $away, $awayID, $home8, $away8);
        } else {
            $this->DBModel->insertGame('results5', 'table5', $mDay, $home, $homeID, $away, $awayID, $home5, $away5);
            $this->DBModel->insertGame('results6', 'table6', $mDay, $home, $homeID, $away, $awayID, $home6, $away6);
            $this->DBModel->insertGame('results7', 'table7', $mDay, $home, $homeID, $away, $awayID, $home7, $away7);
            $this->DBModel->insertGame('results8', 'table8', $mDay, $home, $homeID, $away, $awayID, $home8, $away8);
            $this->DBModel->insertGame('results9', 'table9', $mDay, $home, $homeID, $away, $awayID, $home9, $away9);
        }
        $this->DBModel->setPlayed($id, TRUE);

        $data['results'] = $this->DBModel->getResults('results7');
        $data['matchPairs'] = $this->DBModel->getMatchPairsNotPlayed();

        redirect('/liga/admin', 'refresh');
    }

    public function brisanjeKola($id)
    {
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();
        $data['matchPairs'] = $this->DBModel->getMatchPairsNotPlayed();
        $data['results'] = $this->DBModel->getResults('results7');

        $game = $this->DBModel->getGameFromResults($id);
        $game9 = $this->DBModel->getGame9($game->home_teamid, $game->away_teamid);

        $matchPair = $this->DBModel->getMatchPair($game->home_teamid, $game->away_teamid);

        $this->DBModel->setPlayed($matchPair->id, 'FALSE');

        $this->DBModel->deleteGame('results5', 'table5', $id);
        $this->DBModel->deleteGame('results6', 'table6', $id);
        $this->DBModel->deleteGame('results7', 'table7', $id);
        $this->DBModel->deleteGame('results8', 'table8', $id);
        if ($game9 > 0) {
            $this->DBModel->deleteGame('results9', 'table9', $game9->id);
        } else {
            
        }

        redirect('/liga/admin', 'refresh');
    }

    public function ekipa($id)
    {
        $data['teams'] = $this->DBModel->getTeams();
        $data['team'] = $this->DBModel->getTeamByID($id);
        $data['results9'] = $this->DBModel->getResultsByID('results9', $id);
        $data['results8'] = $this->DBModel->getResultsByID('results8', $id);
        $data['results7'] = $this->DBModel->getResultsByID('results7', $id);
        $data['results6'] = $this->DBModel->getResultsByID('results6', $id);
        $data['results5'] = $this->DBModel->getResultsByID('results5', $id);
        $data['title'] = $data['team']->team_name;

        $this->load->view('header', $data);
        $this->load->view('team', $data);
    }

    public function bilten()
    {
        $data['title'] = 'Bilten';
        $data['teams'] = $this->DBModel->getTeams();
        $data['table5'] = $this->DBModel->getTable('table5');
        $data['table6'] = $this->DBModel->getTable('table6');
        $data['table7'] = $this->DBModel->getTable('table7');
        $data['table8'] = $this->DBModel->getTable('table8');
        $data['table9'] = $this->DBModel->getTable('table9', FALSE, 7);
        $data['results5'] = $this->DBModel->getLastResults('results5')['results'];
        $data['results6'] = $this->DBModel->getLastResults('results6')['results'];
        $data['results7'] = $this->DBModel->getLastResults('results7')['results'];
        $data['results8'] = $this->DBModel->getLastResults('results8')['results'];
        $data['results9'] = $this->DBModel->getLastResults('results9')['results'];
        $data['lastMday'] = $this->DBModel->getLastResults('results5')['lastMday'];
        $data['nextFixture'] = $this->DBModel->getNextFixture();
        $data['nextMday'] = $data['lastMday'] + 1;
        $data['notPlaying'] = $this->DBModel->getNotPlaying($data['lastMday'] + 1);
        $data['notPlayingLastMday'] = $this->DBModel->getNotPlaying($data['lastMday']);
        $data['nextGameDate'] = $this->DBModel->getNextGameDate($data['nextMday']);

        $this->load->view('newsletter', $data);
    }

    private function setSession($role = '')
    {
        $sessionData = array(
            'ip' => $this->input->ip_address(),
            'mobile' => $this->agent->mobile(),
            'robot' => $this->agent->robot(),
            'platform' => $this->agent->platform(),
            'browser' => $this->agent->browser(),
            'version' => $this->agent->version(),
            'userAgent' => $this->agent->agent_string()
        );

        $sessionStartTime = time();
        $sessionData['startTime'] = $sessionStartTime;

        $cookie = get_cookie('visited');
        if ($cookie) {
            $sessionData['newVisitor'] = 0;
        } else {
            setcookie('visited', '1');
            $sessionData['newVisitor'] = 1;
        }

        $sessionData['role'] = $role;
        $this->session->set_userdata($sessionData);
    }

    public function test()
    {

        $this->load->view('test');
    }

}
