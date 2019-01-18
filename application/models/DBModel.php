<?php

class DBModel extends CI_Model {

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

    public function get_not_playing()
    {
        $sql = "SELECT * FROM notplaying";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
