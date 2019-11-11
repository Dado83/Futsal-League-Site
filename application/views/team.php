<div class="team">
    <img class="teamLogo" src="/images/logos_big/<?php echo $team->id ?>.png" alt="team logo" />
    <table class="teamInfo">
        <tr>
            <td>Ime</td>
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
    <table class="teamResults">
        <?php
        if ($results10 == NULL) {
            echo "<i><p>ne takmiči se u 2010. godištu</p></i>";
        } else {
            echo <<<EOT
        <p style='font-weight:bold; font-style:italic;'>2010. godište</p>
        <tr>
        <th>kolo</th>
        <th>domaćin</th>
        <th>gost</th>
        <th colspan="3">rezultat</th>
        </tr>
EOT;
        }

        foreach ($results10 as $r) {
            echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td><a href="/liga/ekipa/$r->home_teamid">$r->home_team</a></td>
        <td><a href="/liga/ekipa/$r->away_teamid">$r->away_team</a></td>
        <td>$r->goals_home</td>
        <td>:</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table class="teamResults">
        <p style='font-weight:bold; font-style:italic;'>2009. godište</p>
        <tr>
            <th>kolo</th>
            <th>domaćin</th>
            <th>gost</th>
            <th colspan="3">rezultat</th>
        </tr>
        <?php
        foreach ($results9 as $r) {
            echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td><a href="/liga/ekipa/$r->home_teamid">$r->home_team</a></td>
        <td><a href="/liga/ekipa/$r->away_teamid">$r->away_team</a></td>
        <td>$r->goals_home</td>
        <td>:</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table class="teamResults">
        <p style='font-weight:bold; font-style:italic;'>2008. godište</p>
        <tr>
            <th>kolo</th>
            <th>domaćin</th>
            <th>gost</th>
            <th colspan="3">rezultat</th>
        </tr>
        <?php
        foreach ($results8 as $r) {
            echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td><a href="/liga/ekipa/$r->home_teamid">$r->home_team</a></td>
        <td><a href="/liga/ekipa/$r->away_teamid">$r->away_team</a></td>
        <td>$r->goals_home</td>
        <td>:</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table class="teamResults">
        <?php
        if ($results7 == NULL) {
            echo "<i><p>ne takmiči se u 2007. godištu</p></i>";
        } else {
            echo <<<EOT
            <p style='font-weight:bold; font-style:italic;'>2007. godište</p>
            <tr>
                <th>kolo</th>
                <th>domaćin</th>
                <th>gost</th>
                <th colspan="3">rezultat</th>
            </tr>
EOT;
        }
        foreach ($results7 as $r) {
            echo <<<EOT
            <tr>
                <td>$r->m_day</td>
                <td><a href="/liga/ekipa/$r->home_teamid">$r->home_team</a></td>
                <td><a href="/liga/ekipa/$r->away_teamid">$r->away_team</a></td>
                <td>$r->goals_home</td>
                <td>:</td>
                <td>$r->goals_away</td>
            </tr>
EOT;
        }
        ?>
    </table>
    <table class="teamResults">
        <p style='font-weight:bold; font-style:italic;'>2006. godište</p>
        <tr>
            <th>kolo</th>
            <th>domaćin</th>
            <th>gost</th>
            <th colspan="3">rezultat</th>
        </tr>
        <?php
        foreach ($results6 as $r) {
            echo <<<EOT
        <tr>
        <td>$r->m_day</td>
        <td><a href="/liga/ekipa/$r->home_teamid">$r->home_team</a></td>
        <td><a href="/liga/ekipa/$r->away_teamid">$r->away_team</a></td>
        <td>$r->goals_home</td>
        <td>:</td>
        <td>$r->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
</div>
