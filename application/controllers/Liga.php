<?php

class Liga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DBModel', '', true);
        if (get_cookie('admin') == '1') {
            $this->setSession('admin');
            $this->DBModel->setVisitor('admin');
        } else {
            $this->setSession();
            $this->DBModel->setVisitor();
        }
    }

    private function setSession($role = '')
    {
        $sessionData = [
            'ip' => $this->input->ip_address(),
            'mobile' => $this->agent->mobile(),
            'robot' => $this->agent->robot(),
            'platform' => $this->agent->platform(),
            'browser' => $this->agent->browser(),
            'version' => $this->agent->version(),
            'userAgent' => $this->agent->agent_string(),
        ];

        $sessionStartTime = time();
        $sessionData['startTime'] = $sessionStartTime;

        $cookie = get_cookie('visited');
        if ($cookie) {
            $sessionData['newVisitor'] = 0;
        } else {
            set_cookie('visited', '1', 60 * 60 * 24 * 30 * 4);
            $sessionData['newVisitor'] = 1;
        }

        $sessionData['role'] = $role;
        $this->session->set_userdata($sessionData);
    }

    public function index($ysel = 2006)
    {
        $data['title'] = 'Fair Play LBŠ';
        $data['teams'] = $this->DBModel->getTeams();
        $data['table6'] = $this->DBModel->getTable('table6', true);
        $data['table7'] = $this->DBModel->getTable('table7', true, 8);
        $data['table8'] = $this->DBModel->getTable('table8', true);
        $data['table9'] = $this->DBModel->getTable('table9', true);
        $data['table10'] = $this->DBModel->getTable('table10', true, 7, 1);
        $data['results6'] = $this->DBModel->getLastResults('results6')['results'];
        $data['results7'] = $this->DBModel->getLastResults('results7')['results'];
        $data['results8'] = $this->DBModel->getLastResults('results8')['results'];
        $data['results9'] = $this->DBModel->getLastResults('results9')['results'];
        $data['results10'] = $this->DBModel->getLastResults('results10')['results'];
        $data['lastMday'] = $this->DBModel->getLastResults('results6')['lastMday'];
        $data['nextFixture'] = $this->DBModel->getNextFixture();
        $data['nextMday'] = $data['lastMday'] + 1;
        $data['notPlaying'] = $this->DBModel->getNotPlaying($data['lastMday'] + 1);
        $data['notPlayingLastMday'] = $this->DBModel->getNotPlaying($data['lastMday']);
        $data['nextGameDate'] = $this->DBModel->getNextGameDate($data['nextMday']);
        $maxMday = $this->DBModel->getMaxMday();
        $data['isLeagueOver'] = $data['lastMday'] == $maxMday->mDay;

        $this->load->view('header', $data);
        switch ($ysel) {
            case 2006:
                $this->load->view('y2006', $data);
                break;
            case 2007:
                $this->load->view('y2007', $data);
                break;
            case 2008:
                $this->load->view('y2008', $data);
                break;
            case 2009:
                $this->load->view('y2009', $data);
                break;
            case 2010:
                $this->load->view('y2010', $data);
                break;
        }
        $this->load->view('footer', $data);
    }

    public function raspored()
    {
        $data['title'] = 'Raspored';
        $data['matchDates1'] = $this->DBModel->getMatchDates(1);
        $data['matchDates2'] = $this->DBModel->getMatchDates(2);
        $data['matchDates3'] = $this->DBModel->getMatchDates(3);
        $data['matchDates4'] = $this->DBModel->getMatchDates(4);
        $data['matchDates5'] = $this->DBModel->getMatchDates(5);
        $data['matchDates6'] = $this->DBModel->getMatchDates(6);
        $data['matchDates7'] = $this->DBModel->getMatchDates(7);
        $data['matchDates8'] = $this->DBModel->getMatchDates(8);
        $data['matchDates9'] = $this->DBModel->getMatchDates(9);
        $data['matchPairs1'] = $this->DBModel->getMatchPairs(1);
        $data['matchPairs2'] = $this->DBModel->getMatchPairs(2);
        $data['matchPairs3'] = $this->DBModel->getMatchPairs(3);
        $data['matchPairs4'] = $this->DBModel->getMatchPairs(4);
        $data['matchPairs5'] = $this->DBModel->getMatchPairs(5);
        $data['matchPairs6'] = $this->DBModel->getMatchPairs(6);
        $data['matchPairs7'] = $this->DBModel->getMatchPairs(7);
        $data['matchPairs8'] = $this->DBModel->getMatchPairs(8);
        $data['matchPairs9'] = $this->DBModel->getMatchPairs(9);
        $data['teams'] = $this->DBModel->getTeams();
        $data['notPlaying1'] = $this->DBModel->getNotPlaying(1);
        $data['notPlaying2'] = $this->DBModel->getNotPlaying(2);
        $data['notPlaying3'] = $this->DBModel->getNotPlaying(3);
        $data['notPlaying4'] = $this->DBModel->getNotPlaying(4);
        $data['notPlaying5'] = $this->DBModel->getNotPlaying(5);
        $data['notPlaying6'] = $this->DBModel->getNotPlaying(6);
        $data['notPlaying7'] = $this->DBModel->getNotPlaying(7);
        $data['notPlaying8'] = $this->DBModel->getNotPlaying(8);
        $data['notPlaying9'] = $this->DBModel->getNotPlaying(9);

        $this->load->view('header', $data);
        $this->load->view('pairs', $data);
        $this->load->view('footer', $data);
    }

    public function rezultati()
    {
        $data['title'] = 'Rezultati';
        $data['teams'] = $this->DBModel->getTeams();
        $data['notplaying'] = $this->DBModel->getNotPlaying();
        $data['results6'] = $this->DBModel->getResults('results6');
        $data['results7'] = $this->DBModel->getResults('results7');
        $data['results8'] = $this->DBModel->getResults('results8');
        $data['results9'] = $this->DBModel->getResults('results9');
        $data['results10'] = $this->DBModel->getResults('results10');
        $data += $this->getCombinedTable();

        $this->load->view('header', $data);
        $this->load->view('results', $data);
        $this->load->view('footer', $data);
    }

    public function login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $query = $this->DBModel->getUser($user);
        $password = ($query != null) ? $query->password : '';

        if (!password_verify($pass, $password)) {
            $this->session->set_flashdata('loginError', 'invalid authentication');
            redirect('/', 'refresh');
        } else {
            $this->setSession('admin');
            $this->DBModel->setVisitor('admin');
            set_cookie('admin', '1', 60 * 60 * 24 * 30 * 4);
            redirect('/', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->set_userdata('role', '');
        delete_cookie('admin');
        redirect('/', 'refresh');
    }

    public function passwordChange()
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $user = $this->input->post('user');
        $pass = $this->input->post('password');
        $newPass = $this->input->post('newPassword');
        $query = $this->DBModel->getUser($user);
        $password = ($query != null) ? $query->password : '';
        $userID = ($query != null) ? $query->id : '';

        if (!password_verify($pass, $password)) {
            $this->session->set_flashdata('passwordNotChanged', 'nevažeća lozinka, pokušaj ponovo');
        } else {
            $passHash = password_hash($newPass, PASSWORD_DEFAULT);
            $this->DBModel->updatePassword($userID, $passHash);
            $this->session->set_flashdata('passwordChanged', 'lozinka je promjenjena');
        }

        redirect('/liga/admin', 'refresh');
    }

    public function admin()
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }
        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();
        $data['results'] = $this->DBModel->getResults('results6');
        $data['matchPairs'] = $this->DBModel->getMatchPairsNotPlayed();
        $data['visAll'] = $this->DBModel->getVisitors('all');
        $data['visUni'] = $this->DBModel->getVisitors('allUnique');
        $data['visDesk'] = $this->DBModel->getVisitors('desktop');
        $data['visDeskUni'] = $this->DBModel->getVisitors('desktopUnique');
        $data['visMob'] = $this->DBModel->getVisitors('mobile');
        $data['visMobUni'] = $this->DBModel->getVisitors('mobileUnique');
        $data['visRob'] = $this->DBModel->getVisitors('robot');
        $data['visRobUni'] = $this->DBModel->getVisitors('robotUnique');

        $this->load->view('header', $data);
        $this->load->view('admin', $data);
    }

    public function formIn($id)
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Unos kola';
        $data['teams'] = $this->DBModel->getTeams();
        $data['game'] = $this->DBModel->getGameByID($id);

        $this->load->view('header', $data);
        $this->load->view('gameInput', $data);
    }

    public function unosKola()
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();

        $id = $this->input->post('id');
        $mDay = $this->input->post('mday');

        $home = $this->input->post('home');
        $away = $this->input->post('away');
        $homeID = $this->input->post('homeID');
        $awayID = $this->input->post('awayID');

        $home10 = $this->input->post('home10');
        $away10 = $this->input->post('away10');
        $home9 = $this->input->post('home9');
        $away9 = $this->input->post('away9');
        $home8 = $this->input->post('home8');
        $away8 = $this->input->post('away8');
        $home7 = $this->input->post('home7');
        $away7 = $this->input->post('away7');
        $home6 = $this->input->post('home6');
        $away6 = $this->input->post('away6');

        $this->DBModel->insertGame('results6', 'table6', $mDay, $home, $homeID, $away, $awayID, $home6, $away6);
        $this->DBModel->insertGame('results7', 'table7', $mDay, $home, $homeID, $away, $awayID, $home7, $away7);
        $this->DBModel->insertGame('results8', 'table8', $mDay, $home, $homeID, $away, $awayID, $home8, $away8);
        $this->DBModel->insertGame('results9', 'table9', $mDay, $home, $homeID, $away, $awayID, $home9, $away9);
        $this->DBModel->insertGame('results10', 'table10', $mDay, $home, $homeID, $away, $awayID, $home10, $away10);

        $this->DBModel->setPlayed($id, true);

        $data['results'] = $this->DBModel->getResults('results6');
        $data['matchPairs'] = $this->DBModel->getMatchPairsNotPlayed();

        redirect('/liga/admin', 'refresh');
    }

    public function brisanjeKola($id)
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Admin';
        $data['teams'] = $this->DBModel->getTeams();
        $data['matchPairs'] = $this->DBModel->getMatchPairsNotPlayed();
        $data['results'] = $this->DBModel->getResults('results6');

        $game = $this->DBModel->getGameFromResults($id);
        $game7 = $this->DBModel->getGameBySel('results7', $game->home_teamid, $game->away_teamid);
        $game10 = $this->DBModel->getGameBySel('results10', $game->home_teamid, $game->away_teamid);

        $matchPair = $this->DBModel->getMatchPair($game->home_teamid, $game->away_teamid);

        $this->DBModel->setPlayed($matchPair->id, 'FALSE');

        $this->DBModel->deleteGame('results6', 'table6', $id);
        $this->DBModel->deleteGame('results8', 'table8', $id);
        $this->DBModel->deleteGame('results9', 'table9', $id);
        if ($game7 > 0) {
            $this->DBModel->deleteGame('results7', 'table7', $game7->id);
        }
        if ($game10 > 0) {
            $this->DBModel->deleteGame('results10', 'table10', $game10->id);
        }

        redirect('/liga/admin', 'refresh');
    }

    public function ekipa($id)
    {
        $data['teams'] = $this->DBModel->getTeams();
        $data['team'] = $this->DBModel->getTeamByID($id);
        $data['results10'] = $this->DBModel->getResultsByID('results10', $id);
        $data['results9'] = $this->DBModel->getResultsByID('results9', $id);
        $data['results8'] = $this->DBModel->getResultsByID('results8', $id);
        $data['results7'] = $this->DBModel->getResultsByID('results7', $id);
        $data['results6'] = $this->DBModel->getResultsByID('results6', $id);
        $data['title'] = $data['team']->team_name;
        $data['stats'] = $this->DBModel->getCombinedTable($id);

        $this->load->view('header', $data);
        $this->load->view('team', $data);
    }

    public function bilten()
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Bilten';
        $data['teams'] = $this->DBModel->getTeams();
        $data['table6'] = $this->DBModel->getTable('table6');
        $data['table7'] = $this->DBModel->getTable('table7', false, 8);
        $data['table8'] = $this->DBModel->getTable('table8');
        $data['table9'] = $this->DBModel->getTable('table9');
        $data['table10'] = $this->DBModel->getTable('table10', false, 7, 1);
        $data['results6'] = $this->DBModel->getLastResults('results6')['results'];
        $data['results7'] = $this->DBModel->getLastResults('results7')['results'];
        $data['results8'] = $this->DBModel->getLastResults('results8')['results'];
        $data['results9'] = $this->DBModel->getLastResults('results9')['results'];
        $data['results10'] = $this->DBModel->getLastResults('results10')['results'];
        $data['lastMday'] = $this->DBModel->getLastResults('results6')['lastMday'];
        $data['nextFixture'] = $this->DBModel->getNextFixture();
        $data['nextMday'] = $data['lastMday'] + 1;
        $data['notPlaying'] = $this->DBModel->getNotPlaying($data['lastMday'] + 1);
        $data['notPlayingLastMday'] = $this->DBModel->getNotPlaying($data['lastMday']);
        $data['nextGameDate'] = $this->DBModel->getNextGameDate($data['nextMday']);
        $maxMday = $this->DBModel->getMaxMday();
        $data['isLeagueOver'] = $data['lastMday'] == $maxMday->mDay;

        $this->load->view('newsletter', $data);
    }

    public function metrics()
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Metrics';
        $data['vis'] = $this->DBModel->visitorListForCurrentYear();

        $this->load->view('header', $data);
        $this->load->view('metrics', $data);
    }

    public function getVisitorData()
    {
        if ($this->session->role != 'admin') {
            redirect('/', 'refresh');
        }

        $data['visAll'] = $this->DBModel->getVisitors('all');
        $data['visUni'] = $this->DBModel->getVisitors('allUnique');
        $data['visDesk'] = $this->DBModel->getVisitors('desktop');
        $data['visDeskUni'] = $this->DBModel->getVisitors('desktopUnique');
        $data['visMob'] = $this->DBModel->getVisitors('mobile');
        $data['visMobUni'] = $this->DBModel->getVisitors('mobileUnique');
        $data['visRob'] = $this->DBModel->getVisitors('robot');
        $data['visRobUni'] = $this->DBModel->getVisitors('robotUnique');
        $data['visitorList'] = $this->DBModel->visitorListForCurrentYear();

        echo json_encode($data);
    }

    public function finals()
    {
        $data['title'] = 'LBŠ završnica';
        $data['teams'] = $this->DBModel->getTeams();
        $cmbTable = $this->getCombinedTable();

        $this->load->view('header', $data);
        $this->load->view('finalFour', $cmbTable);
        $this->load->view('footer', $data);
    }

    private function getCombinedTable()
    {
        $t1 = $this->DBModel->getCombinedTable(1);
        $t2 = $this->DBModel->getCombinedTable(2);
        $t3 = $this->DBModel->getCombinedTable(3);
        $t4 = $this->DBModel->getCombinedTable(4);
        $t5 = $this->DBModel->getCombinedTable(5);
        $t6 = $this->DBModel->getCombinedTable(6);
        $t7 = $this->DBModel->getCombinedTable(7);
        $t8 = $this->DBModel->getCombinedTable(8);
        $t9 = $this->DBModel->getCombinedTable(9);

        $total = array($t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9);

        function sortByPoints($a, $b)
        {
            if ($a->pointsAll == $b->pointsAll) {
                return 0;
            }
            return ($a->pointsAll > $b->pointsAll) ? -1 : 1;
        }

        usort($total, 'sortByPoints');
        $data['combinedTable'] = $total;

        $data['t6p1'] = $this->DBModel->getTeamByTablePos('table6', 1);
        $data['t6p2'] = $this->DBModel->getTeamByTablePos('table6', 2);
        $data['t6p3'] = $this->DBModel->getTeamByTablePos('table6', 3);
        $data['t6p4'] = $this->DBModel->getTeamByTablePos('table6', 4);

        $data['t7p1'] = $this->DBModel->getTeamByTablePos('table7', 1);
        $data['t7p2'] = $this->DBModel->getTeamByTablePos('table7', 2);
        $data['t7p3'] = $this->DBModel->getTeamByTablePos('table7', 3);
        $data['t7p4'] = $this->DBModel->getTeamByTablePos('table7', 4);

        $data['t8p1'] = $this->DBModel->getTeamByTablePos('table8', 1);
        $data['t8p2'] = $this->DBModel->getTeamByTablePos('table8', 2);
        $data['t8p3'] = $this->DBModel->getTeamByTablePos('table8', 3);
        $data['t8p4'] = $this->DBModel->getTeamByTablePos('table8', 4);

        $data['t9p1'] = $this->DBModel->getTeamByTablePos('table9', 1);
        $data['t9p2'] = $this->DBModel->getTeamByTablePos('table9', 2);
        $data['t9p3'] = $this->DBModel->getTeamByTablePos('table9', 3);
        $data['t9p4'] = $this->DBModel->getTeamByTablePos('table9', 4);

        $data['t10p1'] = $this->DBModel->getTeamByTablePos('table10', 1);
        $data['t10p2'] = $this->DBModel->getTeamByTablePos('table10', 2);
        $data['t10p3'] = $this->DBModel->getTeamByTablePos('table10', 3);
        $data['t10p4'] = $this->DBModel->getTeamByTablePos('table10', 4);

        return $data;
    }

    public function finalsResults()
    {
        $data['title'] = 'LBŠ završnica';
        $data['teams'] = $this->DBModel->getTeams();

        $data['t6p1'] = $this->DBModel->getTeamByTablePos('table6', 1);
        $data['t6p2'] = $this->DBModel->getTeamByTablePos('table6', 2);
        $data['t6p3'] = $this->DBModel->getTeamByTablePos('table6', 3);
        $data['t6p4'] = $this->DBModel->getTeamByTablePos('table6', 4);

        $data['t7p1'] = $this->DBModel->getTeamByTablePos('table7', 1);
        $data['t7p2'] = $this->DBModel->getTeamByTablePos('table7', 2);
        $data['t7p3'] = $this->DBModel->getTeamByTablePos('table7', 3);
        $data['t7p4'] = $this->DBModel->getTeamByTablePos('table7', 4);

        $data['t8p1'] = $this->DBModel->getTeamByTablePos('table8', 1);
        $data['t8p2'] = $this->DBModel->getTeamByTablePos('table8', 2);
        $data['t8p3'] = $this->DBModel->getTeamByTablePos('table8', 3);
        $data['t8p4'] = $this->DBModel->getTeamByTablePos('table8', 4);

        $data['t9p1'] = $this->DBModel->getTeamByTablePos('table9', 1);
        $data['t9p2'] = $this->DBModel->getTeamByTablePos('table9', 2);
        $data['t9p3'] = $this->DBModel->getTeamByTablePos('table9', 3);
        $data['t9p4'] = $this->DBModel->getTeamByTablePos('table9', 4);

        $data['t10p1'] = $this->DBModel->getTeamByTablePos('table10', 1);
        $data['t10p2'] = $this->DBModel->getTeamByTablePos('table10', 2);
        $data['t10p3'] = $this->DBModel->getTeamByTablePos('table10', 3);
        $data['t10p4'] = $this->DBModel->getTeamByTablePos('table10', 4);

        $this->load->view('header', $data);
        $this->load->view('finalFourResults', $data);
        $this->load->view('footer', $data);
    }

    public function test()
    {
        $pass = '';
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $pa = 'admin2014';
        $paHash = password_hash($pa, PASSWORD_DEFAULT);
        echo $passHash . '<br>' . $paHash;
    }

}