<p>Dashboard:</p>
<div class="chartContainer">
    <div><canvas id="visitorPercentage"></canvas></div>
    <div><canvas id="visitorPie"></canvas></div>
    <div><canvas id="visitorTimeline"></canvas></div>
</div>
<p>Posjete za <?=date('Y', time())?>. godinu</p>
<div>
    <?php
$keys = array_keys($vis);
foreach ($keys as $k):
    $count = count($vis[$k])?>
    <details>
        <summary> <?=$k?> (<?=$count?>)</summary>
        <table class="visitorTable">
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
                <?php
    for ($i = 0; $i < count($vis[$k]); $i++):
        $t = explode(":", $vis[$k][$i]->time);
        if ($t[0] == "23") {
            $time = "00:" . $t[1];
        } else {
            $time = $t[0] + 1 . ":" . $t[1];
        }
        ?>
                <tr>
                    <td><?=$vis[$k][$i]->ip?></td>
                    <td><?=$vis[$k][$i]->mobile?></td>
                    <td><?=$vis[$k][$i]->robot?></td>
                    <td><?=$vis[$k][$i]->platform?></td>
                    <td><?=$vis[$k][$i]->browser?></td>
                    <td><?=$vis[$k][$i]->version?></td>
                    <td><?=$vis[$k][$i]->user_agent?></td>
                    <td><?=$vis[$k][$i]->new_visitor?></td>
                    <td><?=$vis[$k][$i]->role?></td>
                    <td><?=$vis[$k][$i]->day?></td>
                    <td><?=$vis[$k][$i]->month?></td>
                    <td><?=$time?></td>
                </tr>
                <?php endfor?>
            </tbody>
        </table>
    </details>
    <?php endforeach?>
</div>