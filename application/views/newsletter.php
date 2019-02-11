<head>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        body {
            margin: 80px 0 100px 30px;
            background: white;
        }
    </style>
</head>
<h1>FAIR PLAY Liga Budućih Šampiona</h1>
<h2>takmičarska sezona 2018/19</h2>
<h3>Bilten br. <?php echo $lastMday ?></h3>
<br/>
<p>1. Registracija utakmica <?php echo $lastMday ?>. kola</p>
<?php
if ($isLeagueOver) {
    
} else {
    echo "<p>2. Raspored utakmica $nextMday. kola</p>";
}
?>
<br/>
<p>ad 1)</p>  
<p style="font-size:18px;"><?php echo $notPlayingLastMday->team ?> pauzira</p>      
<div class="resultsNL">
    <p>2009. godište</p>
    <table>
        <?php
        foreach ($results9 as $r) {
            echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
        }
        ?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2009. godište</th>
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
        foreach ($table9 as $row) {
            echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>     
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
            $i++;
        }
        ?>
    </table>
</div>
<div class="resultsNL">
    <p>2008. godište</p>
    <table>
        <?php
        foreach ($results8 as $r) {
            echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
        }
        ?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2008. godište</th>
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
        foreach ($table8 as $row) {
            echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
            $i++;
        }
        ?>
    </table>
</div>
<div class="resultsNL">
    <p>2007. godište</p>
    <table>
        <?php
        foreach ($results7 as $r) {
            echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
        }
        ?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2007. godište</th>
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
        foreach ($table7 as $row) {
            echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>     
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
            $i++;
        }
        ?>
    </table>
</div>
<div class="resultsNL">
    <p>2006. godište</p>
    <table>
        <?php
        foreach ($results6 as $r) {
            echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
        }
        ?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2006. godište</th>
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
        foreach ($table6 as $row) {
            echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>   
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
            $i++;
        }
        ?>
    </table>
</div>
<div class="resultsNL">
    <p>2005. godište</p>
    <table>
        <?php
        foreach ($results5 as $r) {
            echo <<<EOT
            <tr>
            <td>$r->home_team</td>
            <td>$r->goals_home</td>
            <td> - </td>
            <td>$r->goals_away</td>
            <td>$r->away_team</td>
            </tr>
EOT;
        }
        ?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2005. godište</th>
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
        foreach ($table5 as $row) {
            echo <<<EOT
             <tr>
             <td>$i</td>
             <td>$row->team</td>
             <td>$row->games_played</td>
             <td>$row->games_won</td>
             <td>$row->games_drew</td>
             <td>$row->games_lost</td>
             <td>$row->goals</td>     
             <td>$row->g_diff</td>
             <td>$row->points</td>
             </tr>
EOT;
            $i++;
        }
        ?>
    </table>
</div>
<table class="nextGameNL">
    <?php
    if ($isLeagueOver) {
        
    } else {
        echo "
        <tr>
        <td colspan='5' style='font-weight:bold;'>$nextMday. kolo ($nextGameDate->game_date)</td>
        </tr>
        ";
        foreach ($nextFixture as $nf) {
            echo <<<EOT
            <tr>
            <td>$nf->home</td>
            <td> - </td>
            <td>$nf->away</td>
            <td>$nf->venue</td>
            <td>$nf->game_time</td>
            </tr>
EOT;
        }
        echo "
        <tr>
        <td colspan='5' style='font-style:italic;'>$notPlaying->team pauzira</td>           
        </tr>
        ";
    }
    ?>
</table>
