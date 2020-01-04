<div class="resultsPage">
    <table>
        <tr>
            <td colspan="6">2010. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="3">rezultat</td>
        </tr>
        <?php
foreach ($results10 as $row) {
    echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>:</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
}
?>
    </table>
    <table>
        <tr>
            <td colspan="6">2009. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="3">rezultat</td>
        </tr>
        <?php
foreach ($results9 as $row) {
    echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>:</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
}
?>
    </table>
    <table>
        <tr>
            <td colspan="6">2008. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="3">rezultat</td>
        </tr>
        <?php
foreach ($results8 as $row) {
    echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>:</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
}
?>
    </table>
    <table>
        <tr>
            <td colspan="6">2007. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="3">rezultat</td>
        </tr>
        <?php
foreach ($results7 as $row) {
    echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>:</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
}
?>
    </table>
    <table>
        <tr>
            <td colspan="6">2006. godište</td>
        </tr>
        <tr>
            <td>kolo</td>
            <td>domaćin</td>
            <td>gost</td>
            <td colspan="3">rezultat</td>
        </tr>
        <?php
foreach ($results6 as $row) {
    echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>:</td>
        <td>$row->goals_away</td>
        </tr>
EOT;
}
?>
    </table>
</div>