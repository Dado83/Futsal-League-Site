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


    for ($i = 0; $i < 120; $i++) {
        echo "{$vis['Feb'][$i]->ip}, {$vis['Feb'][$i]->day}, {$vis['Feb'][$i]->month}, {$vis['Feb'][$i]->year}, {$vis['Feb'][$i]->time} <br>";
    }


    ?>
