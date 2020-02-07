<div class="teamContent">
    <div class="team">
        <table class="teamInfo">
            <tr>
                <td>Ime</td>
                <td><?php echo $team->team_name ?></td>
            </tr>
            <tr>
                <td>Grad</td>
                <td><?php echo $team->team_city ?></td>
            </tr>
            <tr>
                <td>Dvorana</td>
                <td><?php echo $team->venue ?></td>
            </tr>
            <tr>
                <td>Termin</td>
                <td><?php echo $team->game_time ?></td>
            </tr>
            <tr>
                <td>Klupske boje</td>
                <td><?php echo $team->kit_color ?></td>
            </tr>
        </table>
        <img class="teamLogo" src="/images/logos_big/<?php echo $team->id ?>.png" alt="team logo" />
    </div>
    <ul class="teamResultsList">
        <li id="s2006">2006 god.</li>
        <li id="s2007">2007 god.</li>
        <li id="s2008">2008 god.</li>
        <li id="s2009">2009 god.</li>
        <li id="s2010">2010 god.</li>
    </ul>
    <?php if ($results6 == null): else: ?>
    <div class="rSelector" id="ys2010">
        <table class="teamResults">
            <?php if ($team->id == 7 or $team->id == 1): ?>
            <?='<i><p>ne takmiči se u 2010. godištu</p></i>'?>
            <?php else: ?>
            <tr>
                <th>kolo</th>
                <th>domaćin</th>
                <th>gost</th>
                <th colspan="3">rezultat</th>
            </tr>
            <?php endif?>
            <?php foreach ($results10 as $r): ?>
            <tr>
                <td><?=$r->m_day?></td>
                <td><a href="/liga/ekipa/<?=$r->home_teamid?>"><?=$r->home_team?></a></td>
                <td><a href="/liga/ekipa/<?=$r->away_teamid?>"><?=$r->away_team?></a></td>
                <td><?=$r->goals_home?></td>
                <td>:</td>
                <td><?=$r->goals_away?></td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <div class="rSelector" id="ys2009">
        <table class="teamResults">
            <tr>
                <th>kolo</th>
                <th>domaćin</th>
                <th>gost</th>
                <th colspan="3">rezultat</th>
            </tr>
            <?php foreach ($results9 as $r): ?>
            <tr>
                <td><?=$r->m_day?></td>
                <td><a href="/liga/ekipa/<?=$r->home_teamid?>"><?=$r->home_team?></a></td>
                <td><a href="/liga/ekipa/<?=$r->away_teamid?>"><?=$r->away_team?></a></td>
                <td><?=$r->goals_home?></td>
                <td>:</td>
                <td><?=$r->goals_away?></td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <div class="rSelector" id="ys2008">
        <table class="teamResults">
            <tr>
                <th>kolo</th>
                <th>domaćin</th>
                <th>gost</th>
                <th colspan="3">rezultat</th>
            </tr>
            <?php foreach ($results8 as $r): ?>
            <tr>
                <td><?=$r->m_day?></td>
                <td><a href="/liga/ekipa/<?=$r->home_teamid?>"><?=$r->home_team?></a></td>
                <td><a href="/liga/ekipa/<?=$r->away_teamid?>"><?=$r->away_team?></a></td>
                <td><?=$r->goals_home?></td>
                <td>:</td>
                <td><?=$r->goals_away?></td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <div class="rSelector" id="ys2007">
        <table class="teamResults">
            <?php if ($team->id == 8): ?>
            <?='<i><p>ne takmiči se u 2007. godištu</p></i>'?>
            <?php else: ?>
            <tr>
                <th>kolo</th>
                <th>domaćin</th>
                <th>gost</th>
                <th colspan="3">rezultat</th>
            </tr>
            <?php foreach ($results7 as $r): ?>
            <tr>
                <td><?=$r->m_day?></td>
                <td><a href="/liga/ekipa/<?=$r->home_teamid?>"><?=$r->home_team?></a></td>
                <td><a href="/liga/ekipa/<?=$r->away_teamid?>"><?=$r->away_team?></a></td>
                <td><?=$r->goals_home?></td>
                <td>:</td>
                <td><?=$r->goals_away?></td>
            </tr>
            <?php endforeach?>
            <?php endif?>
        </table>
    </div>
    <div class="rSelector" id="ys2006">
        <table class="teamResults">
            <tr>
                <th>kolo</th>
                <th>domaćin</th>
                <th>gost</th>
                <th colspan="3">rezultat</th>
            </tr>
            <?php foreach ($results6 as $r): ?>
            <tr>
                <td><?=$r->m_day?></td>
                <td><a href="/liga/ekipa/<?=$r->home_teamid?>"><?=$r->home_team?></a></td>
                <td><a href="/liga/ekipa/<?=$r->away_teamid?>"><?=$r->away_team?></a></td>
                <td><?=$r->goals_home?></td>
                <td>:</td>
                <td><?=$r->goals_away?></td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <?php endif?>
</div>