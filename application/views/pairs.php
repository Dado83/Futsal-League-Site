<table class="pairs">
    <p>Raspored:</p>
    <tr>
        <th>kolo</th>
        <th>domaćin</th>
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
<p>NK Natron ne nastupa u 2009. godištu</p>
