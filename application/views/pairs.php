<table>
    <p>Raspored:</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>            
    </tr>
    <?php
    foreach ($matchPairs as $row) {
        echo <<<EOT
             <tr>
             <td>$row->m_day</td>
             <td>$row->home_team</td>
             <td>$row->away_team</td>
             <td>$row->game_date</td>             
             </tr>
EOT;
    }
    ?>
</table>
<table>
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
<p>Ekipa NK Natron se ne takmici u 2009. godistu</p>
