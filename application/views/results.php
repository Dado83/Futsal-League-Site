<table>      
    <tr>
        <td>kolo</td>
    </tr>
    <?php
    foreach ($results5 as $row)
    {
        echo <<<EOT
        <tr>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
        EOT;
    }
    ?>
</table>