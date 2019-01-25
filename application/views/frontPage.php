<div id="fixture">
    <table class="nextGame">
        <?php
        echo "<p>$nextMday. kolo ($nextGameDate->game_date)</p>";
        foreach ($nextFixture as $nf) {
            echo <<<EOT
            <tr>
            <td class='nextGameH'>$nf->home</td>
            <td class='nextGameImg'><img src='/images/logos/$nf->home_team.png' alt='grb'></td>
            <td class='nextGameTime'>$nf->game_time</td>
            <td class='nextGameImg'><img src='/images/logos/$nf->away_team.png' alt='grb'></td>
            <td class='nextGameA'>$nf->away</td>
            </tr>
EOT;
        }
        ?>
        <?php
        foreach ($notPlaying as $np) {
            echo <<<EOT
            <tr>
            <td colspan='2'>$np->team pauzira</td>           
            </tr>
EOT;
        }
        ?>
    </table>
</div>
<div class="content">
    <div class="results">
        <p><?php echo $lastMday ?>. kolo</p>
        <table>
            <?php
            foreach ($results9 as $r) {
                echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <p>tabela</p>
        <table>
            <tr>
                <th>poz</th>
                <th>2009 g.</th>
                <th>UT</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>Gz</th>
                <th>Gp</th>
                <th>GR</th>
                <th>Bod</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table9 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals_scored</td>   
             <td>$row->goals_conceded</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
                $i++;
            }
            ?>
        </table>
    </div>
    <div class="results">
        <p><?php echo $lastMday ?>. kolo</p>
        <table>
            <?php
            foreach ($results8 as $r) {
                echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <p>tabela</p>
        <table>
            <tr>
                <th>poz</th>
                <th>2008 g.</th>
                <th>UT</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>Gz</th>
                <th>Gp</th>
                <th>GR</th>
                <th>Bod</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table8 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals_scored</td>   
             <td>$row->goals_conceded</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
                $i++;
            }
            ?>
        </table>
    </div>
    <div class="results">
        <p><?php echo $lastMday ?>. kolo</p>
        <table>
            <?php
            foreach ($results7 as $r) {
                echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <p>tabela</p>
        <table>
            <tr>
                <th>poz</th>
                <th>2007 g.</th>
                <th>UT</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>Gz</th>
                <th>Gp</th>
                <th>GR</th>
                <th>Bod</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table7 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals_scored</td>   
             <td>$row->goals_conceded</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
                $i++;
            }
            ?>
        </table>
    </div>
    <div class="results">
        <p><?php echo $lastMday ?>. kolo</p>
        <table>
            <?php
            foreach ($results6 as $r) {
                echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <p>tabela</p>
        <table>
            <tr>
                <th>poz</th>
                <th>2006 g.</th>
                <th>UT</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>Gz</th>
                <th>Gp</th>
                <th>GR</th>
                <th>Bod</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table6 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals_scored</td>   
             <td>$row->goals_conceded</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
                $i++;
            }
            ?>
        </table>
    </div>
    <div class="results">
        <p><?php echo $lastMday ?>. kolo</p>
        <table>
            <?php
            foreach ($results5 as $r) {
                echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <p>tabela</p>
        <table>
            <tr>
                <th>poz</th>
                <th>2005 g.</th>
                <th>UT</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>Gz</th>
                <th>Gp</th>
                <th>GR</th>
                <th>Bod</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table5 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals_scored</td>   
             <td>$row->goals_conceded</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
                $i++;
            }
            ?>
        </table>
    </div>
</div>
