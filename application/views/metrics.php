<div class="info">
    <p>Metrics:</p>
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
    <?php
    $keys = array_keys($vis);

    foreach ($keys as $k) {
        $count = count($vis[$k]);
        echo <<<EOT
        <div><p class='headToggle'>znak?? $k ($count)</p>
        <table class='visitorTable'>
        <thead>
        <tr>
        <th>ip</th>
        <th>mobile</th>
        <th>robot</th>
        <th>platform</th>
        <th>browser</th>
        <th>version</th>
        <th>user_agent</th>
        <th>n_v</th>
        <th>role</th>
        <th>day</th>
        <th>month</th>
        <th>time</th>
        </tr>
        </thead>
        <tbody>
EOT;
        for ($i = 0; $i < count($vis[$k]); $i++) {
            echo <<<EOT
            <tr>
            <td>{$vis[$k][$i]->ip}</td>
            <td>{$vis[$k][$i]->mobile}</td>
            <td>{$vis[$k][$i]->robot}</td>
            <td>{$vis[$k][$i]->platform}</td>
            <td>{$vis[$k][$i]->browser}</td>
            <td>{$vis[$k][$i]->version}</td>
            <td>{$vis[$k][$i]->user_agent}</td>
            <td>{$vis[$k][$i]->new_visitor}</td>
            <td>{$vis[$k][$i]->role}</td>
            <td>{$vis[$k][$i]->day}</td>
            <td>{$vis[$k][$i]->month}</td>
            <td>{$vis[$k][$i]->time}</td>
            </tr>
EOT;
        }
        echo "</tbody></table></div>";
    }
    ?>
