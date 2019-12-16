<p>Dashboard:</p>
<?php
echo <<<EOT
<div class='cardContainer'>
<div class='card'>
<p>Ukupno posjeta: $visAll->vis</p>
<p>Jedinstvene posjete: $visUni->vis</p>
</div>
<div class='card'>
<p>Sa racunara: $visDesk->vis</p>
<p>Sa racunara (jed.): $visDeskUni->vis</p>
</div>
<div class='card'>
<p>Sa telefona: $visMob->vis</p>
<p>Sa telefona (jed.): $visMobUni->vis</p>
</div>
<div class='card'>
<p>Robot: $visRob->vis</p>
</div>
</div>
EOT;

echo <<<EOT
<div class='graphContainer'>
<div class='graph'></div>
<div class='graph'></div>
</div>
EOT;

$keys = array_keys($vis);
echo '<p>Posjete:</p';
foreach ($keys as $k) {
    $count = count($vis[$k]);
    echo <<<EOT
        <div><p class='headToggle'>≡ $k ($count)</p>
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
        $t = explode(':', $vis[$k][$i]->time);
        if ($t[0] == '23') {
            $time = '00:' . $t[1];
        } else {
            $time = $t[0] + 1 . ':' . $t[1];
        }
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
            <td>$time</td>
            </tr>
EOT;
    }
    echo "</tbody></table></div>";
}
?>
