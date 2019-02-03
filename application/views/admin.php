<div class="info">
    <p>Admin info:</p>
    <?php
    echo '<br>Browser: ' . $this->agent->browser();
    echo '<br>Version: ' . $this->agent->version();
    echo '<br>Mobile?: ' . $this->agent->mobile();
    echo '<br>Robot?: ' . $this->agent->robot();
    echo '<br>Platform: ' . $this->agent->platform();
    echo '<br>User agent: ' . $this->agent->agent_string();
    echo '<br>IP: ' . $this->input->ip_address();
    ?>
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