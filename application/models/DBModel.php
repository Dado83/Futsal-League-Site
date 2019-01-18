<?php

class DBModel extends CI_Model {

    public function get_teams()
    {
        $sql = 'SELECT * FROM teams WHERE NOT id = 10';
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_table($table, $id = 11)
    {
        $sql = <<<EOT
        SELECT CONCAT(teams.team_name, ' ', teams.team_city) AS team,
        $table.games_played, 
        $table.games_won,
        $table.games_drew,
        $table.games_lost,
        $table.goals_scored,
        $table.goals_conceded,
        $table.goals_scored - $table.goals_conceded AS g_diff,
        $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN (10, $id)
        ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC
        EOT;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_match_pairs()
    {
        $sql = <<<EOT
        SELECT matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_team, away.team_name AS away_team
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id 
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE NOT matchpairs.home_team = 10 XOR matchpairs.away_team = 10       
        EOT;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_results($results)
    {
        $sql = "SELECT * FROM $results";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_last_results($results)
    {
        $sql_last = "SELECT DISTINCT m_day FROM $results";
        $query_num = $this->db->query($sql_last);
        $mday_num = sizeof($query_num->result());
        $sql = "SELECT * FROM $results WHERE m_day = $mday_num";
        $query = $this->db->query($sql);
        $data['last_mday'] = $mday_num;
        $data['results'] = $query->result();
        return $data;
    }

    public function get_next_fixture()
    {
        $sql_last = "SELECT DISTINCT m_day FROM results5";
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
        return $query->result();
    }
    
    public function get_next_game_date($mday)
    {
        $sql = "SELECT * FROM matchpairs WHERE m_day = $mday";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function get_not_playing($mday = 0)
    {
        if ($mday == 0)
        {
            $sql = "SELECT * FROM notplaying";
            $query = $this->db->query($sql);
            return $query->result();
        }
        else
        {
            $sql = "SELECT * FROM notplaying WHERE m_day = $mday";
            $query = $this->db->query($sql);
            return $query->result();
        }
    }

}
