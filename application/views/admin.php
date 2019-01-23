<table>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>            
    </tr>
    <?php
    foreach ($results as $row) {
        if ($lastMday >= $row->m_day) {
            $button = "<a class='button' href='/liga/form/$row->id'>Izmjena</a>";
            $buttonDel = "<a class='button' href='/liga/brisanje_kola/$row->id'>Brisi</a>";
        } else {
            $button = "<a class='button' href='/liga/form/$row->id'>Unos</a>";
            $buttonDel = "";
        }
        echo <<<EOT
             <tr>
             <td>$row->m_day</td>
             <td>$row->home_team</td>
             <td>$row->away_team</td>
             <td>$button</td>
             <td>$buttonDel</td>
             </tr>
EOT;
    }
    ?>
</table>
