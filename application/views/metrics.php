<div class="info">
    <p>Admin info:</p>
    <table>
        <?php
        echo '<tr><td>Ukupno posjeta</td><td style="text-align:right">' . $visAll->vis . '</td></tr>';
        echo '<tr><td>Jedinstvene posjete</td><td style="text-align:right">' . $visUni->vis . '</td></tr>';
        echo '<tr><td>Sa računara</td><td style="text-align:right">' . $visDesk->vis . '</td></tr>';
        echo '<tr><td>Sa računara (jed.)</td><td style="text-align:right">' . $visDeskUni->vis . '</td></tr>';
        echo '<tr><td>Sa telefona</td><td style="text-align:right">' . $visMob->vis . '</td></tr>';
        echo '<tr><td>Sa telefona (jed.)</td><td style="text-align:right">' . $visMobUni->vis . '</td></tr>';
        echo '<tr><td>Robot</td><td style="text-align:right">' . $visRob->vis . '</td></tr>';
        ?>
    </table>
    <p><a href="/liga/bilten">Bilten</a></p>
</div>
<table>
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
             <td><a class='button' href='/liga/formIn/$row->id'>Unos</a></td>
             </tr>
EOT;
    }
    ?>
</table>
