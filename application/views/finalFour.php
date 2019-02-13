<div class="tableAll" style="margin:auto;display:table">
    <table>
        <tr>
            <th>#</th>
            <th>zbirna tabela svih selekcija</th>
            <th>O</th>
            <th>P</th>
            <th>N</th>
            <th>I</th>
            <th>GOL</th>
            <th>+/-</th>
            <th>BOD</th>
        </tr>
        <?php
        $i = 1;
        foreach ($combinedTable as $tt) {
            $gDiff = $tt->goalsFor - $tt->goalsAgg;
            echo "<tr><td>$i</td>";
            echo "<td><img src='/images/logos/$tt->id.png' alt='grb'>$tt->team</td>";
            echo "<td>$tt->gamesAll</td>";
            echo "<td>$tt->gamesWon</td>";
            echo "<td>$tt->gamesDrew</td>";
            echo "<td>$tt->gamesLost</td>";
            echo "<td>$tt->goalsFor:$tt->goalsAgg</td>";
            echo "<td>$gDiff</td>";
            echo "<td>$tt->pointsAll</td></tr>";
            $i++;
        }
        ?>
    </table>
</div>
