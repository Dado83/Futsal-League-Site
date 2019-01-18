<div>
    <?php
    echo base_url();
    ?>
</div>
<div>
    <p>tabela 2005 g.</p>
    <table>
        <tr>
            <th>poz</th>
            <th>Ekipa</th>
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
        foreach ($table5 as $row)
        {
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
