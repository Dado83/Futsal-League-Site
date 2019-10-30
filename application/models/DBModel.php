<?php

class DBModel extends CI_Model
{

    public function getTeams()
    {
        $sql = 'SELECT * FROM teams WHERE NOT id = 10';
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getTable($table, $isShortName = FALSE, $id = 11)
    {
        if ($isShortName) {
            $sql = <<<EOT
            SELECT $table.id, teams.team_name AS team,
            $table.games_played,
            $table.games_won,
            $table.games_drew,
            $table.games_lost,
            CONCAT ($table.goals_scored, ':', $table.goals_conceded) AS goals,
            $table.goals_scored - $table.goals_conceded AS g_diff,
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN (10, $id)
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team
EOT;
        } else {
            $sql = <<<EOT
            SELECT CONCAT(teams.team_name, ' ', teams.team_city) AS team,
            $table.games_played,
            $table.games_won,
            $table.games_drew,
            $table.games_lost,
            CONCAT ($table.goals_scored, ':', $table.goals_conceded) AS goals,
            $table.goals_scored - $table.goals_conceded AS g_diff,
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN (10, $id)
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team
EOT;
        }
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getTeamByTablePos($table, $pos)
    {
        $pos--;
        $sql = <<<EOT
            SELECT teams.team_name AS team,
            $table.id,
            $table.games_played,
            $table.games_won,
            $table.games_drew,
            $table.games_lost,
            CONCAT ($table.goals_scored, ':', $table.goals_conceded) AS goals,
            $table.goals_scored - $table.goals_conceded AS g_diff,
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id=10
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team
            LIMIT 1 OFFSET $pos
EOT;

        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getTeamByID($id)
    {
        $sql = "SELECT * FROM teams WHERE id = $id";
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getResultsByID($results, $id)
    {
        $sql = "SELECT * FROM $results WHERE home_teamid = $id OR away_teamid = $id ORDER BY m_day";
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getMatchPairs($mday)
    {
        $sql = <<<EOT
        SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_team, away.team_name AS away_team
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.m_day = $mday AND NOT (matchpairs.home_team = 10 XOR matchpairs.away_team = 10)
EOT;
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getMatchDates($mday)
    {
        $sql = <<<EOT
        SELECT DISTINCT game_date
        FROM matchpairs
        WHERE m_day = $mday AND NOT (matchpairs.home_team = 10 XOR matchpairs.away_team = 10)
EOT;
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getMatchPairsNotPlayed()
    {
        $sql = <<<EOT
        SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_team, away.team_name AS away_team
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.is_played = FALSE AND NOT (matchpairs.home_team = 10 XOR matchpairs.away_team = 10)
EOT;
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getResults($results)
    {
        $sql = "SELECT * FROM $results ORDER BY m_day";
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getLastResults($results)
    {
        $s = "SELECT MAX(m_day) AS mDay FROM $results";
        $q = $this->db->query($s);
        $max = $q->row();
        $max_mday = $max->mDay;
        if ($max_mday == NULL) {
            $max_mday = 0;
        }
        $sql = "SELECT * FROM $results WHERE m_day = $max_mday";
        $query = $this->db->query($sql);
        $data['lastMday'] = $max_mday;
        $data['results'] = ($query) ? $query->result() : array();
        return $data;
    }

    public function getNextFixture()
    {
        $sql_last = "SELECT DISTINCT m_day FROM results6";
        $query_num = $this->db->query($sql_last);
        $mday_num = sizeof($query_num->result());
        $next_game = ++$mday_num;
        $sql = <<<EOT
        SELECT matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home, away.team_name AS away, home.game_time, home.venue
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.m_day = $next_game AND NOT (matchpairs.home_team = 10 XOR matchpairs.away_team = 10)
EOT;
        $query = $this->db->query($sql);
        return ($query) ? $query->result() : array();
    }

    public function getGameByID($id)
    {
        $sql = <<<EOT
        SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home, away.team_name AS away, home.game_time, home.venue
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.id = $id
EOT;
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getGameFromResults($id)
    {
        $sql = "SELECT * FROM results7 WHERE id = $id";
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getGame10($home_id, $away_id)
    {
        $sql = "SELECT * FROM results10 WHERE home_teamid = $home_id AND away_teamid = $away_id";
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getMatchPair($home, $away)
    {
        $sql = "SELECT * FROM matchpairs WHERE home_team = $home AND away_team = $away";
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getNextGameDate($mday)
    {
        $sql = "SELECT * FROM matchpairs WHERE m_day = $mday";
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getNotPlaying($mday = 0)
    {
        if ($mday == 0) {
            $sql = "SELECT * FROM notplaying";
            $query = $this->db->query($sql);
            return ($query) ? $query->result() : array();
        } else {
            $sql = "SELECT * FROM notplaying WHERE m_day = $mday";
            $query = $this->db->query($sql);
            return ($query) ? $query->row() : array();
        }
    }

    public function setPlayed($id, $isPlayed)
    {
        $sqlPlayed = <<<EOT
        UPDATE matchpairs SET is_played = $isPlayed WHERE id = $id
EOT;
        $this->db->query($sqlPlayed);
    }

    public function insertGame($results, $table, $mday, $home, $home_id, $away, $away_id, $goals_h, $goals_a)
    {
        $sql = <<<EOT
        INSERT INTO $results (m_day, home_team, home_teamid, away_team, away_teamid, goals_home, goals_away)
        VALUES ($mday , '$home', $home_id, '$away', $away_id, $goals_h, $goals_a)
EOT;
        $this->db->query($sql);

        if ($goals_h > $goals_a) {
            $this->homeWin($table, $home_id, $away_id, $goals_h, $goals_a);
        } elseif ($goals_a > $goals_h) {
            $this->awayWin($table, $home_id, $away_id, $goals_h, $goals_a);
        } else {
            $this->gameDraw($table, $home_id, $away_id, $goals_h, $goals_a);
        }
    }

    private function awayWin($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h1 = <<<EOT
        UPDATE $table
        SET games_played = games_played + 1, games_lost = games_lost + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a
        WHERE id = $home_id
EOT;
        $this->db->query($sql_h1);

        $sql_a1 = <<<EOT
        UPDATE $table
        SET games_played = games_played + 1, games_won = games_won + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h, points = points + 3
        WHERE id = $away_id
EOT;
        $this->db->query($sql_a1);
    }

    private function homeWin($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h = <<<EOT
        UPDATE $table
        SET games_played = games_played + 1, games_won = games_won + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a, points = points + 3
        WHERE id = $home_id
EOT;
        $this->db->query($sql_h);

        $sql_a = <<<EOT
        UPDATE $table
        SET games_played = games_played + 1, games_lost = games_lost + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h
        WHERE id = $away_id
EOT;
        $this->db->query($sql_a);
    }

    private function gameDraw($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h2 = <<<EOT
        UPDATE $table
        SET games_played = games_played + 1, games_drew = games_drew + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a, points = points + 1
        WHERE id = $home_id
EOT;
        $this->db->query($sql_h2);

        $sql_a2 = <<<EOT
        UPDATE $table
        SET games_played = games_played + 1, games_drew = games_drew + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h, points = points + 1
        WHERE id = $away_id
EOT;
        $this->db->query($sql_a2);
    }

    public function deleteGame($results, $table, $id)
    {
        $sql_get = "SELECT * FROM $results WHERE id = $id";
        $query = $this->db->query($sql_get);
        $res = $query->row();
        $game = array(
            'id' => $res->id, 'm_day' => $res->m_day, 'home' => $res->home_team,
            'home_id' => $res->home_teamid, 'away' => $res->away_team, 'away_id' => $res->away_teamid,
            'goals_h' => $res->goals_home, 'goals_a' => $res->goals_away
        );

        if ($game['goals_h'] > $game['goals_a']) {
            $this->homeWinDel($table, $game['home_id'], $game['away_id'], $game['goals_h'], $game['goals_a']);
        } elseif ($game['goals_a'] > $game['goals_h']) {
            $this->awayWinDel($table, $game['home_id'], $game['away_id'], $game['goals_h'], $game['goals_a']);
        } else {
            $this->drawDel($table, $game['home_id'], $game['away_id'], $game['goals_h'], $game['goals_a']);
        }

        $sql_del = "DELETE FROM $results WHERE id = $id";
        $this->db->query($sql_del);
    }

    private function homeWinDel($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h = <<<EOT
        UPDATE $table
        SET games_played = games_played - 1, games_won = games_won - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a, points = points - 3
        WHERE id = $home_id
EOT;
        $this->db->query($sql_h);

        $sql_a = <<<EOT
        UPDATE $table
        SET games_played = games_played - 1, games_lost = games_lost - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h
        WHERE id = $away_id
EOT;
        $this->db->query($sql_a);
    }

    private function awayWinDel($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h1 = <<<EOT
        UPDATE $table
        SET games_played = games_played - 1, games_lost = games_lost - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a
        WHERE id = $home_id
EOT;
        $this->db->query($sql_h1);

        $sql_a1 = <<<EOT
        UPDATE $table
        SET games_played = games_played - 1, games_won = games_won - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h, points = points - 3
        WHERE id = $away_id
EOT;
        $this->db->query($sql_a1);
    }

    private function drawDel($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h2 = <<<EOT
        UPDATE $table
        SET games_played = games_played - 1, games_drew = games_drew - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a, points = points - 1
        WHERE id = $home_id
EOT;
        $this->db->query($sql_h2);

        $sql_a2 = <<<EOT
        UPDATE $table
        SET games_played = games_played - 1, games_drew = games_drew - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h, points = points - 1
        WHERE id = $away_id
EOT;
        $this->db->query($sql_a2);
    }

    public function setVisitor($role = 'NULL')
    {
        $ip = $this->session->ip;
        $mobile = $this->session->mobile;
        $robot = $this->session->robot;
        $platform = $this->session->platform;
        $browser = $this->session->browser;
        $version = $this->session->version;
        $userAgent = $this->session->userAgent;
        $newVisitor = $this->session->newVisitor;
        $startTime = $this->session->startTime;

        $this->checkIfNULL($ip);
        $this->checkIfNULL($mobile);
        $this->checkIfNULL($robot);
        $this->checkIfNULL($platform);
        $this->checkIfNULL($browser);
        $this->checkIfNULL($version);
        $this->checkIfNULL($userAgent);
        $this->checkIfNULL($newVisitor);
        $this->checkIfNULL($startTime);

        $sql = <<<EOT
        INSERT INTO visitors (ip, mobile, robot, platform, browser, version, user_agent, new_visitor, role, time) 
        VALUES ('$ip', '$mobile', '$robot', '$platform', '$browser', '$version', '$userAgent', $newVisitor, '$role', $startTime)
EOT;
        $this->db->query($sql);
    }

    private function checkIfNULL(&$value)
    {
        if ($value === '') {
            $value = 'NULL';
        }
    }

    public function getUser($user)
    {
        $sql = "SELECT * FROM users WHERE user = '$user'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getMaxMday()
    {
        $sql = "SELECT MAX(m_day) as mDay FROM matchpairs";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getCombinedTable($id)
    {
        $sql = <<<EOT
        SELECT id, CONCAT(team_name,' ', team_city) AS team,
        (SELECT games_played FROM table6 WHERE id=$id)
        + (SELECT games_played FROM table7 WHERE id=$id)
        + (SELECT games_played FROM table8 WHERE id=$id)
        + (SELECT games_played FROM table9 WHERE id=$id)
        + (SELECT games_played FROM table10 WHERE id=$id) AS gamesAll,
        (SELECT games_won FROM table6 WHERE id=$id)
        + (SELECT games_won FROM table7 WHERE id=$id)
        + (SELECT games_won FROM table8 WHERE id=$id)
        + (SELECT games_won FROM table9 WHERE id=$id)
        + (SELECT games_won FROM table10 WHERE id=$id) AS gamesWon,
        (SELECT games_drew FROM table6 WHERE id=$id)
        + (SELECT games_drew FROM table7 WHERE id=$id)
        + (SELECT games_drew FROM table8 WHERE id=$id)
        + (SELECT games_drew FROM table9 WHERE id=$id)
        + (SELECT games_drew FROM table10 WHERE id=$id) AS gamesDrew,
        (SELECT games_lost FROM table6 WHERE id=$id)
        + (SELECT games_lost FROM table7 WHERE id=$id)
        + (SELECT games_lost FROM table8 WHERE id=$id)
        + (SELECT games_lost FROM table9 WHERE id=$id)
        + (SELECT games_lost FROM table10 WHERE id=$id) AS gamesLost,
        (SELECT goals_scored FROM table6 WHERE id=$id)
        + (SELECT goals_scored FROM table7 WHERE id=$id)
        + (SELECT goals_scored FROM table8 WHERE id=$id)
        + (SELECT goals_scored FROM table9 WHERE id=$id)
        + (SELECT goals_scored FROM table10 WHERE id=$id) AS goalsFor,
        (SELECT goals_conceded FROM table6 WHERE id=$id)
        + (SELECT goals_conceded FROM table7 WHERE id=$id)
        + (SELECT goals_conceded FROM table8 WHERE id=$id)
        + (SELECT goals_conceded FROM table9 WHERE id=$id)
        + (SELECT goals_conceded FROM table10 WHERE id=$id) AS goalsAgg,
        (SELECT points FROM table6 WHERE id=$id)
        + (SELECT points FROM table7 WHERE id=$id)
        + (SELECT points FROM table8 WHERE id=$id)
        + (SELECT points FROM table9 WHERE id=$id)
        + (SELECT points FROM table10 WHERE id=$id) AS pointsAll
        FROM teams WHERE id=$id
EOT;
        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }

    public function getVisitors($type)
    {
        if ($type == 'all') {
            $sql = <<<EOT
            SELECT COUNT(*) AS vis FROM visitors WHERE robot='NULL'
EOT;
        } elseif ($type == 'allUnique') {
            $sql = <<<EOT
            SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE robot='NULL'
EOT;
        } elseif ($type == 'mobile') {
            $sql = <<<EOT
            SELECT COUNT(*) AS vis FROM visitors WHERE robot='NULL' AND NOT mobile='NULL'
EOT;
        } elseif ($type == 'mobileUnique') {
            $sql = <<<EOT
            SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE robot='NULL' AND NOT mobile='NULL'
EOT;
        } elseif ($type == 'desktop') {
            $sql = <<<EOT
            SELECT COUNT(*) AS vis FROM visitors WHERE robot='NULL' AND mobile='NULL'
EOT;
        } elseif ($type == 'desktopUnique') {
            $sql = <<<EOT
            SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE robot='NULL' AND mobile='NULL'
EOT;
        } elseif ($type == 'robot') {
            $sql = <<<EOT
            SELECT COUNT(*) AS vis FROM visitors WHERE NOT robot='NULL'
EOT;
        } elseif ($type == 'robotUnique') {
            $sql = <<<EOT
            SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE NOT robot='NULL'
EOT;
        }

        $query = $this->db->query($sql);
        return ($query) ? $query->row() : array();
    }
}
