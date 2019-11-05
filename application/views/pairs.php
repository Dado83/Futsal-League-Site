<div class="pairsAll">
    <p>Raspored:</p>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>1. kolo: $matchDates1->game_date</td></tr>";

        foreach ($matchPairs1 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying1->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>2. kolo: $matchDates2->game_date</td></tr>";

        foreach ($matchPairs2 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying2->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>3. kolo: $matchDates3->game_date</td></tr>";

        foreach ($matchPairs3 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying3->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>4. kolo: $matchDates4->game_date</td></tr>";

        foreach ($matchPairs4 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying4->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>5. kolo: $matchDates5->game_date</td></tr>";

        foreach ($matchPairs5 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying5->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>6. kolo: $matchDates6->game_date</td></tr>";

        foreach ($matchPairs6 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying6->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>7. kolo: $matchDates7->game_date</td></tr>";

        foreach ($matchPairs7 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying7->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>8. kolo: $matchDates8->game_date</td></tr>";

        foreach ($matchPairs8 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying8->team pauzira</td></tr>"
        ?>
    </table>
    <br>
    <table class="pairs">
        <?php
        echo "<tr><td colspan=3>9. kolo: $matchDates9->game_date</td></tr>";

        foreach ($matchPairs9 as $row) {
            echo <<<EOT
             <tr>
             <td>$row->home_team</td>
             <td>-</td>
             <td>$row->away_team</td>                        
             </tr>
EOT;
        }
        echo "<tr><td colspan=3>$notPlaying9->team pauzira</td></tr>"
        ?>
    </table>
    <br>
</div>
