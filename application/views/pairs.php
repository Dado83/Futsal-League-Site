<table>
        <tr>
            <th>kolo</th>
            <th>domacin</th>
            <th>gost</th>
            <th>termin</th>            
        </tr>

        <?php
        
        foreach ($match_pairs as $row)
        {
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