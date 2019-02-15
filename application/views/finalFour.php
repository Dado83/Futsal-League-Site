<div class="finalFour">
    <h1>Završni turnir</h1>
    <p>Subota, 2. mart 2019. g. - Žepče (2005, 2007, 2009)</p>
    <p>Nedjelja, 3. mart 2019. g. - Teslić (2006, 2008)</p>
    <h2>Polufinalne utakmice:</h2>
    <div class="semis">
        <h3>2009. godište</h3>
        <table>
            <?php
            echo <<<EOT
            <tr>
            <td><img src = '/images/logos/$t9p1->id.png' alt = 'grb'>$t9p1->team</td>            
            <td> - </td>           
            <td>$t9p4->team<img src = '/images/logos/$t9p4->id.png' alt = 'grb'></td>
            </tr>
            <tr>
            <td><img src = '/images/logos/$t9p2->id.png' alt = 'grb'>$t9p2->team</td>
            <td> - </td>
            <td>$t9p3->team<img src = '/images/logos/$t9p3->id.png' alt = 'grb'></td>
            </tr>
EOT;
            ?>
        </table>
    </div>
    <div class="semis">
        <h3>2008. godište</h3>
        <table>
            <?php
            echo <<<EOT
            <tr>
            <td><img src = '/images/logos/$t8p1->id.png' alt = 'grb'>$t8p1->team</td>            
            <td> - </td>           
            <td>$t8p4->team<img src = '/images/logos/$t8p4->id.png' alt = 'grb'></td>
            </tr>
            <tr>
            <td><img src = '/images/logos/$t8p2->id.png' alt = 'grb'>$t8p2->team</td>
            <td> - </td>
            <td>$t8p3->team<img src = '/images/logos/$t8p3->id.png' alt = 'grb'></td>
            </tr>
EOT;
            ?>
        </table>
    </div>
    <div class="semis">
        <h3>2007. godište</h3>
        <table>
            <?php
            echo <<<EOT
            <tr>
            <td><img src = '/images/logos/$t7p1->id.png' alt = 'grb'>$t7p1->team</td>            
            <td> - </td>           
            <td>$t7p4->team<img src = '/images/logos/$t7p4->id.png' alt = 'grb'></td>
            </tr>
            <tr>
            <td><img src = '/images/logos/$t7p2->id.png' alt = 'grb'>$t7p2->team</td>
            <td> - </td>
            <td>$t7p3->team<img src = '/images/logos/$t7p3->id.png' alt = 'grb'></td>
            </tr>
EOT;
            ?>
        </table>
    </div>
    <div class="semis">
        <h3>2006. godište</h3>
        <table>
            <?php
            echo <<<EOT
            <tr>
            <td><img src = '/images/logos/$t6p1->id.png' alt = 'grb'>$t6p1->team</td>            
            <td> - </td>           
            <td>$t6p4->team<img src = '/images/logos/$t6p4->id.png' alt = 'grb'></td>
            </tr>
            <tr>
            <td><img src = '/images/logos/$t6p2->id.png' alt = 'grb'>$t6p2->team</td>
            <td> - </td>
            <td>$t6p3->team<img src = '/images/logos/$t6p3->id.png' alt = 'grb'></td>
            </tr>
EOT;
            ?>
        </table>
    </div>
    <div class="semis">
        <h3>2005. godište</h3>
        <table>
            <?php
            echo <<<EOT
            <tr>
            <td><img src = '/images/logos/$t5p1->id.png' alt = 'grb'>$t5p1->team</td>            
            <td> - </td>           
            <td>$t5p4->team<img src = '/images/logos/$t5p4->id.png' alt = 'grb'></td>
            </tr>
            <tr>
            <td><img src = '/images/logos/$t5p2->id.png' alt = 'grb'>$t5p2->team</td>
            <td> - </td>
            <td>$t5p3->team<img src = '/images/logos/$t5p3->id.png' alt = 'grb'></td>
            </tr>
EOT;
            ?>
        </table>
    </div>
</div>
<div class="tableAll" style="display:table; margin:auto">
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
