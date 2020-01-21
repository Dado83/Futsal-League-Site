<div id="adminCards">
    <div id="newsLetter"><a href="/liga/bilten"><img src="/images/icons/newsletter.svg" style="width: 100%" />Bilten</a>
    </div>
    <div id="metrics"><a href="/liga/metrics"><img src="/images/icons/charts.svg" style="width: 100%" />Metrics</a>
    </div>
</div>
<table class="admin">
    <p>Odigrane utakmice:</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>
    </tr>
    <?php
foreach ($results as $row) {
    echo <<<EOT
             <tr>
             <td>$row->m_day</td>
             <td>$row->home_team</td>
             <td>$row->away_team</td>
             <td><a class='button' href='/liga/brisanjeKola/$row->id' onclick="return confirm('Brišem zadnje kolo?')">Brisi</a></td>
             </tr>
EOT;
}
?>
</table>
<table class="admin">
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
             <td><a class='button' href='/liga/formIn/$row->id'>Unos</a></td>
             </tr>
EOT;
}
?>
</table>