<table class="pairs">
    <p>Raspored:</p>
    <?php
    foreach ($matchDates1 as $no => $date) {
        $no++;
        echo "$no. kolo: $date->game_date <br>";

        foreach ($matchPairs1 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->m_day</td>
             <td>$row->home_team</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
    }

    ?>
</table>
<table class="pairs">
    <p>Slobodne ekipe:</p>
    <tr>
        <th>kolo</th>
        <th>ekipa</th>
    </tr>
    <?php
    foreach ($notPlaying as $np) {
        echo <<<EOT
             <tr>
             <td>$np->m_day</td>
             <td>$np->team</td>  
             </tr>
EOT;
    }
    ?>
</table>
