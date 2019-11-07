<div class="content">
    <div id="g2006" class="ys">
        <div class="results">
            <p>
                <?php
                echo ($lastMday != 0) ? $lastMday . 'kolo (2006. godište)' : ''
                ?>
            </p>
            <table>
                <?php
                foreach ($results6 as $r) {
                    echo <<<EOT
            <tr>
            <td>$r->home_team</td><td><a href="/liga/ekipa/$r->home_teamid"><img src='/images/logos/$r->home_teamid.png' alt='grb'></a></td>
            <td>$r->goals_home</td>
            <td> : </td>
            <td>$r->goals_away</td>
            <td><a href="/liga/ekipa/$r->away_teamid"><img src='/images/logos/$r->away_teamid.png' alt='grb'></a></td><td>$r->away_team</td>
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
                    <th>Ut</th>
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
             <td><a href="/liga/ekipa/$row->id"><img src='/images/logos/$row->id.png' alt='grb'>$row->team</a></td>
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
    <div id="fixture">
        <table class="nextGame">
            <?php
            if ($isLeagueOver) {
                echo '<h2><a href="/liga/finalsResults">Završni turnir</a></h2>';
            } else {
                echo <<<EOT
        <tr>            
        <td class='nextMday' colspan='5'>$nextMday. kolo ($nextGameDate->game_date)</td>
        </tr>
EOT;
                foreach ($nextFixture as $nf) {
                    echo <<<EOT
            <tr>
            <td class='nextGameH'>$nf->home</td>
            <td class='nextGameImg'><a href="/liga/ekipa/$nf->home_team"><img src='/images/logos/$nf->home_team.png' alt='grb'></a></td>
            <td class='nextGameTime'>$nf->game_time</td>
            <td class='nextGameImg'><a href="/liga/ekipa/$nf->away_team"><img src='/images/logos/$nf->away_team.png' alt='grb'></a></td>
            <td class='nextGameA'>$nf->away</td>
            </tr >
EOT;
                }
                echo <<<EOT
            <tr>
            <td class="notPlaying" colspan='3'>$notPlaying->team pauzira</td>
            <td colspan='2'>
            
            </td>
            </tr>
EOT;
            }
            ?>
        </table>
    </div>
</div>
