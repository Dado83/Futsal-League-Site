<div class="resutsPage">
    <table>      
        <tr>
            <td colspan="3">2009. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="2">rezultat</td>
        </tr>
        <?php
        foreach ($results9 as $row) {
            echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table>      
        <tr>
            <td colspan="3">2008. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="2">rezultat</td>
        </tr>
        <?php
        foreach ($results8 as $row) {
            echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table>
        <tr>
            <td colspan="3">2007. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="2">rezultat</td>
        </tr>
        <?php
        foreach ($results7 as $row) {
            echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table>     
        <tr>
            <td colspan="3">2006. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="2">rezultat</td>
        </tr>
        <?php
        foreach ($results6 as $row) {
            echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
    <table>      
        <tr>
            <td colspan="3">2005. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="2">rezultat</td>
        </tr>
        <?php
        foreach ($results5 as $row) {
            echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
        }
        ?>
    </table>
</div>
