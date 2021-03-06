<div class="resultsPageContainer">
    <div class="resultsPage">
        <details open>
            <summary>2010. godište</summary>
            <table>
                <tr>
                    <td>kolo</td>
                    <td>domaćin</td>
                    <td>gost</td>
                    <td colspan="3">rezultat</td>
                </tr>
                <?php foreach ($results10 as $row): ?>
                <tr>
                    <td class="oddResRow"><?=$row->m_day?></td>
                    <td><?=$row->home_team?></td>
                    <td><?=$row->away_team?></td>
                    <td><?=$row->goals_home?></td>
                    <td>:</td>
                    <td><?=$row->goals_away?></td>
                </tr>
                <?php endforeach?>
            </table>
        </details>
        <details>
            <summary>2009. godište</summary>
            <table>
                <tr>
                    <td>kolo</td>
                    <td>domaćin</td>
                    <td>gost</td>
                    <td colspan="3">rezultat</td>
                </tr>
                <?php foreach ($results9 as $row): ?>
                <tr>
                    <td class="oddResRow"><?=$row->m_day?></td>
                    <td><?=$row->home_team?></td>
                    <td><?=$row->away_team?></td>
                    <td><?=$row->goals_home?></td>
                    <td>:</td>
                    <td><?=$row->goals_away?></td>
                </tr>
                <?php endforeach?>
            </table>
        </details>
        <details>
            <summary>2008. godište</summary>
            <table>
                <tr>
                    <td>kolo</td>
                    <td>domaćin</td>
                    <td>gost</td>
                    <td colspan="3">rezultat</td>
                </tr>
                <?php foreach ($results8 as $row): ?>
                <tr>
                    <td class="oddResRow"><?=$row->m_day?></td>
                    <td><?=$row->home_team?></td>
                    <td><?=$row->away_team?></td>
                    <td><?=$row->goals_home?></td>
                    <td>:</td>
                    <td><?=$row->goals_away?></td>
                </tr>
                <?php endforeach?>
            </table>
        </details>
        <details>
            <summary>2007. godište</summary>
            <table>
                <tr>
                    <td>kolo</td>
                    <td>domaćin</td>
                    <td>gost</td>
                    <td colspan="3">rezultat</td>
                </tr>
                <?php foreach ($results7 as $row): ?>
                <tr>
                    <td class="oddResRow"><?=$row->m_day?></td>
                    <td><?=$row->home_team?></td>
                    <td><?=$row->away_team?></td>
                    <td><?=$row->goals_home?></td>
                    <td>:</td>
                    <td><?=$row->goals_away?></td>
                </tr>
                <?php endforeach?>
            </table>
        </details>
        <details>
            <summary>2006. godište</summary>
            <table>
                <tr>
                    <td>kolo</td>
                    <td>domaćin</td>
                    <td>gost</td>
                    <td colspan="3">rezultat</td>
                </tr>
                <?php foreach ($results6 as $row): ?>
                <tr>
                    <td class="oddResRow"><?=$row->m_day?></td>
                    <td><?=$row->home_team?></td>
                    <td><?=$row->away_team?></td>
                    <td><?=$row->goals_home?></td>
                    <td>:</td>
                    <td><?=$row->goals_away?></td>
                </tr>
                <?php endforeach?>
            </table>
        </details>
    </div>
    <div id="combinedTable" class="table">
        <table>
            <tr>
                <th>#</th>
                <th>zbirna tabela svih selekcija</th>
                <th>Ut</th>
                <th>P</th>
                <th>N</th>
                <th>I</th>
                <th>GOL</th>
                <th>+/-</th>
                <th>BOD</th>
            </tr>
            <?php
$i = 1;
foreach ($combinedTable as $tt):
    $gDiff = $tt->goalsFor - $tt->goalsAgg;?>
            <tr>
                <td><?=$i?></td>
                <td><img src="/images/logos/<?=$tt->id?>.png" alt="grb"><?=$tt->team?></td>
                <td><?=$tt->gamesAll?></td>
                <td><?=$tt->gamesWon?></td>
                <td><?=$tt->gamesDrew?></td>
                <td><?=$tt->gamesLost?></td>
                <td><?=$tt->goalsFor?>:<?=$tt->goalsAgg?></td>
                <td><?=$gDiff?></td>
                <td><?=$tt->pointsAll?></td>
            </tr>
            <?php $i++?>
            <?php endforeach?>
        </table>
    </div>
</div>