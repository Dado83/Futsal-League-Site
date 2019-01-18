<table>      
    <p>2005 godiste</p>
    <td>kolo</td>
    <td>domacin</td>
    <td>gost</td>
    <td colspan="2">rezultat</td>
</tr>
<?php
foreach ($results5 as $row)
{
    echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
        EOT;
}
?>
</table>
<table>      
    <p>2006 godiste</p>
    <tr>
        <td>kolo</td>
        <td>domacin</td>
        <td>gost</td>
        <td colspan="2">rezultat</td>
    </tr>
    <?php
    foreach ($results6 as $row)
    {
        echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
        EOT;
    }
    ?>
</table>
<table>
    <p>2007 godiste</p>     
    <tr>
        <td>kolo</td>
        <td>domacin</td>
        <td>gost</td>
        <td colspan="2">rezultat</td>
    </tr>
    <?php
    foreach ($results7 as $row)
    {
        echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
        EOT;
    }
    ?>
</table>
<table>     
    <p>2008 godiste</p>
    <tr>
        <td>kolo</td>
        <td>domacin</td>
        <td>gost</td>
        <td colspan="2">rezultat</td>
    </tr>
    <?php
    foreach ($results8 as $row)
    {
        echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
        EOT;
    }
    ?>
</table>
<table>      
    <p>2009 godiste</p>
    <tr>
        <td>kolo</td>
        <td>domacin</td>
        <td>gost</td>
        <td colspan="2">rezultat</td>
    </tr>
    <?php
    foreach ($results9 as $row)
    {
        echo <<<EOT
        <tr>
        <td>$row->m_day</td>
        <td>$row->home_team</td>
        <td>$row->away_team</td>
        <td>$row->goals_home</td>
        <td>$row->goals_away</td>
        </tr>
        EOT;
    }
    ?>
</table>
