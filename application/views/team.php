<img class="teamLogo" src="/images/logos_big/<?php echo $team->id ?>.png" alt="team logo"/>
<table>   
    <tr>
        <td>Ekipa</td>
        <td><?php echo $team->team_name ?></td>
    </tr>
    <tr>
        <td>Grad</td>
        <td><?php echo $team->team_city ?></td>
    </tr>
    <tr>
        <td>Dvorana</td>
        <td><?php echo $team->venue ?></td>
    </tr>
    <tr>
        <td>Termin</td>
        <td><?php echo $team->game_time ?></td>
    </tr>
    <tr>
        <td>Klupske boje</td>
        <td><?php echo $team->kit_color ?></td>
    </tr>
</table>
<table>
    <?php
    if ($results9 == NULL) {
        echo "<i><p>ne takmici se u 2009. godistu</p></i>";
    } else {
        echo <<<EOT
        <p>2009. godiste</p>
        <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th colspan="2">rezultat</th>
        </tr>
EOT;
    }

    foreach ($results9 as $r) {
        echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td>$r->home_team</td>
        <td>$r->away_team</td>
        <td>$r->goals_home</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
    }
    ?>
</table>
<table>
    <p>2008. godiste</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th colspan="2">rezultat</th>
    </tr>
    <?php
    foreach ($results8 as $r) {
        echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td>$r->home_team</td>
        <td>$r->away_team</td>
        <td>$r->goals_home</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
    }
    ?>
</table>
<table>
    <p>2007. godiste</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th colspan="2">rezultat</th>
    </tr>
    <?php
    foreach ($results7 as $r) {
        echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td>$r->home_team</td>
        <td>$r->away_team</td>
        <td>$r->goals_home</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
    }
    ?>
</table>
<table>
    <p>2006. godiste</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th colspan="2">rezultat</th>
    </tr>
    <?php
    foreach ($results6 as $r) {
        echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td>$r->home_team</td>
        <td>$r->away_team</td>
        <td>$r->goals_home</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
    }
    ?>
</table>
<table>
    <p>2005. godiste</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th colspan="2">rezultat</th>
    </tr>
    <?php
    foreach ($results5 as $r) {
        echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td>$r->home_team</td>
        <td>$r->away_team</td>
        <td>$r->goals_home</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
    }
    ?>
</table>
