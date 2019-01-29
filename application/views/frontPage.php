<div id="fixture">
    <table class="nextGame">
        <?php
        echo "
            <tr>            
            <td class='nextMday' colspan='5'>$nextMday. kolo ($nextGameDate->game_date)</td>
            </tr>
            ";
        foreach ($nextFixture as $nf) {
            echo <<<EOT
            <tr>
            <td class = 'nextGameH'>$nf->home</td>
            <td class = 'nextGameImg'><img src = '/images/logos/$nf->home_team.png' alt = 'grb'></td>
            <td class = 'nextGameTime'>$nf->game_time</td>
            <td class = 'nextGameImg'><img src = '/images/logos/$nf->away_team.png' alt = 'grb'></td>
            <td class = 'nextGameA'>$nf->away</td>
            </tr >
EOT;
        }
        ?>       
        <?php
        echo <<<EOT
            <tr>
            <td class="notPlaying" colspan='3'>$notPlaying->team pauzira</td>
            <td colspan='2'>
            <span class='links'><a href='/liga/rezultati'>Rezultati</a> <a href='/liga/raspored'>Raspored</a></span>
            </td>
            </tr>
EOT;
        ?>
    </table>
</div>
<hr>
<div class="content">
    <div class="results">
        <p><?php echo $lastMday ?>. kolo (2009. godište)</p>
        <table>
            <?php
            foreach ($results9 as $r) {
                echo <<<EOT
            <tr>
            <td><img src='/images/logos/$r->home_teamid.png' alt='grb'>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team<img src='/images/logos/$r->away_teamid.png' alt='grb'></td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>2009. godište</th>
                <th>O</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>GOL</th>
                <th>+/-</th>               
                <th>BOD</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table9 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td><img src='/images/logos/$row->id.png' alt='grb'>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>     
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
        <p><?php echo $lastMday ?>. kolo (2008. godište)</p>
        <table>
            <?php
            foreach ($results8 as $r) {
                echo <<<EOT
            <tr>
            <td><img src='/images/logos/$r->home_teamid.png' alt='grb'>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team<img src='/images/logos/$r->away_teamid.png' alt='grb'></td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>2008. godište</th>
                <th>O</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>GOL</th>
                <th>+/-</th>
                <th>BOD</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table8 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td><img src='/images/logos/$row->id.png' alt='grb'>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>   
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
        <p><?php echo $lastMday ?>. kolo (2007. godište)</p>
        <table>
            <?php
            foreach ($results7 as $r) {
                echo <<<EOT
            <tr>
            <td><img src='/images/logos/$r->home_teamid.png' alt='grb'>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team<img src='/images/logos/$r->away_teamid.png' alt='grb'></td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>2007. godište</th>
                <th>O</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>GOL</th>
                <th>+/-</th>
                <th>BOD</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table7 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td><img src='/images/logos/$row->id.png' alt='grb'>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>     
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
        <p><?php echo $lastMday ?>. kolo (2006. godište)</p>
        <table>
            <?php
            foreach ($results6 as $r) {
                echo <<<EOT
            <tr>
            <td><img src='/images/logos/$r->home_teamid.png' alt='grb'>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team<img src='/images/logos/$r->away_teamid.png' alt='grb'></td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>2006. godište</th>
                <th>O</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>GOL</th>
                <th>+/-</th>
                <th>BOD</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table6 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td><img src='/images/logos/$row->id.png' alt='grb'>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>   
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
        <p><?php echo $lastMday ?>. kolo (2005. godište)</p>
        <table>
            <?php
            foreach ($results5 as $r) {
                echo <<<EOT
            <tr>
            <td><img src='/images/logos/$r->home_teamid.png' alt='grb'>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team<img src='/images/logos/$r->away_teamid.png' alt='grb'></td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>2005. godište</th>
                <th>O</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>GOL</th>
                <th>+/-</th>
                <th>BOD</th>
            </tr>
            <?php
            $i = 1;
            foreach ($table5 as $row) {
                echo <<<EOT
             <tr>
             <td>$i</td>
             <td><img src='/images/logos/$row->id.png' alt='grb'>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>     
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
